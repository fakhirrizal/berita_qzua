<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    /* Iklan */
	public function iklan(){
		$data['parent'] = 'setting';
		$data['child'] = 'iklan';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/iklan',$data);
        $this->load->view('admin/template/footer');
    }
    public function json_iklan(){
		$get_data = $this->Main_model->getSelectedData('iklan a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->judul;
			$isi['tgl'] = $this->Main_model->convert_tanggal($value->start_date).' sampai '.$this->Main_model->convert_tanggal($value->expired_date);
			$isi['desc'] = $value->deskripsi;
			$isi['by'] = $value->advertiser;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =
			'<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_iklan/'.md5($value->id_iklan)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_iklan/'.md5($value->id_iklan)).'">Delete Data</a>
				</div>
			</div>';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
    }
    public function tambah_iklan(){
		$data['parent'] = 'setting';
        $data['child'] = 'iklan';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/tambah_iklan',$data);
        $this->load->view('admin/template/footer');
	}
	public function simpan_iklan(){
		// $check = $this->db->query("SELECT a.* FROM iklan a")->result();
        // $tanggal_yg_mau_dicek1 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10)));
        // $tanggal_yg_mau_dicek2 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)));
        // $tanda1 = 0;
        // $tanda2 = 0;
        // foreach ($check as $key => $value) {
        //     if (($tanggal_yg_mau_dicek1 >= $value->start_date && $tanggal_yg_mau_dicek1 <= $value->expired_date)){
        //         $tanda1++;
        //         break;
        //     }else{
        //         echo '';
        //     }
        // }
        // foreach ($check as $key => $value) {
        //     if (($tanggal_yg_mau_dicek2 >= $value->start_date && $tanggal_yg_mau_dicek2 <= $value->expired_date)){
        //         $tanda2++;
        //         break;
        //     }else{
        //         echo '';
        //     }
        // }
        // if($tanda1>0 || $tanda2>0){
        //     $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>tanggal tidak tersedia.<br /></div>' );
        //     echo "<script>window.location='".base_url()."admin_side/tambah_iklan/'</script>";
        // }else{
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/iklan/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // mActionmum besar file 3M
            $config['max_width']  = '5000'; // lebar mActionmum 5000 px
            $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
            $config['file_name'] = $nmfile; // nama yang terupload nantinya
            $nama_file = '';

            $this->upload->initialize($config);

            if(isset($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    // $a = $this->upload->display_errors();
                    // echo "<script>alert('".$a."')</script>";
                    // echo "<script>window.location='".base_url('tambah_iklan')."'</script>";
                    echo'';
                }
                else
                {
                    $gbr = $this->upload->data();
                    $nama_file = $gbr['file_name'];
                }
            }else{echo'';}

            $data_insert1 = array(
                'advertiser' => $this->input->post('by'),
                'judul' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('desc'),
                'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
                'expired_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
                'price' => $this->input->post('price'),
                'banner' => $nama_file
            );
            $this->Main_model->insertData("iklan",$data_insert1);
            // print_r($data_insert1);

            $this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data iklan (".$this->input->post('nama').")",$this->session->userdata('location'));
            $this->db->trans_complete();
            if($this->db->trans_status() === false){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/tambah_iklan/'</script>";
            }
            else{
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/iklan/'</script>";
            }
        // }
	}
	public function detail_iklan(){
		$data['parent'] = 'setting';
		$data['child'] = 'iklan';
		$data['data_utama'] = $this->Main_model->getSelectedData('iklan a', 'a.*', array('md5(a.id_iklan)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/ubah_iklan',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_iklan(){
        // if($this->input->post('tgl')==$this->input->post('daterange')){
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/iklan/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // mActionmum besar file 3M
            $config['max_width']  = '5000'; // lebar mActionmum 5000 px
            $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
            $config['file_name'] = $nmfile; // nama yang terupload nantinya

            $this->upload->initialize($config);

            if(isset($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    // $a = $this->upload->display_errors();
                    // echo "<script>alert('".$a."')</script>";
                    // echo "<script>window.location='".base_url('tambah_iklan')."'</script>";
                    echo'';
                }
                else
                {
                    $gbr = $this->upload->data();
                    $nama_file = $gbr['file_name'];
                    $this->Main_model->updateData('iklan',array('banner'=>$nama_file),array('id_iklan'=>$this->input->post('id')));
                }
            }else{echo'';}

            $data_insert1 = array(
                'advertiser' => $this->input->post('by'),
                'judul' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('desc'),
                'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
                'expired_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
                'price' => $this->input->post('price')
            );
            $this->Main_model->updateData('iklan',$data_insert1,array('id_iklan'=>$this->input->post('id')));
            // print_r($data_insert1);

            $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data iklan (".$this->input->post('nama').")",$this->session->userdata('location'));
            $this->db->trans_complete();
            if($this->db->trans_status() === false){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/detail_iklan/".md5($this->input->post('id'))."'</script>";
            }
            else{
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/iklan/'</script>";
            }
        // }else{
        //     $check = $this->db->query("SELECT a.* FROM iklan a WHERE a.id_iklan NOT IN (".$this->input->post('id').")")->result();
        //     $tanggal_yg_mau_dicek1 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10)));
        //     $tanggal_yg_mau_dicek2 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)));
        //     $tanda1 = 0;
        //     $tanda2 = 0;
        //     foreach ($check as $key => $value) {
        //         if (($tanggal_yg_mau_dicek1 >= $value->start_date && $tanggal_yg_mau_dicek1 <= $value->expired_date)){
        //             $tanda1++;
        //             break;
        //         }else{
        //             echo '';
        //         }
        //     }
        //     foreach ($check as $key => $value) {
        //         if (($tanggal_yg_mau_dicek2 >= $value->start_date && $tanggal_yg_mau_dicek2 <= $value->expired_date)){
        //             $tanda2++;
        //             break;
        //         }else{
        //             echo '';
        //         }
        //     }
        //     if($tanda1>0 || $tanda2>0){
        //         $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>tanggal tidak tersedia.<br /></div>' );
        //         echo "<script>window.location='".base_url()."admin_side/detail_iklan/".md5($this->input->post('id'))."'</script>";
        //     }else{
        //         $this->db->trans_start();
        //         $nmfile = "file_".time(); 
        //         $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/iklan/'; 
        //         $config['allowed_types'] = 'jpg|png|jpeg|bmp'; 
        //         $config['max_size'] = '3072'; 
        //         $config['max_width']  = '5000'; 
        //         $config['max_height']  = '5000'; 
        //         $config['file_name'] = $nmfile; 
    
        //         $this->upload->initialize($config);
    
        //         if(isset($_FILES['foto']['name']))
        //         {
        //             if(!$this->upload->do_upload('foto'))
        //             {
        //                 echo'';
        //             }
        //             else
        //             {
        //                 $gbr = $this->upload->data();
        //                 $nama_file = $gbr['file_name'];
        //                 $this->Main_model->updateData('iklan',array('banner'=>$nama_file),array('id_iklan'=>$this->input->post('id')));
        //             }
        //         }else{echo'';}
    
        //         $data_insert1 = array(
        //             'advertiser' => $this->input->post('by'),
        //             'judul' => $this->input->post('nama'),
        //             'deskripsi' => $this->input->post('desc'),
        //             'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
        //             'expired_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
        //             'price' => $this->input->post('price')
        //         );
        //         $this->Main_model->updateData('iklan',$data_insert1,array('id_iklan'=>$this->input->post('id')));
    
        //         $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data iklan (".$this->input->post('nama').")",$this->session->userdata('location'));
        //         $this->db->trans_complete();
        //         if($this->db->trans_status() === false){
        //             $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
        //             echo "<script>window.location='".base_url()."admin_side/detail_iklan/".md5($this->input->post('id'))."'</script>";
        //         }
        //         else{
        //             $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
        //             echo "<script>window.location='".base_url()."admin_side/iklan/'</script>";
        //         }
        //     }
        // }
	}
    public function hapus_iklan(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('iklan a', 'a.*',array('md5(a.id_iklan)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_iklan;
		$nama = $get_data->judul;

		$this->Main_model->deleteData('iklan',array('id_iklan'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Deleted iklan data (".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/iklan/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/iklan/'</script>";
		}
    }
    /* Partner */
	public function partner(){
		$data['parent'] = 'setting';
		$data['child'] = 'partner';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/partner',$data);
        $this->load->view('admin/template/footer');
    }
    public function json_partner(){
		$get_data = $this->Main_model->getSelectedData('partner a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->name;
			$isi['tgl'] = $this->Main_model->convert_tanggal($value->start_date).' sampai '.$this->Main_model->convert_tanggal($value->end_date);
			$isi['desc'] = '<img src="'.base_url().'data_upload/partner/'.$value->logo.'" width="70px" />';
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =
			'<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_partner/'.md5($value->id_partner)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_partner/'.md5($value->id_partner)).'">Delete Data</a>
				</div>
			</div>';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
    }
    public function tambah_partner(){
		$data['parent'] = 'setting';
        $data['child'] = 'partner';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/tambah_partner',$data);
        $this->load->view('admin/template/footer');
	}
	public function simpan_partner(){
		// $check = $this->db->query("SELECT a.* FROM partner a")->result();
        // $tanggal_yg_mau_dicek1 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10)));
        // $tanggal_yg_mau_dicek2 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)));
        // $tanda1 = 0;
        // $tanda2 = 0;
        // foreach ($check as $key => $value) {
        //     if (($tanggal_yg_mau_dicek1 >= $value->start_date && $tanggal_yg_mau_dicek1 <= $value->expired_date)){
        //         $tanda1++;
        //         break;
        //     }else{
        //         echo '';
        //     }
        // }
        // foreach ($check as $key => $value) {
        //     if (($tanggal_yg_mau_dicek2 >= $value->start_date && $tanggal_yg_mau_dicek2 <= $value->expired_date)){
        //         $tanda2++;
        //         break;
        //     }else{
        //         echo '';
        //     }
        // }
        // if($tanda1>0 || $tanda2>0){
        //     $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>tanggal tidak tersedia.<br /></div>' );
        //     echo "<script>window.location='".base_url()."admin_side/tambah_partner/'</script>";
        // }else{
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/partner/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // mActionmum besar file 3M
            $config['max_width']  = '5000'; // lebar mActionmum 5000 px
            $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
            $config['file_name'] = $nmfile; // nama yang terupload nantinya
            $nama_file = '';

            $this->upload->initialize($config);

            if(isset($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    // $a = $this->upload->display_errors();
                    // echo "<script>alert('".$a."')</script>";
                    // echo "<script>window.location='".base_url('tambah_partner')."'</script>";
                    echo'';
                }
                else
                {
                    $gbr = $this->upload->data();
                    $nama_file = $gbr['file_name'];
                }
            }else{echo'';}

            $data_insert1 = array(
                'name' => $this->input->post('by'),
                'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
                'end_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
                'logo' => $nama_file
            );
            $this->Main_model->insertData("partner",$data_insert1);
            // print_r($data_insert1);

            $this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data partner (".$this->input->post('by').")",$this->session->userdata('location'));
            $this->db->trans_complete();
            if($this->db->trans_status() === false){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/tambah_partner/'</script>";
            }
            else{
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/partner/'</script>";
            }
        // }
	}
	public function detail_partner(){
		$data['parent'] = 'setting';
		$data['child'] = 'partner';
		$data['data_utama'] = $this->Main_model->getSelectedData('partner a', 'a.*', array('md5(a.id_partner)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/ubah_partner',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_partner(){
        // if($this->input->post('tgl')==$this->input->post('daterange')){
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/partner/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // mActionmum besar file 3M
            $config['max_width']  = '5000'; // lebar mActionmum 5000 px
            $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
            $config['file_name'] = $nmfile; // nama yang terupload nantinya

            $this->upload->initialize($config);

            if(isset($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    // $a = $this->upload->display_errors();
                    // echo "<script>alert('".$a."')</script>";
                    // echo "<script>window.location='".base_url('tambah_partner')."'</script>";
                    echo'';
                }
                else
                {
                    $gbr = $this->upload->data();
                    $nama_file = $gbr['file_name'];
                    $this->Main_model->updateData('partner',array('logo'=>$nama_file),array('id_partner'=>$this->input->post('id')));
                }
            }else{echo'';}

            $data_insert1 = array(
                'name' => $this->input->post('by'),
                'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
                'end_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)))
            );
            $this->Main_model->updateData('partner',$data_insert1,array('id_partner'=>$this->input->post('id')));
            // print_r($data_insert1);

            $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data partner (".$this->input->post('by').")",$this->session->userdata('location'));
            $this->db->trans_complete();
            if($this->db->trans_status() === false){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/detail_partner/".md5($this->input->post('id'))."'</script>";
            }
            else{
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/partner/'</script>";
            }
        // }else{
        //     $check = $this->db->query("SELECT a.* FROM partner a WHERE a.id_partner NOT IN (".$this->input->post('id').")")->result();
        //     $tanggal_yg_mau_dicek1 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10)));
        //     $tanggal_yg_mau_dicek2 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)));
        //     $tanda1 = 0;
        //     $tanda2 = 0;
        //     foreach ($check as $key => $value) {
        //         if (($tanggal_yg_mau_dicek1 >= $value->start_date && $tanggal_yg_mau_dicek1 <= $value->expired_date)){
        //             $tanda1++;
        //             break;
        //         }else{
        //             echo '';
        //         }
        //     }
        //     foreach ($check as $key => $value) {
        //         if (($tanggal_yg_mau_dicek2 >= $value->start_date && $tanggal_yg_mau_dicek2 <= $value->expired_date)){
        //             $tanda2++;
        //             break;
        //         }else{
        //             echo '';
        //         }
        //     }
        //     if($tanda1>0 || $tanda2>0){
        //         $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>tanggal tidak tersedia.<br /></div>' );
        //         echo "<script>window.location='".base_url()."admin_side/detail_partner/".md5($this->input->post('id'))."'</script>";
        //     }else{
        //         $this->db->trans_start();
        //         $nmfile = "file_".time(); 
        //         $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/partner/'; 
        //         $config['allowed_types'] = 'jpg|png|jpeg|bmp'; 
        //         $config['max_size'] = '3072'; 
        //         $config['max_width']  = '5000'; 
        //         $config['max_height']  = '5000'; 
        //         $config['file_name'] = $nmfile; 
    
        //         $this->upload->initialize($config);
    
        //         if(isset($_FILES['foto']['name']))
        //         {
        //             if(!$this->upload->do_upload('foto'))
        //             {
        //                 echo'';
        //             }
        //             else
        //             {
        //                 $gbr = $this->upload->data();
        //                 $nama_file = $gbr['file_name'];
        //                 $this->Main_model->updateData('partner',array('banner'=>$nama_file),array('id_partner'=>$this->input->post('id')));
        //             }
        //         }else{echo'';}
    
        //         $data_insert1 = array(
        //             'advertiser' => $this->input->post('by'),
        //             'judul' => $this->input->post('nama'),
        //             'deskripsi' => $this->input->post('desc'),
        //             'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
        //             'expired_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
        //             'price' => $this->input->post('price')
        //         );
        //         $this->Main_model->updateData('partner',$data_insert1,array('id_partner'=>$this->input->post('id')));
    
        //         $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data partner (".$this->input->post('nama').")",$this->session->userdata('location'));
        //         $this->db->trans_complete();
        //         if($this->db->trans_status() === false){
        //             $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
        //             echo "<script>window.location='".base_url()."admin_side/detail_partner/".md5($this->input->post('id'))."'</script>";
        //         }
        //         else{
        //             $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
        //             echo "<script>window.location='".base_url()."admin_side/partner/'</script>";
        //         }
        //     }
        // }
	}
    public function hapus_partner(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('partner a', 'a.*',array('md5(a.id_partner)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_partner;
		$nama = $get_data->name;

		$this->Main_model->deleteData('partner',array('id_partner'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Deleted partner data (".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/partner/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/partner/'</script>";
		}
    }
    /* Cover */
    public function cover(){
		$data['parent'] = 'setting';
		$data['child'] = 'cover';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/cover',$data);
        $this->load->view('admin/template/footer');
    }
    public function json_cover(){
		$get_data = $this->Main_model->getSelectedData('cover a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['page'] = $value->page;
			$isi['title'] = $value->title;
			$isi['image'] = '<img src="'.base_url().'data_upload/cover/'.$value->file.'" width="70px" />';
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =
			'<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_cover/'.md5($value->id_cover)).'">Detail Data</a>
				</div>
			</div>';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
    }
    public function tambah_cover(){
		$data['parent'] = 'setting';
        $data['child'] = 'cover';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/tambah_cover',$data);
        $this->load->view('admin/template/footer');
	}
	public function simpan_cover(){
		$check = $this->db->query("SELECT a.* FROM cover a")->result();
        $tanggal_yg_mau_dicek1 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10)));
        $tanggal_yg_mau_dicek2 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)));
        $tanda1 = 0;
        $tanda2 = 0;
        foreach ($check as $key => $value) {
            if (($tanggal_yg_mau_dicek1 >= $value->start_date && $tanggal_yg_mau_dicek1 <= $value->expired_date)){
                $tanda1++;
                break;
            }else{
                echo '';
            }
        }
        foreach ($check as $key => $value) {
            if (($tanggal_yg_mau_dicek2 >= $value->start_date && $tanggal_yg_mau_dicek2 <= $value->expired_date)){
                $tanda2++;
                break;
            }else{
                echo '';
            }
        }
        if($tanda1>0 || $tanda2>0){
            $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>tanggal tidak tersedia.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/tambah_cover/'</script>";
        }else{
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/cover/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // mActionmum besar file 3M
            $config['max_width']  = '5000'; // lebar mActionmum 5000 px
            $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
            $config['file_name'] = $nmfile; // nama yang terupload nantinya
            $nama_file = '';

            $this->upload->initialize($config);

            if(isset($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    // $a = $this->upload->display_errors();
                    // echo "<script>alert('".$a."')</script>";
                    // echo "<script>window.location='".base_url('tambah_cover')."'</script>";
                    echo'';
                }
                else
                {
                    $gbr = $this->upload->data();
                    $nama_file = $gbr['file_name'];
                }
            }else{echo'';}

            $data_insert1 = array(
                'advertiser' => $this->input->post('by'),
                'judul' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('desc'),
                'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
                'expired_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
                'price' => $this->input->post('price'),
                'banner' => $nama_file
            );
            $this->Main_model->insertData("cover",$data_insert1);
            // print_r($data_insert1);

            $this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data cover (".$this->input->post('nama').")",$this->session->userdata('location'));
            $this->db->trans_complete();
            if($this->db->trans_status() === false){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/tambah_cover/'</script>";
            }
            else{
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/cover/'</script>";
            }
        }
	}
	public function detail_cover(){
		$data['parent'] = 'setting';
		$data['child'] = 'cover';
		$data['data_utama'] = $this->Main_model->getSelectedData('cover a', 'a.*', array('md5(a.id_cover)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/ubah_cover',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_cover(){
        if($this->input->post('tgl')==$this->input->post('daterange')){
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/cover/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // mActionmum besar file 3M
            $config['max_width']  = '5000'; // lebar mActionmum 5000 px
            $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
            $config['file_name'] = $nmfile; // nama yang terupload nantinya

            $this->upload->initialize($config);

            if(isset($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    // $a = $this->upload->display_errors();
                    // echo "<script>alert('".$a."')</script>";
                    // echo "<script>window.location='".base_url('tambah_cover')."'</script>";
                    echo'';
                }
                else
                {
                    $gbr = $this->upload->data();
                    $nama_file = $gbr['file_name'];
                    $this->Main_model->updateData('cover',array('file'=>$nama_file),array('id_cover'=>$this->input->post('id')));
                }
            }else{echo'';}

            $data_insert1 = array(
                'title' => $this->input->post('nama')
            );
            $this->Main_model->updateData('cover',$data_insert1,array('id_cover'=>$this->input->post('id')));
            // print_r($data_insert1);

            $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data cover (".$this->input->post('nama').")",$this->session->userdata('location'));
            $this->db->trans_complete();
            if($this->db->trans_status() === false){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/detail_cover/".md5($this->input->post('id'))."'</script>";
            }
            else{
                $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/cover/'</script>";
            }
        }else{
            $check = $this->db->query("SELECT a.* FROM cover a WHERE a.id_cover NOT IN (".$this->input->post('id').")")->result();
            $tanggal_yg_mau_dicek1 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10)));
            $tanggal_yg_mau_dicek2 = date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10)));
            $tanda1 = 0;
            $tanda2 = 0;
            foreach ($check as $key => $value) {
                if (($tanggal_yg_mau_dicek1 >= $value->start_date && $tanggal_yg_mau_dicek1 <= $value->expired_date)){
                    $tanda1++;
                    break;
                }else{
                    echo '';
                }
            }
            foreach ($check as $key => $value) {
                if (($tanggal_yg_mau_dicek2 >= $value->start_date && $tanggal_yg_mau_dicek2 <= $value->expired_date)){
                    $tanda2++;
                    break;
                }else{
                    echo '';
                }
            }
            if($tanda1>0 || $tanda2>0){
                $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>tanggal tidak tersedia.<br /></div>' );
                echo "<script>window.location='".base_url()."admin_side/detail_cover/".md5($this->input->post('id'))."'</script>";
            }else{
                $this->db->trans_start();
                $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
                $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/cover/'; // path folder
                $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = '3072'; // mActionmum besar file 3M
                $config['max_width']  = '5000'; // lebar mActionmum 5000 px
                $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
                $config['file_name'] = $nmfile; // nama yang terupload nantinya
    
                $this->upload->initialize($config);
    
                if(isset($_FILES['foto']['name']))
                {
                    if(!$this->upload->do_upload('foto'))
                    {
                        // $a = $this->upload->display_errors();
                        // echo "<script>alert('".$a."')</script>";
                        // echo "<script>window.location='".base_url('tambah_cover')."'</script>";
                        echo'';
                    }
                    else
                    {
                        $gbr = $this->upload->data();
                        $nama_file = $gbr['file_name'];
                        $this->Main_model->updateData('cover',array('banner'=>$nama_file),array('id_cover'=>$this->input->post('id')));
                    }
                }else{echo'';}
    
                $data_insert1 = array(
                    'advertiser' => $this->input->post('by'),
                    'judul' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('desc'),
                    'start_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),0,10))),
                    'expired_date' => date('Y-m-d', strtotime(substr($this->input->post('daterange'),13,10))),
                    'price' => $this->input->post('price')
                );
                $this->Main_model->updateData('cover',$data_insert1,array('id_cover'=>$this->input->post('id')));
                // print_r($data_insert1);
    
                $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data cover (".$this->input->post('nama').")",$this->session->userdata('location'));
                $this->db->trans_complete();
                if($this->db->trans_status() === false){
                    $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
                    echo "<script>window.location='".base_url()."admin_side/detail_cover/".md5($this->input->post('id'))."'</script>";
                }
                else{
                    $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
                    echo "<script>window.location='".base_url()."admin_side/cover/'</script>";
                }
            }
        }
	}
    public function hapus_cover(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('cover a', 'a.*',array('md5(a.id_cover)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_cover;
		$nama = $get_data->judul;

		$this->Main_model->deleteData('cover',array('id_cover'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Deleted cover data (".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/cover/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/cover/'</script>";
		}
    }
    /* Slider */
    public function slider(){
		$data['parent'] = 'setting';
		$data['child'] = 'slider';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/slider',$data);
        $this->load->view('admin/template/footer');
    }
    public function json_slider(){
		$get_data = $this->Main_model->getSelectedData('slider a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['title'] = $value->title;
			$isi['description'] = $value->description;
			$isi['file'] = '<img src="'.base_url().'data_upload/slider/'.$value->file.'" width="70px" alt="'.$value->title.'"/>';
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =
			'<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_slider/'.md5($value->id_slider)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_slider/'.md5($value->id_slider)).'">Delete Data</a>
				</div>
			</div>';
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
    }
    public function tambah_slider(){
		$data['parent'] = 'setting';
        $data['child'] = 'slider';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/tambah_slider',$data);
        $this->load->view('admin/template/footer');
	}
	public function simpan_slider(){
        $this->db->trans_start();
        $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/slider/'; // path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; // mActionmum besar file 3M
        $config['max_width']  = '5000'; // lebar mActionmum 5000 px
        $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
        $config['file_name'] = $nmfile; // nama yang terupload nantinya
        $nama_file = '';

        $this->upload->initialize($config);

        if(isset($_FILES['foto']['name']))
        {
            if(!$this->upload->do_upload('foto'))
            {
                // $a = $this->upload->display_errors();
                // echo "<script>alert('".$a."')</script>";
                // echo "<script>window.location='".base_url('tambah_slider')."'</script>";
                echo'';
            }
            else
            {
                $gbr = $this->upload->data();
                $nama_file = $gbr['file_name'];
            }
        }else{echo'';}

        $data_insert1 = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'file' => $nama_file,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->Main_model->insertData("slider",$data_insert1);
        // print_r($data_insert1);

        $this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data slider",$this->session->userdata('location'));
        $this->db->trans_complete();
        if($this->db->trans_status() === false){
            $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/tambah_slider/'</script>";
        }
        else{
            $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/slider/'</script>";
        }
	}
	public function detail_slider(){
		$data['parent'] = 'setting';
		$data['child'] = 'slider';
		$data['data_utama'] = $this->Main_model->getSelectedData('slider a', 'a.*', array('md5(a.id_slider)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/setting/ubah_slider',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_slider(){
        $this->db->trans_start();
        $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/slider/'; // path folder
        $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; // mActionmum besar file 3M
        $config['max_width']  = '5000'; // lebar mActionmum 5000 px
        $config['max_height']  = '5000'; // tinggi mActionmu 5000 px
        $config['file_name'] = $nmfile; // nama yang terupload nantinya

        $this->upload->initialize($config);

        if(isset($_FILES['foto']['name']))
        {
            if(!$this->upload->do_upload('foto'))
            {
                // $a = $this->upload->display_errors();
                // echo "<script>alert('".$a."')</script>";
                // echo "<script>window.location='".base_url('tambah_slider')."'</script>";
                echo'';
            }
            else
            {
                $gbr = $this->upload->data();
                $nama_file = $gbr['file_name'];
                $this->Main_model->updateData('slider',array('file'=>$nama_file),array('id_slider'=>$this->input->post('id')));
            }
        }else{echo'';}

        $data_insert1 = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->Main_model->updateData('slider',$data_insert1,array('id_slider'=>$this->input->post('id')));
        // print_r($data_insert1);

        $this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Updating data image slider",$this->session->userdata('location'));
        $this->db->trans_complete();
        if($this->db->trans_status() === false){
            $this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/detail_slider/".md5($this->input->post('id'))."'</script>";
        }
        else{
            $this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
            echo "<script>window.location='".base_url()."admin_side/slider/'</script>";
        }
	}
    public function hapus_slider(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('slider a', 'a.*',array('md5(a.id_slider)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_slider;

		$this->Main_model->deleteData('slider',array('id_slider'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Delete data slider",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/slider/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/slider/'</script>";
		}
	}
}