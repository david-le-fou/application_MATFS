<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Enfant extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Enfant_model');
		$this->load->model('Personnel_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_enfant(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
			$data['liste_enfants'] = $this->Enfant_model->get_enfant_par_personnel($id);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('enfant/Form_add_enfant',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_enfant(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['nom_enfant'] = strtoupper($this->input->post('nom_enfant'));
			$data['prenom_enfant'] = ucwords(strtolower($this->input->post('prenom_enfant')));
			$data['date_enfant'] = $this->input->post('date_enfant');
			$data['sexe_enfant'] = $this->input->post('sexe_enfant');

			$this->Enfant_model->add($data);

			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($data['matricule']);
			$data['liste_enfants'] = $this->Enfant_model->get_enfant_par_personnel($data['matricule']);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Display_conjoint_enfant',$data);
			$this->load->view('../common/Footer');
		}
	}
}
