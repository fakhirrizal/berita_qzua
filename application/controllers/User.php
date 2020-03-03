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
            $data['data_berita'] = $this->Main_model->getSelectedData('berita a', 'a.*,b.fullname,b.photo', array('a.id_berita'=>$key), '', '', '', '', array(
                'table' => 'user b',
                'on' => 'a.created_by=b.id',
                'pos' => 'LEFT'
            ))->row();
            $data['data_komen'] = $this->db->query("SELECT * FROM `komentar_berita` WHERE `id_berita`='".$key."' AND `id_parent_comment` IS NULL ORDER BY `komentar_berita`.`created_at` ASC")->result();
            $data['other_news'] = $this->db->query("SELECT a.*,b.fullname FROM berita a LEFT JOIN user b ON a.created_by=b.id WHERE a.id_berita NOT IN ('".$key."') ORDER BY RAND() LIMIT 3")->result();
            $this->load->view('public/berita_detail',$data);
        }else{
            redirect();
        }
    }
    public function kategori($key='')
    {
        if($key==NULL){
            redirect();
        }
        else{
            $replace_key = str_replace('%20',' ',$key);
            $checking_data = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$replace_key))->row();
            if($checking_data==NULL){
                // harusnya ada halaman 404
                $data['kategori_berita'] = $replace_key;
                $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*')->result();
                $this->load->view('public/wrong_kategori',$data);
                // redirect();
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
                // foreach ($tampung_real as $key => $value) {
                //     echo $value['id_berita'].'<br>';
                // }
                if($tampung_real==NULL){
                    // halaman category is empty
                    $data['kategori_berita'] = $replace_key;
                    $data['data_berita'] = $tampung_real;
                    $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$replace_key))->result();
                    $this->load->view('public/berita_per_kategori',$data);
                }else{
                    $data['kategori_berita'] = $replace_key;
                    $data['data_berita'] = $tampung_real;
                    $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$replace_key))->result();
                    $this->load->view('public/berita_per_kategori',$data);
                }
            }
        }
    }
    public function event_detail($key=''){
        if($key!=NULL){
            $data['data_event'] = $this->Main_model->getSelectedData('event a', 'a.*,b.fullname,b.photo', array('a.id_event'=>$key), '', '', '', '', array(
                'table' => 'user b',
                'on' => 'a.created_by=b.id',
                'pos' => 'LEFT'
            ))->row();
            $data['other_event'] = $this->db->query("SELECT a.*,b.fullname FROM event a LEFT JOIN user b ON a.created_by=b.id WHERE a.id_event NOT IN ('".$key."') ORDER BY RAND() LIMIT 3")->result();
            // $data['data_komen'] = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('a.id_berita'=>$key,'a.status'=>'1'))->result();
            $this->load->view('public/event_detail',$data);
        }else{
            redirect();
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
    public function searching(){
        $key_cari = $this->input->post('key');
        $data['key_cari'] = $key_cari;
        $data['berita'] = $this->db->query("SELECT a.*,b.fullname  FROM berita a LEFT JOIN user b ON a.created_by=b.id WHERE (a.judul LIKE '%".$key_cari."%' OR a.berita LIKE '%".$key_cari."%' OR a.created_at LIKE '%".$key_cari."%') ORDER BY a.created_at DESC")->result();
        $data['event'] = $this->db->query("SELECT *  FROM `event` WHERE (`judul` LIKE '%".$key_cari."%' OR `deskripsi` LIKE '%".$key_cari."%' OR `tanggal_pelaksanaan` LIKE '%".$key_cari."%' OR `tempat` LIKE '%".$key_cari."%' OR `penyelenggara` LIKE '%".$key_cari."%') ORDER BY `created_at` DESC")->result();
        $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*')->result();
        $this->load->view('public/searching',$data);
    }
    public function save_issue(){
        $this->db->trans_start();
        $data_insert_ = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message'),
            'created_at' => date("Y-m-d H:i:s")
        );
        $this->Main_model->insertData('kritik_saran',$data_insert_);
        $this->db->trans_complete();
        if($this->db->trans_status() === false){
            // message failed
            echo "<script>window.location='".base_url()."contact'</script>";
        }
        else{
            // message success
            echo "<script>alert('Date telah berhasil disimpan');</script>";
            echo "<script>window.location='".base_url()."contact'</script>";
        }
    }
    /* Other Function */
    public function ajax_function(){
        if($this->input->post('modul')=='get_parent_comment'){
            $get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('md5(a.id_komentar_berita)'=>$this->input->post('id')))->row();
            echo'<input type="hidden" name="id_comment" value="'.$get_data->id_komentar_berita.'" />In reply to <a href="#">'.$get_data->komentar.'</a> <a href="#" id="remove_reply"><font color="red">remove</font></a><br>';
        }elseif($this->input->post('modul')=='remove_parent_comment'){
            echo'';
        }
    }
}