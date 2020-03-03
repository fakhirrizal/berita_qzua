<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class NewsLoad extends CI_Controller {
        function __construct (){
            parent::__construct();
            $this->load->model('NewsLoad_Model');
        }

        function newsload (){
            // $limit  = $_POST['limit'];            
            // $limit  = $this->input->post('limit');   
            // $query = $this->NewsLoad_Model->__getdata($limit);
            // $query = $this->NewsLoad_Model->__getdata();
            if($this->input->post('category')==NULL){
                $query = $this->Main_model->getSelectedData('berita a', 'a.*,b.fullname', '', 'a.created_at DESC', '', '', '', array(
                    'table' => 'user b',
                    'on' => 'a.created_by=b.id',
                    'pos' => 'LEFT'
                ));
                foreach ($query->result() as $row)
                {
                    // $date_formater  = date_format($row->created_at,"M d, Y");
                    $date_new       = date("M d, Y", strtotime($row->created_at));
                    $time_new       = date("h:i a", strtotime($row->created_at));
                    $datetime       = $date_new." at ".$time_new; 
                    $response[]     = array("id_berita"=>$row->id_berita,"judul"=>$row->judul,"berita"=>$row->berita,"thumbnail"=>$row->thumbnail,"created_at"=>$datetime,"by"=>$row->fullname);                   
                }            
                echo json_encode($response);  
            }else{
                $check_berita = $this->db->query("SELECT a.*,b.fullname FROM berita a LEFT JOIN user b ON a.created_by=b.id WHERE a.id_kategori_berita LIKE '%".$this->input->post('category')."%'")->result();
                $tampung_real = array();
                foreach ($check_berita as $key => $value) {
                    $pecah_kategori = explode(',',$value->id_kategori_berita);
                    for ($i=0; $i < count($pecah_kategori); $i++) { 
                        if($pecah_kategori[$i]==$this->input->post('category')){
                            $isi['id_berita'] = $value->id_berita;
                            $isi['created_at'] = $value->created_at;
                            $isi['berita'] = $value->berita;
                            $isi['judul'] = $value->judul;
                            $isi['thumbnail'] = $value->thumbnail;
                            $isi['fullname'] = $value->fullname;
                            $tampung_real[] = $isi;
                            break;
                        }else{
                            echo'';
                        }
                    }
                }
                foreach ($tampung_real as $key => $row)
                {
                    // $date_formater  = date_format($row->created_at,"M d, Y");
                    $date_new       = date("M d, Y", strtotime($row['created_at']));
                    $time_new       = date("h:i a", strtotime($row['created_at']));
                    $datetime       = $date_new." at ".$time_new; 
                    $response[]     = array("id_berita"=>$row['id_berita'],"judul"=>$row['judul'],"berita"=>$row['berita'],"thumbnail"=>$row['thumbnail'],"created_at"=>$datetime,"by"=>$row['fullname']);                   
                }            
                echo json_encode($response);  
            }
                      
        }
    }  
?>