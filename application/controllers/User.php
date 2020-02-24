<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index($key='')
    {
        $this->Main_model->update_visitor();
        $data['berita'] = array();
        // $data['data_marker'] = $this->Main_model->getSelectedData('provinsi a', 'a.*,(SELECT SUM(s.persentase_realisasi) FROM kube k LEFT JOIN status_laporan_kube s ON k.id_kube=s.id_kube WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_kube,(SELECT COUNT(k.id_kube) FROM kube k WHERE k.id_provinsi=a.id_provinsi) AS jumlah_kube,(SELECT SUM(s.persentase_realisasi) FROM rutilahu k LEFT JOIN status_laporan_rutilahu s ON k.id_rutilahu=s.id_rutilahu WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_rutilahu,(SELECT COUNT(k.id_rutilahu) FROM rutilahu k WHERE k.id_provinsi=a.id_provinsi) AS jumlah_rutilahu,(SELECT SUM(s.persentase_realisasi) FROM sarling k LEFT JOIN status_laporan_sarling s ON k.id_sarling=s.id_sarling WHERE k.id_provinsi=a.id_provinsi) AS persentase_realisasi_sarling,(SELECT COUNT(k.id_sarling) FROM sarling k WHERE k.id_provinsi=a.id_provinsi) AS jumlah_sarling',array('a.wilayah'=>'2'))->result();
        $this->load->view('public/main',$data);
        // if($key==NULL){
        //     $this->load->view('public/tes');
        // }
        // else{
        //     echo $key;
        // }
    }
    public function save_subscriber(){
        $this->db->trans_start();
        $checking_data = $this->Main_model->getSelectedData('subscriber a', 'a.*',array('a.email'=>$this->input->post('alamat_surel')))->row();
        if($checking_data==NULL){
            $get_last_id = $this->Main_model->getLastID('subscriber','id_subscriber');
            $data_insert_ = array(
                'id_subscriber' => $get_last_id['id_subscriber']+1,
                'email' => $this->input->post('alamat_surel')
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
}