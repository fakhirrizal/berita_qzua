<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct() {
        parent::__construct();
	}
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
					Aksi
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_iklan/'.md5($value->id_iklan)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_iklan/'.md5($value->id_iklan)).'">Hapus Data</a>
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
		$this->db->trans_start();
		$get_id = $this->Main_model->getLastID('iklan','id_iklan');
		$nama_file = '';

		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/iklan/'; // path folder
		$config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '3072'; // maksimum besar file 3M
		$config['max_width']  = '5000'; // lebar maksimum 5000 px
		$config['max_height']  = '5000'; // tinggi maksimu 5000 px
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
			}
		}else{echo'';}

		$data_insert1 = array(
			'id_iklan' => $get_id['id_iklan']+1,
			'judul' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('desc'),
			'tanggal_pelaksanaan' => $this->input->post('tgl'),
			'tempat' => $this->input->post('tempat'),
			'penyelenggara' => $this->input->post('by'),
			'poster' => $nama_file,
			'created_by' => $this->session->userdata('id'),
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->Main_model->insertData('iklan',$data_insert1);
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
        if($this->input->post('tgl')==$this->input->post('daterange')){
            $this->db->trans_start();
            $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/iklan/'; // path folder
            $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; // maksimum besar file 3M
            $config['max_width']  = '5000'; // lebar maksimum 5000 px
            $config['max_height']  = '5000'; // tinggi maksimu 5000 px
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
        }else{
            $check = $this->db->query("SELECT a.* FROM iklan a WHERE a.id_iklan NOT IN (".$this->input->post('id').")")->result();
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
                echo "<script>window.location='".base_url()."admin_side/detail_iklan/".md5($this->input->post('id'))."'</script>";
            }else{
                $this->db->trans_start();
                $nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
                $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/iklan/'; // path folder
                $config['allowed_types'] = 'jpg|png|jpeg|bmp'; // type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = '3072'; // maksimum besar file 3M
                $config['max_width']  = '5000'; // lebar maksimum 5000 px
                $config['max_height']  = '5000'; // tinggi maksimu 5000 px
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
            }
        }
	}
    public function hapus_iklan(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('iklan a', 'a.*',array('md5(a.id_iklan)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_iklan;
		$nama = $get_data->judul;

		$this->Main_model->deleteData('iklan',array('id_iklan'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","Menghapus data iklan (".$nama.")",$this->session->userdata('location'));
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
}