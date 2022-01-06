<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Distinction extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Distinction_model');
		$this->load->model('Sanction_model');
		$this->load->model('Personnel_model');
		$this->load->model('Other_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_distinction(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
			$data['liste_distinctions'] = $this->Distinction_model->get_distinction_par_personnel($id);
			$data['liste_honneurs'] = $this->Other_model->tous_les_honneurs();

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('distinction/Form_add_distinction',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_distinction(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['honneur'] = strtoupper($this->input->post('honneur'));
			$data['ref'] = strtoupper($this->input->post('ref'));
			$data['decoration'] = $this->input->post('decoration');
			$data['annee'] = $this->input->post('annee');

			$this->Distinction_model->add($data);

			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($data['matricule']);
			$data['liste_distinctions'] = $this->Distinction_model->get_distinction_par_personnel($data['matricule']);
			$data['liste_sanctions'] = $this->Sanction_model->get_sanction_par_personnel($data['matricule']);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Display_distinction',$data);
			$this->load->view('../common/Footer');
		}
	}
}
