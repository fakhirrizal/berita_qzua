<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    function __construct() {
        parent::__construct();
	}
	public function login()
	{
		if(($this->session->userdata('id'))==NULL){
			$this->load->view('admin/app/login');
		}else{
			$cek = $this->Main_model->getSelectedData('user_to_role a', 'a.role_id,b.route', array('a.user_id'=>$this->session->userdata('id'),'b.deleted'=>'0'), "",'','','',array(
				'table' => 'user_role b',
				'on' => 'a.role_id=b.id',
				'pos' => 'LEFT'
			))->result();
			if($cek!=NULL){
				foreach ($cek as $key => $value) {
					if($value->role_id=='0' OR $value->role_id=='1'){
						redirect($value->route);
					}
					else{
						$this->session->sess_destroy();
						$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: justify;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<strong>Ups! </strong>Akun Anda tidak dikenali sistem.
												</div>' );
						echo "<script>window.location='".base_url('admin_side')."'</script>";
					}
				}
			}
			else{
				$this->load->view('admin/app/login');
			}
		}
	}
	public function login_process(){
		$cek = $this->Main_model->getSelectedData('user a', '*', array("a.username" => $this->input->post('username'), "a.is_active" => '1', 'a.deleted' => '0'), 'a.username ASC')->result();
		if($cek!=NULL){
			$cek2 = $this->Main_model->getSelectedData('user a', '*', array("a.username" => $this->input->post('username'),'pass' => $this->input->post('password'), "a.is_active" => '1', 'deleted' => '0'), 'a.username ASC','','','','')->result();
			if($cek2!=NULL){
				foreach ($cek as $key => $value) {
					$total_login = ($value->total_login)+1;
					$login_attempts = ($value->login_attempts)+1;
					$data_log = array(
						'total_login' => $total_login,
						'last_login' => date('Y-m-d H-i-s'),
						'last_activity' => date('Y-m-d H-i-s'),
						'login_attempts' => $login_attempts,
						'last_login_attempt' => date('Y-m-d H-i-s'),
						'ip_address' => $this->input->ip_address()
					);
					$this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
					$this->Main_model->log_activity($value->id,'Login to system','Login via web browser',$this->input->post('location'));
					$role = $this->Main_model->getSelectedData('user_to_role a', 'b.route,a.user_id,a.role_id', array('a.user_id'=>$value->id,'b.deleted'=>'0'), "",'','','',array(
						'table' => 'user_role b',
						'on' => 'a.role_id=b.id',
						'pos' => 'LEFT'
					))->result();
					if($role==NULL){
						$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: justify;">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<strong>Ups! </strong>Akun Anda tidak dikenali sistem.
														</div>' );
						echo "<script>window.location='".base_url('admin_side')."'</script>";
					}else{
						foreach ($role as $key => $value2) {
							if($value2->role_id=='0' OR $value2->role_id=='1'){
								$sess_data['id'] = $value2->user_id;
								$sess_data['role_id'] = $value2->role_id;
								$sess_data['location'] = $this->input->post('location');
								$this->session->set_userdata($sess_data);
								redirect($value2->route);
							}
							else{
								$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: justify;">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<strong>Ups! </strong>Akun Anda tidak dikenali sistem.
														</div>' );
								echo "<script>window.location='".base_url('admin_side')."'</script>";
							}
						}
					}
				}
			}else{
				foreach ($cek as $key => $value) {
					$login_attempts = ($value->login_attempts)+1;
					$data_log = array(
						'login_attempts' => $login_attempts,
						'last_login_attempt' => date('Y-m-d H-i-s')
					);
					$this->Main_model->updateData('user',$data_log,array('id'=>$value->id));
					$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: justify;">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<strong>Ups! </strong>Password yg Anda masukkan tidak valid.
												</div>' );
					echo "<script>window.location='".base_url('admin_side')."'</script>";
				}
			}
		}
		else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: justify;">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Ups! </strong>Username/ Email yang Anda masukkan tidak terdaftar.
										</div>' );
			echo "<script>window.location='".base_url('admin_side')."'</script>";
		}
	}
	public function launcher()
	{
		// $this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/launcher');
		// $this->load->view('admin/template/footer');
	}
    public function home()
	{
		$data['parent'] = 'home';
		$data['child'] = '';
		$data['berita'] = $this->Main_model->getSelectedData('berita a', 'a.*', '', 'a.counter DESC', '5', '', '', '')->result();
		$data['komen'] = $this->Main_model->getSelectedData('komentar_berita a', 'a.*', '', 'a.created_at DESC', '5', '', '', '')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/home',$data);
		$this->load->view('admin/template/footer');
	}
	public function menu()
	{
		$data['parent'] = 'menu';
		$data['child'] = '';
		
		$data['clinic_center_menu'] = $this->Main_model->getSelectedData('menu a', '*', array("parent_id" => "", "a.app_key" => "clinic_center", "a.menu_status" => '1', 'deleted' => '0'), 'a.menu_order ASC','','','','')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/menu',$data);
		$this->load->view('admin/template/footer');
	}
	public function log_activity()
	{
		$data['parent'] = 'log_activity';
		$data['child'] = '';
		
		$data['data_tabel'] = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', '', "a.activity_time DESC",'','','',array(
			'table' => 'user b',
			'on' => 'a.user_id=b.id',
			'pos' => 'LEFT'
		))->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/log_activity',$data);
		$this->load->view('admin/template/footer');
	}
	public function cleaning_log(){
		$this->db->trans_start();
		$this->Main_model->cleanData('activity_logs');
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
	}
	public function hapus_aktifitas(){
		$this->db->trans_start();
		$id = '';
		$get_data = $this->Main_model->getSelectedData('activity_logs a', 'a.*',array('md5(a.activity_id)'=>$this->uri->segment(3)))->row();
		$id = $get_data->activity_id;

		$this->Main_model->deleteData('activity_logs',array('activity_id'=>$id));

		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_aktifitas/'</script>";
		}
	}
	public function about()
	{
		$data['parent'] = 'about';
		$data['child'] = '';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/about',$data);
		$this->load->view('admin/template/footer');
	}
	public function helper()
	{
		$data['parent'] = 'helper';
		$data['child'] = '';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/helper',$data);
		$this->load->view('admin/template/footer');
	}
	public function forget_password(){
		// PHPMailer
		require_once(APPPATH.'libraries/class.phpmailer.php');

		$mail = new PHPMailer; 
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl'; 
		$mail->Host = "mail.aplikasiku.online";
		$mail->SMTPDebug = 2;
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = "service@aplikasiku.online";
		$mail->Password = "Asbak425##";
		$mail->SetFrom("service@aplikasiku.online","Nama pengirim");
		$mail->Subject = "Testing";
		$mail->AddAddress("bokir.rizal@gmail.com","nama email tujuan");
		$mail->MsgHTML("Testing...");
		if($mail->Send()) echo "Message has been sent";
		else echo "Failed to sending message";
	}
	public function logout(){
		$this->session->sess_destroy();
		echo "<script>window.location='".base_url('admin_side')."'</script>";
	}
	/* Profile */
	public function profile()
	{
		$data['parent'] = '';
		$data['child'] = '';
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('a.id'=>$this->session->userdata('id')))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/profile',$data);
		$this->load->view('admin/template/footer');
	}
	public function password()
	{
		$data['parent'] = '';
		$data['child'] = '';
		$data['data_utama'] = $this->Main_model->getSelectedData('user a', 'a.*', array('a.id'=>$this->session->userdata('id')))->row();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/password',$data);
		$this->load->view('admin/template/footer');
	}
	public function perbarui_profil(){
		$this->db->trans_start();
		$nmfile = "file_".time(); // nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/data_upload/photo_profile/'; // path folder
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
				$this->Main_model->updateData('user',array('photo'=>$nama_file),array('md5(id)'=>$this->input->post('user_id')));
			}
		}else{echo'';}

		$data_insert1 = array(
			'fullname' => $this->input->post('nama')
		);
		$this->Main_model->updateData('user',$data_insert1,array('md5(id)'=>$this->input->post('user_id')));
		// print_r($data_insert1);

		$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui data profil (".$this->input->post('nama').")",$this->session->userdata('location'));
		$this->db->trans_complete();
		if($this->db->trans_status() === false){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diperbarui.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/profil/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diperbarui.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/profil/'</script>";
		}
	}
	public function perbarui_kata_sandi(){
		$cek = $this->Main_model->getSelectedData('user a', 'a.*', array('a.pass'=>$this->input->post('old'),'a.id'=>$this->session->userdata('id')))->result();
		if($cek==NULL){
			$this->session->set_flashdata('gagal','<div class="alert alert-warning fade show" role="alert"><div class="alert-icon"><i class="flaticon-warning"></i></div><div class="alert-text"><strong>Oops! </strong>Kata sandi tidak valid.</div><div class="alert-close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="la la-close"></i></span></button></div></div>' );
			echo "<script>window.location='".base_url()."admin_side/kata_sandi'</script>";
		}
		else{
			$this->db->trans_start();
			$data_update0 = array(
				'pass' => $this->input->post('new')
			);
			$this->Main_model->updateData('user',$data_update0,array('id'=>$this->session->userdata('id')));

			$this->db->trans_complete();
			$this->Main_model->log_activity($this->session->userdata('id'),'Updating data',"Memperbarui kata sandi akun (".$this->input->post('nama').")",$this->session->userdata('location'));
			if($this->db->trans_status() === false){
				$this->session->set_flashdata('gagal','<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Oops! </strong>data gagal diperbarui.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/kata_sandi/'</script>";
			}
			else{
				$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil diperbarui.<br /></div>' );
				echo "<script>window.location='".base_url()."admin_side/kata_sandi'</script>";
			}
		}
	}
	/* Menu setting and user's permission */
	public function ajax_function(){
		if($this->input->post('modul')=='modul_detail_log_aktifitas'){
			$data['data_utama'] = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', array('md5(a.activity_id)'=>$this->input->post('id')), "",'','','',array(
				'table' => 'user b',
				'on' => 'a.user_id=b.id',
				'pos' => 'LEFT'
			))->result();
			$this->load->view('admin/app/ajax_detail_log_aktifitas',$data);
		}
	}
}