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
            $get_data = $this->Main_model->getSelectedData('berita a', 'a.*,bb.fullname,bb.photo,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml', array('a.id_berita'=>$key), '', '', '', '', array(
                'table' => 'user bb',
                'on' => 'a.created_by=bb.id',
                'pos' => 'LEFT'
            ))->row();
            $data['data_berita'] = $this->Main_model->getSelectedData('berita a', 'a.*,bb.fullname,bb.photo,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml', array('a.id_berita'=>$key), '', '', '', '', array(
                'table' => 'user bb',
                'on' => 'a.created_by=bb.id',
                'pos' => 'LEFT'
            ))->row();
            $this->Main_model->updateData('berita',array('counter'=>$get_data->counter+1),array('id_berita'=>$key));
            $data['data_komen'] = $this->db->query("SELECT * FROM `komentar_berita` WHERE `id_berita`='".$key."' AND `id_parent_comment` IS NULL ORDER BY `komentar_berita`.`created_at` ASC")->result();
            $data['other_news'] = $this->db->query("SELECT a.*,b.fullname,(SELECT COUNT(bb.id_berita) FROM komentar_berita bb WHERE bb.id_berita=a.id_berita) AS jml FROM berita a LEFT JOIN user b ON a.created_by=b.id WHERE a.id_berita NOT IN ('".$key."') ORDER BY RAND() LIMIT 3")->result();
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
                $check_berita = $this->db->query("SELECT a.*,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml FROM berita a WHERE a.id_kategori_berita LIKE '%".$checking_data->id_kategori_berita."%' ORDER BY a.created_at DESC")->result();
                $tampung_real = array();
                foreach ($check_berita as $key => $value) {
                    $pecah_kategori = explode(',',$value->id_kategori_berita);
                    for ($i=0; $i < count($pecah_kategori); $i++) { 
                        if($pecah_kategori[$i]==$checking_data->id_kategori_berita){
                            $isi['id_berita'] = $value->id_berita;
                            $isi['judul'] = $value->judul;
                            $isi['berita'] = $value->berita;
                            $isi['created_at'] = $value->created_at;
                            $isi['counter'] = $value->counter;
                            $isi['thumbnail'] = $value->thumbnail;
                            $isi['jml'] = $value->jml;
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
                    $config['base_url'] = base_url().'kategori/'.$replace_key.'/';
                    $config['total_rows'] = count($tampung_real);
                    $config['per_page'] = 7;
                    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                    $config['num_tag_close']    = '</span></li>';
                    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['prev_tagl_close']  = '</span>Next</li>';
                    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                    $config['first_tagl_close'] = '</span></li>';
                    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['last_tagl_close']  = '</span></li>';
                    $this->pagination->initialize($config);

                    if($this->uri->segment(3)==NULL OR $this->uri->segment(3)=='1'){
                        $output = array_slice($tampung_real, 0, 7);
                    }else{
                        $output = array_slice($tampung_real, $this->uri->segment(3), 7);
                    }

                    $data['kategori_berita'] = $replace_key;
                    $data['data_berita'] = $output;
                    $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$replace_key))->result();
                    $this->load->view('public/berita_per_kategori',$data);
                    
                }
            }
        }
    }
    public function tag($key='')
    {
        if($key==NULL){
            redirect();
        }
        else{
            $get_data = $this->db->query("SELECT a.*,(SELECT COUNT(b.id_berita) FROM komentar_berita b WHERE b.id_berita=a.id_berita) AS jml FROM berita a WHERE a.tags LIKE '%".$key."%' ORDER BY a.created_at DESC")->result_array();
            // $tampung_real = array();
            // foreach ($check_berita as $key => $value) {
            //     $pecah_kategori = explode(',',$value->id_kategori_berita);
            //     for ($i=0; $i < count($pecah_kategori); $i++) { 
            //         if($pecah_kategori[$i]==$checking_data->id_kategori_berita){
            //             $isi['id_berita'] = $value->id_berita;
            //             $isi['judul'] = $value->judul;
            //             $isi['berita'] = $value->berita;
            //             $isi['created_at'] = $value->created_at;
            //             $isi['counter'] = $value->counter;
            //             $isi['thumbnail'] = $value->thumbnail;
            //             $isi['jml'] = $value->jml;
            //             $tampung_real[] = $isi;
            //             break;
            //         }else{
            //             echo'';
            //         }
            //     }
            // }
            // foreach ($tampung_real as $key => $value) {
            //     echo $value['id_berita'].'<br>';
            // }
            if($get_data==NULL){
                // halaman category is empty
                $data['kategori_berita'] = $key;
                $data['data_berita'] = $get_data;
                $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$key))->result();
                $this->load->view('public/tags',$data);
            }else{
                $config['base_url'] = base_url().'tags/'.$key.'/';
                $config['total_rows'] = count($get_data);
                $config['per_page'] = 7;
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                $this->pagination->initialize($config);

                if($this->uri->segment(3)==NULL OR $this->uri->segment(3)=='1'){
                    $output = array_slice($get_data, 0, 7);
                }else{
                    $output = array_slice($get_data, $this->uri->segment(3), 7);
                }
                $data['kategori_berita'] = $key;
                $data['data_berita'] = $output;
                $data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('a.kategori_berita'=>$key))->result();
                $this->load->view('public/tags',$data);
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
        // $this->db->trans_start();
        $checking_data = $this->Main_model->getSelectedData('subscriber a', 'a.*',array('a.email'=>$this->input->post('alamat_surel')))->row();
        if($checking_data==NULL){
            $get_last_id = $this->Main_model->getLastID('subscriber','id_subscriber');
            $data_insert_ = array(
                'id_subscriber' => $get_last_id['id_subscriber']+1,
                'email' => $this->input->post('alamat_surel'),
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->Main_model->insertData('subscriber',$data_insert_);
    
            // $this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data subscriber",$this->session->userdata('location'));
        }else{
            echo'';
        }
		// $this->db->trans_complete();
		// if($this->db->trans_status() === false){
        //     // message failed
		// 	echo "<script>window.location='".base_url()."'</script>";
		// }
		// else{
            // message success
			echo "<script>window.location='".base_url()."'</script>";
		// }
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
        // if($this->input->post('key')==NULL OR $this->session->userdata('keyword_searching')==NULL){
        //     $data['berita'] = '';
        //     $data['event'] = '';
        //     $data['key_cari'] = '';
        // }else{
        //     $key_cari = '';
        //     if($this->input->post('key')==NULL){
        //         $key_cari =$this->session->userdata('keyword_searching');
        //         $data['key_cari'] =$this->session->userdata('keyword_searching');
        //     }else{
        //         $key_cari = $this->input->post('key');
        //         $data['key_cari'] = $this->input->post('key');
        //         $sess_data['keyword_searching'] = $this->input->post('key');
        //         $this->session->set_userdata($sess_data);
        //     }
        //     $data['berita'] = $this->db->query("SELECT a.*,b.fullname  FROM berita a LEFT JOIN user b ON a.created_by=b.id WHERE (a.judul LIKE '%".$key_cari."%' OR a.berita LIKE '%".$key_cari."%' OR a.created_at LIKE '%".$key_cari."%') ORDER BY a.created_at DESC")->result();
        //     $data['event'] = $this->db->query("SELECT *  FROM `event` WHERE (`judul` LIKE '%".$key_cari."%' OR `deskripsi` LIKE '%".$key_cari."%' OR `tanggal_pelaksanaan` LIKE '%".$key_cari."%' OR `tempat` LIKE '%".$key_cari."%' OR `penyelenggara` LIKE '%".$key_cari."%') ORDER BY `created_at` DESC")->result();
        // }
        $key_cari = $this->input->post('key');
        $data['key_cari'] = $this->input->post('key');
        $data['berita'] = $this->db->query("SELECT a.*,b.fullname,(SELECT COUNT(bb.id_berita) FROM komentar_berita bb WHERE bb.id_berita=a.id_berita) AS jml FROM berita a LEFT JOIN user b ON a.created_by=b.id WHERE (a.judul LIKE '%".$key_cari."%' OR a.berita LIKE '%".$key_cari."%' OR a.created_at LIKE '%".$key_cari."%') ORDER BY a.created_at DESC")->result_array();
        $data['event'] = $this->db->query("SELECT *  FROM `event` WHERE (`judul` LIKE '%".$key_cari."%' OR `deskripsi` LIKE '%".$key_cari."%' OR `tanggal_pelaksanaan` LIKE '%".$key_cari."%' OR `tempat` LIKE '%".$key_cari."%' OR `penyelenggara` LIKE '%".$key_cari."%') ORDER BY `tanggal_pelaksanaan` DESC")->result_array();
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