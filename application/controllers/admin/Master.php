<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	/* Administrator */
	public function data_administrator()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/data_administrator',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_admin(){
		$get_data1 = $this->Main_model->getSelectedData('user a', 'a.*', array("a.is_active" => '1','a.deleted' => '0','b.role_id' => '1'), '', '', '', '', array(
			'table' => 'user_to_role b',
			'on' => 'a.id=b.user_id',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data1 as $key => $value) {
			if($value->id==$this->session->userdata('id')){
				echo'';
			}else{
				$isi['number'] = $no++.'.';
				$isi['nama'] = $value->fullname;
				$isi['username'] = $value->username;
				$isi['total_login'] = number_format($value->total_login,0).'x';
				$pecah_tanggal = explode(' ',$value->last_activity);
				if($value->last_activity==NULL){
					$isi['last_activity'] = '-';
				}else{
					$isi['last_activity'] = $this->Main_model->convert_tanggal($pecah_tanggal[0]).' '.substr($pecah_tanggal[1],0,5);
				}
				$return_on_click = "return confirm('Anda yakin?')";
				$isi['action'] =
				'<div class="dropdown no-arrow mb-4">
					<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_admin/'.md5($value->id)).'">Delete Data</a>
						<hr>
						<a class="dropdown-item" href="'.site_url('admin_side/atur_ulang_kata_sandi_admin/'.md5($value->id)).'">Reset Password</a>
					</div>
				</div>';
				$data_tampil[] = $isi;
			}
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function tambah_data_administrator()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/tambah_data_administrator',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_data_administrator(){
		$cek_ = $this->Main_model->getSelectedData('user a', 'a.*',array('a.username'=>$this->input->post('un')))->row();
		if($cek_==NULL){
			$this->db->trans_start();
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $this->input->post('un'),
				'fullname' => $this->input->post('nama'),
				'pass' => $this->input->post('ps'),
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);
			// print_r($data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => '1'
			);
			$this->Main_model->insertData('user_to_role',$data_insert2);
			// print_r($data_insert2);

			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data Admin (".$this->input->post('nama').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_admin/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Username telah digunakan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_admin/'</script>";
		}
	}
	public function detail_data_administrator()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		
		// $data['data_utama'] =  $this->Main_model->getSelectedData('kube a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		// $data['riwayat_pembayaran'] = $this->Main_model->getSelectedData('purchasing a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->result();
		// $data['riwayat_kehadiran'] = $this->Main_model->getSelectedData('presence a', 'a.*', array('md5(a.user_id)'=>$this->uri->segment(3)))->result_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/detail_data_administrator',$data);
		$this->load->view('admin/template/footer');
	}
	public function ubah_data_administrator()
	{
		$data['parent'] = 'master';
		$data['child'] = 'administrator';
		
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('md5(a.id)'=>$this->uri->segment(3),'a.deleted'=>'0'))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/ubah_data_administrator',$data);
		$this->load->view('admin/template/footer');
	}
	public function perbarui_data_administrator(){
		if($this->input->post('un')!=NULL){
			$cek_ = $this->db->query("SELECT a.* FROM user a WHERE a.username='".$this->input->post('un')."' AND md5(a.id) NOT IN ('".$this->input->post('user_id')."')")->row();
			if($cek_==NULL){
				$this->db->trans_start();
				if($this->input->post('ps')!=NULL){
					$data_insert1 = array(
						'username' => $this->input->post('un'),
						'pass' => $this->input->post('ps')
					);
					$this->Main_model->updateData('user',$data_insert1,array('md5(id)'=>$this->input->post('user_id')));
					// print_r($data_insert1);
				}
				else{
					$data_insert1 = array(
						'username' => $this->input->post('un')
					);
					$this->Main_model->updateData('user',$data_insert1,array('md5(id)'=>$this->input->post('user_id')));
					// print_r($data_insert1);
				}

				$this->db->trans_complete();
				if($this->db->trans_status() === false){
					$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
					echo "<script>window.location='".base_url()."admin_side/tambah_data_admin/'</script>";
				}
				else{
					$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
					echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
				}
			}else{
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Username telah digunakan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_admin/'</script>";
			}
		}elseif($this->input->post('ps')!=NULL){
			$this->db->trans_start();

			$data_insert1 = array(
				'pass' => $this->input->post('ps')
			);
			$this->Main_model->updateData('user',$data_insert1,array('md5(id)'=>$this->input->post('user_id')));
			// print_r($data_insert1);

			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_admin/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
			}
		}else{
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	public function atur_ulang_kata_sandi_admin(){
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('user a', 'a.*',array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$user_id = $get_data->id;
		$name = $get_data->fullname;

		$this->Main_model->updateData('user',array('pass'=>'1234'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Updating data","Mengatur ulang kata sandi akun (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	public function download_admin_data(){
		$this->load->view('admin/master/cetak_data_admin');
	}
	public function hapus_data_administrator(){
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('user a', 'a.*',array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$user_id = $get_data->id;
		$name = $get_data->fullname;

		$this->Main_model->updateData('user',array('is_active'=>'0','deleted'=>'1'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","MengDelete Data akun (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/administrator/'</script>";
		}
	}
	/* Member */
	public function data_anggota()
	{
		$data['parent'] = 'master';
		$data['child'] = 'member';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/data_anggota',$data);
		$this->load->view('admin/template/footer');
	}
	public function json_member(){
		$get_data1 = $this->Main_model->getSelectedData('siswa a', 'a.*,b.is_active',array('b.deleted' => '0'),'','','','',array(
			array(
				'table' => 'user b',
				'on' => 'a.user_id=b.id',
				'pos' => 'LEFT'
			)
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data1 as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->user_id.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['role'] = 'Siswa';
			if($value->is_active=='1'){
				$isi['status'] = '<span class="label label-success"> Aktif </span>';
			}else{
				$isi['status'] = '<span class="label label-danger"> Tidak Aktif </span>';
			}
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group" style="text-align: center;">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="'.site_url('admin_side/ubah_data_anggota/'.md5($value->user_id)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_anggota/'.md5($value->user_id)).'">
												<i class="icon-trash"></i> Delete Data </a>
										</li>
										<li class="divider"> </li>
										<li>
											<a href="'.site_url('admin_side/atur_ulang_kata_sandi_anggota/'.md5($value->user_id)).'">
												<i class="fa fa-refresh"></i> Atur Ulang Sandi
											</a>
										</li>
									</ul>
								</div>
								';
			$data_tampil[] = $isi;
		}
		$get_data2 = $this->Main_model->getSelectedData('guru a', 'a.*,b.is_active',array('b.deleted' => '0'),'','','','',array(
			array(
				'table' => 'user b',
				'on' => 'a.user_id=b.id',
				'pos' => 'LEFT'
			)
		))->result();
		foreach ($get_data2 as $key => $value) {
			$isi['checkbox'] =	'
								<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="'.$value->user_id.'"/>
									<span></span>
								</label>
								';
			$isi['number'] = $no++.'.';
			$isi['nama'] = $value->nama;
			$isi['role'] = 'Guru';
			if($value->is_active=='1'){
				$isi['status'] = '<span class="label label-success"> Aktif </span>';
			}else{
				$isi['status'] = '<span class="label label-danger"> Tidak Aktif </span>';
			}
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
								<div class="btn-group" style="text-align: center;">
									<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="'.site_url('admin_side/ubah_data_anggota/'.md5($value->user_id)).'">
												<i class="icon-wrench"></i> Ubah Data </a>
										</li>
										<li>
											<a onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_data_anggota/'.md5($value->user_id)).'">
												<i class="icon-trash"></i> Delete Data </a>
										</li>
										<li class="divider"> </li>
										<li>
											<a href="'.site_url('admin_side/atur_ulang_kata_sandi_anggota/'.md5($value->user_id)).'">
												<i class="fa fa-refresh"></i> Atur Ulang Sandi
											</a>
										</li>
									</ul>
								</div>
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
	public function tambah_data_anggota()
	{
		$data['parent'] = 'master';
		$data['child'] = 'member';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/master/tambah_data_anggota',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_data_anggota(){
		$cek_ = $this->Main_model->getSelectedData('user a', 'a.*',array('a.username'=>$this->input->post('un')))->row();
		if($cek_==NULL){
			$this->db->trans_start();
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $this->input->post('un'),
				'pass' => $this->input->post('ps'),
				'fullname' => $this->input->post('nama'),
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);
			// print_r($data_insert1);

			if($this->input->post('role')=='2'){
				$data_insert2 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat')
				);
				$this->Main_model->insertData('guru',$data_insert2);
				// print_r($data_insert2);
			}else{
				$data_insert2 = array(
					'user_id' => $get_user_id['id']+1,
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat')
				);
				$this->Main_model->insertData('siswa',$data_insert2);
				// print_r($data_insert2);
			}
			
			$data_insert3 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => $this->input->post('role')
			);
			$this->Main_model->insertData('user_to_role',$data_insert3);
			// print_r($data_insert3);

			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data Pengguna (".$this->input->post('nama').")",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/tambah_data_anggota/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/data_anggota/'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>Username telah digunakan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_data_anggota/'</script>";
		}
		
	}
	public function reset_password_member_account(){
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('user a', 'a.*',array('md5(a.id)'=>$this->uri->segment(3)))->row();
		$user_id = $get_data->id;
		$name = $get_data->fullname;

		$this->Main_model->updateData('user',array('pass'=>'1234'),array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Update member's data","Reset password member's account (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_anggota/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diubah.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_anggota/'</script>";
		}
	}
	public function hapus_data_anggota(){
		$this->db->trans_start();
		$user_id = '';
		$name = '';
		$get_data = $this->Main_model->getSelectedData('user_to_role a', 'a.*,b.fullname', array('md5(a.user_id)'=>$this->uri->segment(3)), '', '', '', '', array(
			'table' => 'user b',
			'on' => 'a.user_id=b.id',
			'pos' => 'LEFT'
		))->row();
		$user_id = $get_data->user_id;
		$name = $get_data->fullname;

		if($get_data->role_id=='2'){
			$this->Main_model->deleteData('guru',array('user_id'=>$user_id));
		}else{
			$this->Main_model->deleteData('siswa',array('user_id'=>$user_id));
		}
		$this->Main_model->deleteData('user_to_role',array('user_id'=>$user_id));
		$this->Main_model->deleteData('user',array('id'=>$user_id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting member's data","Delete member's data (".$name.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_anggota/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/data_anggota/'</script>";
		}
	}
	/* Subscriber */
	public function subscriber(){
		$data['parent'] = 'master';
        $data['child'] = 'subscriber';
        
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/subscriber',$data);
        $this->load->view('admin/template/footer');
	}
	public function json_subscriber(){
		$get_data = $this->Main_model->getSelectedData('subscriber a', 'a.*')->result();
        $data_tampil = array();
        $no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->email;
			$isi['isi'] = number_format($value->counter,0).' x';
			$pecah_tanggal = explode(' ',$value->created_at);
			$isi['action'] = $this->Main_model->convert_tanggal($pecah_tanggal[0]).' '.substr($pecah_tanggal[1],0,5);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	/* Master Kategori Berita*/
	public function kategori_berita(){
		$data['parent'] = 'master';
        $data['child'] = 'kategori_berita';
        
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/kategori_berita',$data);
        $this->load->view('admin/template/footer');
	}
	public function json_kategori_berita(){
		$get_data = $this->Main_model->getSelectedData('kategori_berita a', 'a.*')->result();
        $data_tampil = array();
        $no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->kategori_berita;
			$check_berita = $this->db->query("SELECT * FROM `berita` WHERE `id_kategori_berita` LIKE '%".$value->id_kategori_berita."%'")->result();
            $tampung_real = 0;
            foreach ($check_berita as $key => $row) {
                $pecah_kategori = explode(',',$row->id_kategori_berita);
                for ($i=0; $i < count($pecah_kategori); $i++) { 
                    if($pecah_kategori[$i]==$value->id_kategori_berita){
                        $tampung_real++;
                        break;
                    }else{
                        echo'';
                    }
                }
            }
            $isi['isi'] = number_format($tampung_real,0).' News';
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
			<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_kategori_berita/'.md5($value->id_kategori_berita)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_kategori_berita/'.md5($value->id_kategori_berita)).'">Delete Data</a>
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
	public function tambah_kategori_berita(){
		$data['parent'] = 'master';
        $data['child'] = 'kategori_berita';
		
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/tambah_kategori_berita',$data);
        $this->load->view('admin/template/footer');
	}
	public function simpan_kategori_berita(){
		$check = $this->Main_model->getSelectedData('kategori_berita a', 'a.*', array('a.kategori_berita'=>$this->input->post('nama')))->row();
		if($check==NULL){
			$this->db->trans_start();

			// $get_last_id = $this->Main_model->getLastID('kategori_berita','id_kategori_berita');

			$data_insert_ = array(
				// 'id_kategori_berita' => $get_last_id['id_kategori_berita']+1,
				'kategori_berita' => $this->input->post('nama')
			);
			$this->Main_model->insertData("kategori_berita",$data_insert_);

			$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data kategori berita",$this->session->userdata('location'));
			$this->db->trans_complete();
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal disimpan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/kategori_berita'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil disimpan.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/kategori_berita/'</script>";
			}
		}else{
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kategori_berita'</script>";
		}
	}
	public function detail_kategori_berita(){
		$data['parent'] = 'master';
        $data['child'] = 'kategori_berita';
		
		$data['data_utama'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('md5(a.id_kategori_berita)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/detail_kategori_berita',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_kategori_berita(){
		$this->db->trans_start();
		$data_insert_1 = array(
			'kategori_berita' => $this->input->post('nama')
		);
		$this->Main_model->updateData('kategori_berita',$data_insert_1,array('md5(id_kategori_berita)'=>$this->input->post('id')));
		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data kategori_berita (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kategori_berita'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kategori_berita/'</script>";
		}
	}
	public function hapus_kategori_berita(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('kategori_berita a', 'a.*',array('md5(a.id_kategori_berita)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_kategori_berita;
		$nama = $get_data->kategori_berita;

		$this->Main_model->deleteData('kategori_berita',array('id_kategori_berita'=>$id));
		// $this->Main_model->updateData('kategori_berita',array('deleted'=>'1'),array('md5(id_kategori_berita)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","MengDelete Data kategori berita (".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kategori_berita/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/kategori_berita/'</script>";
		}
	}
	/* Data Berita */
	public function berita(){
		$data['parent'] = 'master';
        $data['child'] = 'berita';
        
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/berita',$data);
        $this->load->view('admin/template/footer');
	}
	public function json_berita(){
		$get_data = $this->Main_model->getSelectedData('berita a', 'a.*')->result();
        $data_tampil = array();
        $no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->judul;
			$berita = '';
			$jumlah_karakter = strlen($value->berita);
			if($jumlah_karakter>70){
				$berita = substr($value->berita,0,69).'[....]';
			}else{
				$berita = $value->berita;
			}
			$isi['isi'] = $berita;
			$kategori = '';
			$pecah_kategori = explode(',',$value->id_kategori_berita);
			$hitung_urutan = (count($pecah_kategori))-1;
			for ($i=0; $i < count($pecah_kategori); $i++) {
				$get_data_kategori = $this->Main_model->getSelectedData('kategori_berita a', 'a.*', array('a.id_kategori_berita'=>$pecah_kategori[$i]))->row();
				if($get_data_kategori==NULL){
					echo'';
				}else{
					if($i==$hitung_urutan){
						$kategori .= $get_data_kategori->kategori_berita;
					}else{
						$kategori .= $get_data_kategori->kategori_berita.'<br>';
					}
				}
			}
			$isi['kategori'] = $kategori;
			$dibuat = '';
			$pecah_tanggal = explode(' ',$value->created_at);
			$dibuat = $this->Main_model->convert_tanggal($pecah_tanggal[0]).' '.substr($pecah_tanggal[1],0,5);
			$isi['dibuat'] = $dibuat;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =	'
			<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_berita/'.md5($value->id_berita)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_berita/'.md5($value->id_berita)).'">Delete Data</a>
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
	public function tambah_berita(){
		$data['parent'] = 'master';
        $data['child'] = 'berita';
		$data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*')->result();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/tambah_berita',$data);
		$this->load->view('admin/template/footer');
	}
	public function simpan_berita(){
		$this->db->trans_start();
		$id_kategori_berita = '';
		$nama_file = '';
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/berita/'; // path folder
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
			}
		}else{echo'';}
		$id_kategori_berita = implode(',',$this->input->post('kat'));
		$data_insert1 = array(
			'id_kategori_berita' => $id_kategori_berita,
			'judul' => $this->input->post('nama'),
			'berita' => $this->input->post('desc'),
			'thumbnail' => $nama_file,
			'created_by' => $this->session->userdata('id'),
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->Main_model->insertData('berita',$data_insert1);

		$get_subscriber = $this->Main_model->getSelectedData('subscriber a', 'a.*')->result();

		require_once(APPPATH.'libraries/class.phpmailer.php');

		$mail = new PHPMailer; 
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl'; 
		$mail->Host = "eaoron.co.id";
		// $mail->Host = "mail.aplikasiku.online";
		// 0 = off (for production use, No debug messages)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		// $mail->Username = "service@aplikasiku.online";
		// $mail->Password = "Asbak425##";
		// $mail->SetFrom("service@aplikasiku.online","Admin");
		$mail->Username = "admin@eaoron.co.id";
		$mail->Password = "hiyahiya";
		$mail->SetFrom("admin@eaoron.co.id","Admin");
		$mail->Subject = "News";
		$mail->MsgHTML("Link : ");
		foreach ($get_subscriber as $key => $value) {
			$mail->AddAddress($value->email,$value->email);
			$mail->Send();
			$this->Main_model->updateData('subscriber',array('counter'=>($value->counter)+1),array('id_subscriber'=>$value->id_subscriber));
		}

		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data berita (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/berita'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil disimpan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/berita/'</script>";
		}
	}
	public function detail_berita(){
		$data['parent'] = 'master';
        $data['child'] = 'berita';
		$data['kategori'] = $this->Main_model->getSelectedData('kategori_berita a', 'a.*')->result();
		$data['data_utama'] = $this->Main_model->getSelectedData('berita a', 'a.*',array('md5(a.id_berita)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/ubah_berita',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_berita(){
		$this->db->trans_start();
		$this->Main_model->updateData('berita',array('id_kategori_berita'=>''),array('id_berita'=>$this->input->post('id')));
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/berita/'; // path folder
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
				// echo "<script>window.location='".base_url('tambah_berita')."'</script>";
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$nama_file = $gbr['file_name'];
				$this->Main_model->updateData('berita',array('thumbnail'=>$nama_file),array('id_berita'=>$this->input->post('id')));
			}
		}else{echo'';}

		$data_insert1 = array(
			'id_kategori_berita' => implode(',',$this->input->post('kat')),
			'judul' => $this->input->post('nama'),
			'berita' => $this->input->post('desc')
		);
		$this->Main_model->updateData('berita',$data_insert1,array('id_berita'=>$this->input->post('id')));
		// print_r($data_insert1);

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data berita (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detail_berita/".md5($this->input->post('id'))."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/berita/'</script>";
		}
	}
	public function hapus_berita(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('berita a', 'a.*',array('md5(a.id_berita)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_berita;
		$nama = $get_data->judul;

		$this->Main_model->deleteData('berita',array('id_berita'=>$id));
		$this->Main_model->deleteData('komentar_berita',array('id_berita'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","MengDelete Data berita (".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/berita/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/berita/'</script>";
		}
	}
	/* Komentar Berita */
	public function komen_berita(){
		$data['parent'] = 'master';
        $data['child'] = 'komen_berita';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/komen_berita',$data);
        $this->load->view('admin/template/footer');
	}
	public function detail_komen(){
		$data['parent'] = 'master';
		$data['child'] = 'komen_berita';
		$date['komen'] = $this->Main_model->getSelectedData('komentar_berita a', 'a.*,b.judul', array('md5(a.id_berita)'=>$this->uri->segment(3),'a.status'=>'1'), '', '', '', '', array(
			'table' => 'berita b',
			'on' => 'a.id_berita=b.id_berita',
			'pos' => 'LEFT'
		))->result();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/detail_komen',$data);
        $this->load->view('admin/template/footer');
	}
	public function json_komen(){
		$get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*,b.judul,(SELECT COUNT(c.id_berita) FROM komentar_berita c WHERE c.id_berita=a.id_berita AND c.status="1") AS jml', '', '', '', '', '', array(
			'table' => 'berita b',
			'on' => 'a.id_berita=b.id_berita',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = '<strong><img alt="" src="http://2.gravatar.com/avatar/581a7695c1ef0cda0403ccffe2baa4fc?s=32&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/581a7695c1ef0cda0403ccffe2baa4fc?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32"> '.$value->nama.'</strong><br><a href="mailto:'.$value->email.'">'.$value->email.'</a>';
			$komen = '';
			$return_on_click = "return confirm('Anda yakin?')";
			if($value->id_parent_comment==NULL){
				if($value->status=='0'){
					$komen = '<p>'.$value->komentar.'</p>
					<div class="row-actions"><span class="approve"><a href="'.base_url().'admin_side/comment_approved/'.md5($value->id_komentar_berita).'" data-wp-lists="dim:the-comment-list:comment-10:unapproved:e7e7d3:e7e7d3:new=approved" class="vim-a aria-button-if-js" aria-label="Approve this comment" role="button">Approve</a></span>
					<span class="trash"> | <a href="'.base_url().'admin_side/hapus_komentar/'.md5($value->id_komentar_berita).'" onclick="'.$return_on_click.'" data-wp-lists="delete:the-comment-list:comment-10::trash=1" class="delete vim-d vim-destructive aria-button-if-js" aria-label="Move this comment to the Trash" role="button">Trash</a></span></div>';
				}else{
					$komen = '<p>'.$value->komentar.'</p>
					<div class="row-actions"><span class="trash"><a href="'.base_url().'admin_side/hapus_komentar/'.md5($value->id_komentar_berita).'" onclick="'.$return_on_click.'" data-wp-lists="delete:the-comment-list:comment-10::trash=1" class="delete vim-d vim-destructive aria-button-if-js" aria-label="Move this comment to the Trash" role="button">Trash</a></span></div>';
				}
			}else{
				$get_parent = $get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('a.id_komentar_berita'=>$value->id_parent_comment))->row(); 
				if($value->status=='0'){
					$komen = 'In reply to <a href="#">'.$get_parent->nama.'</a>.<p>'.$value->komentar.'</p>
					<div class="row-actions"><span class="approve"><a href="'.base_url().'admin_side/comment_approved/'.md5($value->id_komentar_berita).'" data-wp-lists="dim:the-comment-list:comment-10:unapproved:e7e7d3:e7e7d3:new=approved" class="vim-a aria-button-if-js" aria-label="Approve this comment" role="button">Approve</a></span>
					<span class="trash"> | <a href="'.base_url().'admin_side/hapus_komentar/'.md5($value->id_komentar_berita).'" onclick="'.$return_on_click.'" data-wp-lists="delete:the-comment-list:comment-10::trash=1" class="delete vim-d vim-destructive aria-button-if-js" aria-label="Move this comment to the Trash" role="button">Trash</a></span></div>';
				}else{
					$komen = 'In reply to <a href="#">'.$get_parent->nama.'</a>.<p>'.$value->komentar.'</p>
					<div class="row-actions"><span class="trash"><a href="'.base_url().'admin_side/hapus_komentar/'.md5($value->id_komentar_berita).'" onclick="'.$return_on_click.'" data-wp-lists="delete:the-comment-list:comment-10::trash=1" class="delete vim-d vim-destructive aria-button-if-js" aria-label="Move this comment to the Trash" role="button">Trash</a></span></div>';
				}
			}
			$isi['isi'] = $komen;
			$isi['action'] = '<a href="'.base_url().'detail_berita/'.md5($value->id_berita).'">'.$value->judul.'</a><br><a href="#">View Post</a><br>
			<a href="'.base_url().'admin_side/detail_komen/'.md5($value->id_berita).'" class="btn btn-primary">
				<span class="badge badge-light">'.$value->jml.'</span>
			</a>
			';
			$isi['date'] = $this->Main_model->convert_datetime($value->created_at);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function json_detail_komen(){
		$get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('md5(a.id_berita)'=>$this->input->post('berita'),'a.status'=>'1'), '', '', '', '', array(
			'table' => 'berita b',
			'on' => 'a.id_berita=b.id_berita',
			'pos' => 'LEFT'
		))->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = '<strong><img alt="" src="http://2.gravatar.com/avatar/581a7695c1ef0cda0403ccffe2baa4fc?s=32&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/581a7695c1ef0cda0403ccffe2baa4fc?s=64&amp;d=mm&amp;r=g 2x" class="avatar avatar-32 photo" height="32" width="32"> '.$value->nama.'</strong><br><a href="mailto:'.$value->email.'">'.$value->email.'</a>';
			$komen = '';
			$return_on_click = "return confirm('Anda yakin?')";
			if($value->id_parent_comment==NULL){
				$komen = '<p>'.$value->komentar.'</p>
				<div class="row-actions"><span class="trash"><a href="'.base_url().'admin_side/hapus_komentar/'.md5($value->id_komentar_berita).'" onclick="'.$return_on_click.'" data-wp-lists="delete:the-comment-list:comment-10::trash=1" class="delete vim-d vim-destructive aria-button-if-js" aria-label="Move this comment to the Trash" role="button">Trash</a></span></div>';
			}else{
				$get_parent = $get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', array('a.id_komentar_berita'=>$value->id_parent_comment))->row(); 
				$komen = 'In reply to <a href="#">'.$get_parent->nama.'</a>.<p>'.$value->komentar.'</p>
				<div class="row-actions"><span class="trash"><a href="'.base_url().'admin_side/hapus_komentar/'.md5($value->id_komentar_berita).'" onclick="'.$return_on_click.'" data-wp-lists="delete:the-comment-list:comment-10::trash=1" class="delete vim-d vim-destructive aria-button-if-js" aria-label="Move this comment to the Trash" role="button">Trash</a></span></div>';
			}
			$isi['isi'] = $komen;
			$isi['date'] = $this->Main_model->convert_datetime($value->created_at);
			$data_tampil[] = $isi;
		}
		$results = array(
			"sEcho" => 1,
			"iTotalRecords" => count($data_tampil),
			"iTotalDisplayRecords" => count($data_tampil),
			"aaData"=>$data_tampil);
		echo json_encode($results);
	}
	public function comment_approved(){
		$this->db->trans_start();
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*',array('md5(a.id_komentar_berita)'=>$this->uri->segment(3)))->row();
		$nama = $get_data->nama;

		$this->Main_model->updateData('komentar_berita',array('status'=>'1'),array('md5(id_komentar_berita)'=>$this->uri->segment(3)));

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Menyetujui komentar (dari ".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/komen_berita/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/komen_berita/'</script>";
		}
	}
	public function hapus_komentar(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('komentar_berita a', 'a.*',array('md5(a.id_komentar_berita)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_komentar_berita;
		$nama = $get_data->nama;

		$this->Main_model->deleteData('komentar_berita',array('id_parent_comment'=>$id));
		$this->Main_model->deleteData('komentar_berita',array('id_komentar_berita'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","MengDelete Data komentar berita (oleh ".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/komen_berita/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/komen_berita/'</script>";
		}
	}
	/* Data Event */
	public function event(){
		$data['parent'] = 'master';
        $data['child'] = 'event';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/event',$data);
        $this->load->view('admin/template/footer');
	}
	public function json_event(){
		$get_data = $this->Main_model->getSelectedData('event a', 'a.*')->result();
		$data_tampil = array();
		$no = 1;
		foreach ($get_data as $key => $value) {
			$isi['no'] = $no++.'.';
			$isi['judul'] = $value->judul;
			$isi['tgl'] = $this->Main_model->convert_tanggal($value->tanggal_pelaksanaan);
			$isi['tempat'] = $value->tempat;
			$isi['by'] = $value->penyelenggara;
			$return_on_click = "return confirm('Anda yakin?')";
			$isi['action'] =
			'<div class="dropdown no-arrow mb-4">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="'.site_url('admin_side/detail_event/'.md5($value->id_event)).'">Detail Data</a>
					<a class="dropdown-item" onclick="'.$return_on_click.'" href="'.site_url('admin_side/hapus_event/'.md5($value->id_event)).'">Delete Data</a>
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
	public function tambah_event(){
		$data['parent'] = 'master';
        $data['child'] = 'event';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/tambah_event',$data);
        $this->load->view('admin/template/footer');
	}
	public function simpan_event(){
		$this->db->trans_start();
		$get_id = $this->Main_model->getLastID('event','id_event');
		$nama_file = '';

		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/event/'; // path folder
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
				// echo "<script>window.location='".base_url('tambah_event')."'</script>";
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$nama_file = $gbr['file_name'];
			}
		}else{echo'';}

		$data_insert1 = array(
			'id_event' => $get_id['id_event']+1,
			'judul' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('desc'),
			'tanggal_pelaksanaan' => $this->input->post('tgl'),
			'tempat' => $this->input->post('tempat'),
			'penyelenggara' => $this->input->post('by'),
			'poster' => $nama_file,
			'created_by' => $this->session->userdata('id'),
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->Main_model->insertData('event',$data_insert1);
		// print_r($data_insert1);

		$this->Main_model->log_activity($this->session->userdata('id'),'Adding data',"Menambahkan data event (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/tambah_event/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/event/'</script>";
		}
	}
	public function detail_event(){
		$data['parent'] = 'master';
		$data['child'] = 'event';
		$data['data_utama'] = $this->Main_model->getSelectedData('event a', 'a.*', array('md5(a.id_event)'=>$this->uri->segment(3)))->row();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/master/ubah_event',$data);
        $this->load->view('admin/template/footer');
	}
	public function perbarui_event(){
		$this->db->trans_start();
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/event/'; // path folder
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
				// echo "<script>window.location='".base_url('tambah_event')."'</script>";
				echo'';
			}
			else
			{
				$gbr = $this->upload->data();
				$nama_file = $gbr['file_name'];
				$this->Main_model->updateData('event',array('poster'=>$nama_file),array('md5(id_event)'=>$this->input->post('id')));
			}
		}else{echo'';}

		$data_insert1 = array(
			'judul' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('desc'),
			'tanggal_pelaksanaan' => $this->input->post('tgl'),
			'tempat' => $this->input->post('tempat'),
			'penyelenggara' => $this->input->post('by')
		);
		$this->Main_model->updateData('event',$data_insert1,array('md5(id_event)'=>$this->input->post('id')));
		// print_r($data_insert1);

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data event (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/detail_event/".$this->input->post('id')."'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil ditambahkan.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/event/'</script>";
		}
	}
	public function hapus_event(){
		$this->db->trans_start();
		$id = '';
		$nama = '';
		$get_data = $this->Main_model->getSelectedData('event a', 'a.*',array('md5(a.id_event)'=>$this->uri->segment(3)))->row();
		$id = $get_data->id_event;
		$nama = $get_data->judul;

		$this->Main_model->deleteData('event',array('id_event'=>$id));

		$this->Main_model->log_activity($this->session->userdata('id'),"Deleting data","MengDelete Data event (".$nama.")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/event/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/event/'</script>";
		}
	}
	/* Other Function */
	public function ajax_page(){
		if($this->input->post('modul')=='tabel_berita_berdasarkan_kategori'){
			$data['berita'] = $this->Main_model->getSelectedData('berita a', 'a.*',array('md5(a.id_kategori_berita)'=>$this->input->post('data'),'a.deleted'=>'0'))->result();
			$this->load->view('admin/master/ajax_page/tabel_berita_berdasarkan_kategori',$data);
		}elseif($this->input->post('modul')=='daftar_berita_dalam_modul'){
			$data['berita'] = $this->Main_model->getSelectedData('berita_to_modul a', 'b.*,a.id_berita_to_modul', array('md5(a.id_modul)'=>$this->input->post('data')), '', '', '', '', array(
				'table' => 'berita b',
				'on' => 'a.id_berita=b.id_berita',
				'pos' => 'LEFT'
			))->result();
			$data['id_mod'] = $this->input->post('data');
			$data['daftar_berita'] = $this->Main_model->getSelectedData('berita a', 'a.*', array('a.deleted'=>'0'))->result();
			$this->load->view('admin/master/ajax_page/form_daftar_berita_dalam_modul',$data);
		}elseif($this->input->post('modul')=='daftar_peserta_dalam_suatu_ujian'){
			$data['siswa'] = $this->Main_model->getSelectedData('siswa_to_modul a', 'b.*,a.id_siswa_to_modul', array('md5(a.id_modul)'=>$this->input->post('data')), '', '', '', '', array(
				'table' => 'siswa b',
				'on' => 'a.id_siswa=b.id_siswa',
				'pos' => 'LEFT'
			))->result();
			$data['id_mod'] = $this->input->post('data');
			$data['daftar_siswa'] = $this->Main_model->getSelectedData('siswa a', 'a.*')->result();
			$this->load->view('admin/master/ajax_page/form_daftar_peserta_ujian',$data);
		}
	}
	public function ajax_function(){
		if($this->input->post('modul')=='username_check'){
			$data = $this->Main_model->getSelectedData('user a', 'a.*', array('a.username'=>$this->input->post('username')))->result();
			if($data==NULL){
				echo 'Username tersedia';
			}else{
				echo '<font color="red">Username tidak tersedia</font>';
			}
		}
		elseif($this->input->post('modul')=='get_kabupaten_by_id_provinsi'){
			$data = $this->Main_model->getSelectedData('kabupaten a', 'a.*', array('a.id_provinsi'=>$this->input->post('id')))->result();
			echo'<option value="">-- Pilih Kabupaten/ Kota --</option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_kabupaten.'">'.$value->nm_kabupaten.'</option>';
			}
		}
		elseif($this->input->post('modul')=='get_kecamatan_by_id_kabupaten'){
			$data = $this->Main_model->getSelectedData('kecamatan a', 'a.*', array('a.id_kabupaten'=>$this->input->post('id')))->result();
			echo'<option value=""></option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_kecamatan.'">'.$value->nm_kecamatan.'</option>';
			}
		}
		elseif($this->input->post('modul')=='get_desa_by_id_kecamatan'){
			$data = $this->Main_model->getSelectedData('desa a', 'a.*', array('a.id_kecamatan'=>$this->input->post('id')))->result();
			echo'<option value=""></option>';
			foreach ($data as $key => $value) {
				echo'<option value="'.$value->id_desa.'">'.$value->nm_desa.'</option>';
			}
		}
	}
}