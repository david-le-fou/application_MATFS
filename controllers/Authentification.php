<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Authentification extends CI_Controller{
	function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('Users_model');
			$this->load->model('Other_model');
		}

	public function index(){
		$this->login();
	}
	
	function login(){

		$msg="";
		if($this->input->post('password')){
			$stat = $this->check_login();
			
			$msg = $stat['msg'];
			if($stat['result'] == 'OK'){
				if($this->session->userdata('role') == 'admin_user'){
					redirect('Authentification/admin_main_menu');
				}elseif($this->session->userdata('role') == 'other_user'){
					redirect('Authentification/user_main_menu');
				}
			}
			else{
				$this->session->sess_destroy();//detruire session
			}
		}
		
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$data['role'] = $this->session->userdata('role');

		$this->load->view('../common/Header', $data);
		$this->load->view('login/Login_view', $data);
		$this->load->view('../common/Footer');
	}

	function check_login(){
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		
		$ret = array();
		
		$user_record = $this->Users_model->check_login($user_name, $password);
		//var_dump($user_record);
		if($user_record){
			$this->session->set_userdata('user_name', $user_record->user_name);
			$this->session->set_userdata('role', $user_record->role);
			$ret['result'] = 'OK';
			$ret['msg'] = 'Logged-in';
			//var_dump($this->session);
		}else{
			$ret['result'] = 'NON OK';
			$ret['msg'] = 'Invalide User/Pass - Try Again !!!';
		}
		return $ret;
	}

	function admin_main_menu(){
		$view_setup['uid'] = $this->session->userdata('user_id');
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		$data['toutes_les_dir'] = $this->Other_model->toutes_les_directions();
		$data['tous_les_servi'] = $this->Other_model->tous_les_services();
		
		$this->load->view('../common/Header', $view_setup);
		$this->load->view('accueil/Page_accueil', $data);
		$this->load->view('../common/Footer', $view_setup);
	}

	function logout(){
		$this->clear_cache();
		$this->session->sess_destroy();
		unset($_COOKIE);
		redirect('Authentification');
	}

	 function clear_cache() {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}