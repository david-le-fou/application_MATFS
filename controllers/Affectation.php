<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Affectation extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Affectation_model');
		$this->load->model('Personnel_model');
		$this->load->model('Avancement_model');
		$this->load->model('Cessation_model');
		$this->load->model('Other_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_affectation(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);

			$data['liste_soa'] = $this->Other_model->tous_les_soa();

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('affectation/Form_add_affectation',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_affectation(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['code_soa'] = $this->input->post('code_soa');
			$data['id_direction'] = strtoupper($this->input->post('id_direction'));
			$data['id_service'] = strtoupper($this->input->post('id_service'));
			$data['fonction'] = $this->input->post('fonction');
			$data['lieu'] = ucwords(strtolower($this->input->post('lieu')));
			$data['date_affect'] = $this->input->post('date_affect');
			$data['ref'] = strtoupper($this->input->post('ref'));

			$this->Affectation_model->add($data);

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
