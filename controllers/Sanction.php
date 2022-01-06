<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Sanction extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Sanction_model');
		$this->load->model('Distinction_model');
		$this->load->model('Personnel_model');
	}

	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	function show_add_sanction(){ 
		$role = $this->session->userdata('role');
		$id=$this->uri->segment(3);
		if($role == 'admin_user')
		{
			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
			$data['liste_sactions'] = $this->Sanction_model->get_sanction_par_personnel($id);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('sanction/Form_add_sanction',$data);
			$this->load->view('../common/Footer');
		} else
		{
			$data['context'] = 'pas_le_droit';

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}
	}

	function add_sanction(){
		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['sanction'] = strtoupper($this->input->post('sanction'));
			$data['date_effet'] = $this->input->post('date_effet');
			$data['ref'] = strtoupper($this->input->post('ref'));

			$this->Sanction_model->add($data);

			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($data['matricule']);
			$data['liste_distinctions'] = $this->Distinction_model->get_distinction_par_personnel($data['matricule']);
			$data['liste_sanctions'] = $this->Sanction_model->get_sanction_par_personnel($data['matricule']);

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Display_distinction',$data);
			$this->load->view('../common/Footer');
		}
	}
}
