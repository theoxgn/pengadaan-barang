<?php
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
	}
 
	function index(){
		$this->load->view('login');
	}
 
	function aksi_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]|max_length[40]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]|max_length[40]');
		if($this->form_validation->run() == TRUE){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => md5($password)
				);
			$cek = $this->m_login->cek_login("admin",$where)->num_rows();
			if($cek > 0){
	 
				$data_session = array(
					'nama' => $username,
					'login' => TRUE
					);
	 
				$this->session->set_userdata($data_session);
	 
				redirect(base_url("admin"));
	 
			} else {
				echo "Username dan password salah !";
			}
		}else
			{
				$this->input_error();
			}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}