<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Accueil extends CI_Controller{
	function __construct()
		{
			parent::__construct();
			$this->load->model('Other_model');
		}


	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	public function index(){
		$data['toutes_les_dir'] = $this->Other_model->toutes_les_directions();
		$data['tous_les_servi'] = $this->Other_model->tous_les_services();

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('accueil/Page_accueil', $data);
		$this->load->view('../common/Footer');
	}
}