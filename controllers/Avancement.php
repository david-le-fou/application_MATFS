<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Avancement extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Affectation_model');
		$this->load->model('Avancement_model');
		$this->load->model('Personnel_model');
		$this->load->model('Cessation_model');
		$this->load->model('Other_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_avancement(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
			$data['liste_avancements'] = $this->Avancement_model->get_avancement_par_personnel($id);
			$data['liste_corps'] = $this->Other_model->tous_les_corps();
			$data['liste_grade'] = $this->Other_model->tous_les_grades();

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('avancement/Form_add_avancement',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_avancement(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['corps'] = strtoupper($this->input->post('corps'));
			$data['grade'] = strtoupper($this->input->post('grade'));
			$data['indice'] = strtoupper($this->input->post('indice'));
			$data['date_avance'] = $this->input->post('date_avance');
			$data['ref'] = strtoupper($this->input->post('ref'));

			$this->Avancement_model->add($data);

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
