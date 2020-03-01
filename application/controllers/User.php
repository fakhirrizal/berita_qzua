<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index($key='')
    {
        $this->Main_model->update_visitor();
        $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*')->result();
        $this->load->view('public/main',$data);
    }
    public function detail($key=''){
        if($key!=NULL){
            $data['data_berita'] = $this->Main_model->getSelectedData('berita a', 'a.*', array('a.id_berita'=>$key))->row();
            $data['data_komen'] = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('a.id_berita'=>$key,'a.status'=>'1'))->result();
            $this->load->view('public/berita_detail',$data);
        }else{
            redirect();
        }
    }
    public function kategori($key='')
    {
        if($key==NULL){
            $this->load->view('public/berita_per_kategori');
        }
        else{
            $replace_key = str_replace('%20',' ',$key);
            $checking_data = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$replace_key))->row();
            if($checking_data==NULL){
                // harusnya ada halaman 404
                redirect();
            }else{
                $check_berita = $this->db->query("SELECT * FROM `berita` WHERE `id_kategori_berita` LIKE '%".$checking_data->id_kategori_berita."%'")->result();
                $tampung_real = array();
                foreach ($check_berita as $key => $value) {
                    $pecah_kategori = explode(',',$value->id_kategori_berita);
                    for ($i=0; $i < count($pecah_kategori); $i++) { 
                        if($pecah_kategori[$i]==$checking_data->id_kategori_berita){
                            $isi['id_berita'] = $value->id_berita;
                            $tampung_real[] = $isi;
                            break;
                        }else{
                            echo'';
                        }
                    }
                }
                foreach ($tampung_real as $key => $value) {
                    echo $value['id_berita'].'<br>';
                }
            }
        }
    }
    public function about(){
        $this->load->view('public/about');
    }
    public function contact(){
        $this->load->view('public/contact');
    }
    public function save_subscriber(){
        $this->db->trans_start();
        $checking_data = $this->Main_model->getSelectedData('subscriber a', 'a.*',array('a.email'=>$this->input->post('alamat_surel')))->row();
        if($checking_data==NULL){
            $get_last_id = $this->Main_model->getLastID('subscriber','id_subscriber');
            $data_insert_ = array(
                'id_subscriber' => $get_last_id['id_subscriber']+1,
                'email' => $this->input->post('alamat_surel'),
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->Main_model->insertData('subscriber',$data_insert_);
    
            $this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data subscriber",$this->session->userdata('location'));
        }else{
            echo'';
        }
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
            // message failed
			echo "<script>window.location='".base_url()."'</script>";
		}
		else{
            // message success
			echo "<script>window.location='".base_url()."'</script>";
		}
    }
    public function save_comment(){
        $this->db->trans_start();
        $data_insert_ = array(
            'id_parent_comment' => $this->input->post('id_comment'),
            'id_berita' => $this->input->post('berita'),
            'nama' => $this->input->post('text'),
            'email' => $this->input->post('email'),
            'komentar' => $this->input->post('comment'),
            'created_at' => date("Y-m-d H:i:s"),
            'status' => '0'
        );
        $this->Main_model->insertData('komentar_berita',$data_insert_);
        $this->db->trans_complete();
        if($this->db->trans_status() === false){
            // message failed
            echo "<script>window.location='".base_url().'news_detail/'.$this->input->post('berita')."'</script>";
        }
        else{
            // message success
            echo "<script>alert('Date telah berhasil disimpan');</script>";
            echo "<script>window.location='".base_url().'news_detail/'.$this->input->post('berita')."'</script>";
        }
    }
}