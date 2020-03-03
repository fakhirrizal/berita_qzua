<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
	}
	public function kritik_saran()
	{
		$data['parent'] = 'master';
		$data['child'] = 'kritik_saran';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/report/kritik_saran',$data);
        $this->load->view('admin/template/footer');
    }
    public function json_kritik_saran(){
		$get_data = $this->Main_model->getSelectedData('kritik_saran a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->name;
			$isi['kategori'] = $value->email;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['isi'] = $value->message;
			$isi['dibuat'] = $this->Main_model->convert_datetime($value->created_at);
            $isi['action'] = '
            <a class="btn btn-info" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_kritik_saran/'.md5($value->id)).'">
            Delete Data
            </a>
			';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
}