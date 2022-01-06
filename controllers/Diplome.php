<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Diplome extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Diplome_model');
		$this->load->model('Personnel_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_diplome(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
			$data['liste_diplomes'] = $this->Diplome_model->get_diplome_par_personnel($id);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('diplome/Form_add_diplome',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_diplome(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['titre'] = strtoupper($this->input->post('titre'));
			$data['niveau'] = ucwords(strtolower($this->input->post('niveau')));
			$data['annee'] = $this->input->post('annee');
			$data['institut'] = $this->input->post('institut');

			$this->Diplome_model->add($data);

			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($data['matricule']);
			$data['liste_diplomes'] = $this->Diplome_model->get_diplome_par_personnel($data['matricule']);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Display_diplome',$data);
			$this->load->view('../common/Footer');
		}
	}
}
