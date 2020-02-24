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
		$data['grand_child'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/home',$data);
		$this->load->view('admin/template/footer');
	}
	public function menu()
	{
		$data['parent'] = 'menu';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['clinic_center_menu'] = $this->Main_model->getSelectedData('menu a', '*', array("parent_id" => "", "a.app_key" => "clinic_center", "a.menu_status" => '1', 'deleted' => '0'), 'a.menu_order ASC','','','','')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/menu',$data);
		$this->load->view('admin/template/footer');
	}
	public function log_activity()
	{
		$data['parent'] = 'log_activity';
		$data['child'] = '';
		$data['grand_child'] = '';
		$data['data_tabel'] = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', '', "a.activity_time DESC",'','','',array(
			'table' => 'user_profile b',
			'on' => 'a.user_id=b.user_id',
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
			echo "<script>window.location='".base_url()."admin_side/log_activity/'</script>";
		}
		else{
			$this->session->set_flashdata('sukses','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong></i>Yeah! </strong>data telah berhasil dihapus.<br /></div>' );
			echo "<script>window.location='".base_url()."admin_side/log_activity/'</script>";
		}
	}
	public function about()
	{
		$data['parent'] = 'about';
		$data['child'] = '';
		$data['grand_child'] = '';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/app/about',$data);
		$this->load->view('admin/template/footer');
	}
	public function helper()
	{
		$data['parent'] = 'helper';
		$data['child'] = '';
		$data['grand_child'] = '';
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
	/* Menu setting and user's permission */
	public function ajax_function(){
		if($this->input->post('modul')=='modul_detail_log_aktifitas'){
			$data['data_utama'] = $this->Main_model->getSelectedData('activity_logs a', 'a.*,b.fullname', array('md5(a.activity_id)'=>$this->input->post('id')), "",'','','',array(
				'table' => 'user_profile b',
				'on' => 'a.user_id=b.user_id',
				'pos' => 'LEFT'
			))->result();
			$this->load->view('admin/app/ajax_detail_log_aktifitas',$data);
		}
	}
	public function create_admin_data(){
		$data_p = $this->Main_model->getSelectedData('provinsi a', 'a.*')->result();
		foreach ($data_p as $key => $value) {
			$this->db->trans_start();
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $value->nm_provinsi.' '.$value->id_provinsi,
				'pass' => '12345',
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);
			// print_r($data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'fullname' => $value->nm_provinsi,
				'wilayah' => $value->id_provinsi
			);
			$this->Main_model->insertData('user_profile',$data_insert2);
			// print_r($data_insert2);

			$data_insert3 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => '5'
			);
			$this->Main_model->insertData('user_to_role',$data_insert3);
			// print_r($data_insert3);

			$this->db->trans_complete();
		}
		$data_k = $this->Main_model->getSelectedData('kabupaten a', 'a.*')->result();
		foreach ($data_k as $key => $value) {
			$this->db->trans_start();
			$get_user_id = $this->Main_model->getLastID('user','id');

			$data_insert1 = array(
				'id' => $get_user_id['id']+1,
				'username' => $value->nm_kabupaten.' '.$value->id_kabupaten,
				'pass' => '12345',
				'is_active' => '1',
				'created_by' => $this->session->userdata('id'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$this->Main_model->insertData('user',$data_insert1);
			// print_r($data_insert1);

			$data_insert2 = array(
				'user_id' => $get_user_id['id']+1,
				'fullname' => $value->nm_kabupaten,
				'wilayah' => $value->id_kabupaten
			);
			$this->Main_model->insertData('user_profile',$data_insert2);
			// print_r($data_insert2);

			$data_insert3 = array(
				'user_id' => $get_user_id['id']+1,
				'role_id' => '6'
			);
			$this->Main_model->insertData('user_to_role',$data_insert3);
			// print_r($data_insert3);

			$this->db->trans_complete();
		}
	}
}