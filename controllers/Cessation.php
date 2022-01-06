<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Cessation extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cessation_model');
		$this->load->model('Affectation_model');
		$this->load->model('Avancement_model');
		$this->load->model('Personnel_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_cessation(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('cessation/Form_add_cessation',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_cessation(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['cessation'] = $this->input->post('cessation');
			$data['date_debut'] = $this->input->post('date_debut');
			$data['date_fin'] = $this->input->post('date_fin');
			$data['ref'] = strtoupper($this->input->post('ref'));

			$this->Cessation_model->add($data);

			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($data['matricule']);
			$data['liste_affectations'] = $this->Affectation_model->get_affectation_par_personnel($data['matricule']);
			$data['liste_avancements'] = $this->Avancement_model->get_avancement_par_personnel($data['matricule']);
			$data['liste_cessations'] = $this->Cessation_model->get_cessation_par_personnel($data['matricule']);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Display_affectation',$data);
			$this->load->view('../common/Footer');
		}
	}
}
