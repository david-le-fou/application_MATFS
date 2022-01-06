<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
include('phpqrcode/index.php');
class Personnel extends CI_Controller{
	function __construct()
		{
			parent::__construct();
			$this->load->model('Personnel_model');
			$this->load->model('Enfant_model');
			$this->load->model('Diplome_model');
			$this->load->model('Affectation_model');
			$this->load->model('Avancement_model');
			$this->load->model('Distinction_model');
			$this->load->model('Sanction_model');
			$this->load->model('Cessation_model');
			$this->load->model('Other_model');
			$this->load->library('pagination');
		}


	function view_setup(){
		$view_setup['user_name'] = $this->session->userdata('user_name');
		$view_setup['role'] = $this->session->userdata('role');

		return $view_setup;
	}

	public function generate_code_rehetra($start, $stop){
		$role = $this->session->userdata('role');
		if($role == 'admin_user')
		{
			$tous_les_perso = $this->Personnel_model->personnel_reheta($start, $stop);

			$myqr = new Qr_code();
			$mypath = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'/Personnel/display_personnel_profil/';

			foreach ($tous_les_perso as $key) {
				$myqr->generate_code($mypath,$key->matricule);
			}
			echo "ok";		
		}		

	}


	public function generate_code_profil(){
		$role = $this->session->userdata('role');
		if($role == 'admin_user')
		{
			$tous_les_perso = $this->Personnel_model->personnel_reheta_no_limit();


			foreach ($tous_les_perso as $key) {
				$matricule = $key->matricule;
				$data['code_profil'] = md5($matricule);
				$this->Personnel_model->update($matricule,$data);
			}
			echo "ok";		
		}
	}

	public function index(){

		$data['user_name'] = $this->session->userdata('user_name');
		$data['role'] = $this->session->userdata('role');	
           
        $page = $this->uri->segment(4,0);
				
		$config['base_url'] = site_url().'/Personnel/index/page';
				
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;

		$personnel = $this->Personnel_model->find_all($config['per_page'],$page);

		$config['total_rows'] = $this->Personnel_model->getCountTable();
				
		$config['prev_tag_open'] = '<div class="btn btn-default">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="btn btn-default">';
        $config['next_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="btn btn-default">';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="btn btn-default">';
        $config['num_tag_close'] = '</div>';
        
		$role = $this->session->userdata('role');
		
		if(($role == 'admin_user') || ($role == 'other_user'))
		{
			$data['context'] = 'list';
		}
		else
		{
			$data['context'] = 'pas_le_droit';
		}
				
		$data['titre'] = 'Liste des personnels';
		$data['liste_personnel'] = array('liste_personnel'=> $personnel);	

		$this->pagination->initialize($config);


		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Layout', $data);
		$this->load->view('../common/Footer');
	}

	function display_personnel_profil($id){
		
		if($this->uri->segment(3)){
			$id = $this->uri->segment(3);

			$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
			//var_dump($data);			

			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Display_personnel_profil',$data);
			$this->load->view('../common/Footer');
		}

	}

	function display_personnel_profil_search_code(){

			$id = $this->input->post('matri');

			$data['selected_personnel'] = $this->Personnel_model->search_personnel_code_profil($id);
			//var_dump($data);	
			if($data['selected_personnel']){
				$this->load->view('../common/Header', $this->view_setup());
				$this->load->view('personnel/Display_personnel_profil',$data);
				$this->load->view('../common/Footer');
			}	
			else{
				echo "Pas de profil corespondant";
			}
			
		
	}

	function show_add(){

		$role = $this->session->userdata('role');

		if($role == 'admin_user')
		{
			$data['context'] = 'edit';
			$data['mode'] = 'add';
			$data['mode_titre'] = 'Nouveau personnel';
			$data['liste_corps'] = $this->Other_model->tous_les_corps();
			$data['liste_grade'] = $this->Other_model->tous_les_grades();
			$data['liste_soa'] = $this->Other_model->tous_les_soa();
		}
		else
		{
			$data['context'] = 'pas_le_droit';
		}

		$data['role'] = $this->session->userdata('role');
					
		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Layout',$data);
		$this->load->view('../common/Footer');

	}
		
	function add(){
		$role = $this->session->userdata('role');
		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['nom'] = strtoupper($this->input->post('nom'));
			$data['prenoms'] = ucwords(strtolower($this->input->post('prenoms')));
			$data['date_naissance'] = $this->input->post('date_naissance');
			$data['lieu_naissance'] = $this->input->post('lieu_naissance');
			$data['cin'] = $this->input->post('cin');
			$data['date_cin'] = $this->input->post('date_cin');
			$data['lieu_cin'] = $this->input->post('lieu_cin');
			$data['sexe'] = $this->input->post('sexe');
			$data['adresse'] = $this->input->post('adresse');
			$data['nom_pere'] = ucwords(strtolower($this->input->post('nom_pere')));
			$data['nom_mere'] = ucwords(strtolower($this->input->post('nom_mere')));
			$data['mail'] = $this->input->post('mail');
			$data['telephone'] = $this->input->post('telephone');
			$data['date_entree'] = $this->input->post('date_entree');
			$data['statut'] = $this->input->post('statut');
			$data['fonction'] = $this->input->post('fonction');
			$data['corps_actuel'] = strtoupper($this->input->post('corps_actuel'));
			$data['grade_actuel'] = strtoupper($this->input->post('grade_actuel'));
			$data['id_direction'] = strtoupper($this->input->post('id_direction'));
			$data['id_service'] = strtoupper($this->input->post('id_service'));
			$data['imputation_budget'] = $this->input->post('imputation_budget');
			$data['code_soa'] = $this->input->post('code_soa');
			$data['code_profil'] = md5($this->input->post('matricule'));

			$config['upload_path'] = './assets/images/profil_pics'; 
   			$config['allowed_types'] = 'jpg|jpeg|png|PNG|JPG|JPEG'; 
    		$config['max_width'] = '10000'; 
    		$this->load->library('upload', $config); 
    		$this->upload->do_upload('photo'); 
    		$data_upload_files = $this->upload->data(); 

    		$photo = $data_upload_files['file_name'];
			$data['photo'] = $photo;

			//Création QR CODE ------------------
			$myqr = new Qr_code();
			//var_dump($_SERVER);
			$mypath = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'/Personnel/display_personnel_profil/';
			$myqr->generate_code($mypath,$data['matricule']);

			$this->Personnel_model->add($data);

			$matr = $data['matricule'];
			
			redirect('Personnel/display_personnel_profil/'.$matr);
		}
		else
		{
			$data['context'] = 'pas_le_droit';
		}

		$data['role'] = $this->session->userdata('role');
					
		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Layout',$data);
		$this->load->view('../common/Footer');
	}

	function show_update($id = 1){
		if($id==1){
			$id = $this->uri->segment(3,-1);
		}

		$data['role'] = $this->session->userdata('role');

			if($data['role'] =='admin_user')
			{
				$data['context'] = 'edit';
				$data['mode'] = 'update';
				$data['mode_titre'] = 'Modification de données';
				
				$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
				$data['liste_corps'] = $this->Other_model->tous_les_corps();
				$data['liste_grade'] = $this->Other_model->tous_les_grades();
				$data['liste_soa'] = $this->Other_model->tous_les_soa();

			}
			else
			{
				$data['context'] = 'pas_le_droit';
			}
			
		
			$this->load->view('../common/Header', $this->view_setup());
			$this->load->view('personnel/Layout',$data);
			$this->load->view('../common/Footer');
		}

	function update(){
		$role = $this->session->userdata('role');
		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['nom'] = strtoupper($this->input->post('nom'));
			$data['prenoms'] = ucwords(strtolower($this->input->post('prenoms')));
			$data['date_naissance'] = $this->input->post('date_naissance');
			$data['lieu_naissance'] = $this->input->post('lieu_naissance');
			$data['cin'] = $this->input->post('cin');
			$data['date_cin'] = $this->input->post('date_cin');
			$data['lieu_cin'] = $this->input->post('lieu_cin');
			$data['sexe'] = $this->input->post('sexe');
			$data['adresse'] = $this->input->post('adresse');
			$data['nom_pere'] = ucwords(strtolower($this->input->post('nom_pere')));
			$data['nom_mere'] = ucwords(strtolower($this->input->post('nom_mere')));
			$data['mail'] = $this->input->post('mail');
			$data['telephone'] = $this->input->post('telephone');
			$data['date_entree'] = $this->input->post('date_entree');
			$data['statut'] = $this->input->post('statut');
			$data['fonction'] = $this->input->post('fonction');
			$data['corps_actuel'] = strtoupper($this->input->post('corps_actuel'));
			$data['grade_actuel'] = strtoupper($this->input->post('grade_actuel'));
			$data['id_direction'] = strtoupper($this->input->post('id_direction'));
			$data['id_service'] = strtoupper($this->input->post('id_service'));
			$data['imputation_budget'] = $this->input->post('imputation_budget');
			$data['code_soa'] = $this->input->post('code_soa');

			$config['upload_path'] = './assets/images/profil_pics'; 
   			$config['allowed_types'] = 'jpg|jpeg|png|PNG|JPG|JPEG'; 
    		$config['max_width'] = '10000'; 
    		$this->load->library('upload', $config); 
    		$this->upload->do_upload('photo'); 
    		$data_upload_files = $this->upload->data(); 

    		$photo = $data_upload_files['file_name'];

    		if($this->upload->do_upload('photo')){
    			$data['photo'] = $photo;
    		}else{
    			$data['photo'] = $this->input->post('photo_act');
    		}
			

			$this->Personnel_model->update($data['matricule'],$data);
			
			redirect('Personnel/display_personnel_profil/'.$data['matricule']);
		}

	}

	function Display_conjoint_enfant($id){
		
		$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
		$data['liste_enfants'] = $this->Enfant_model->get_enfant_par_personnel($id);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Display_conjoint_enfant',$data);
		$this->load->view('../common/Footer');
	}

	function show_update_conjoint($id){
		$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Form_update_conjoint',$data);
		$this->load->view('../common/Footer');
	}

	function update_conjoint(){
		$role = $this->session->userdata('role');
		if($role == 'admin_user')
		{
			$data['matricule'] = $this->input->post('matricule');
			$data['nom_conjoint'] = strtoupper($this->input->post('nom_conjoint'));
			$data['prenom_conjoint'] = ucwords(strtolower($this->input->post('prenom_conjoint')));
			$data['date_naiss_conjoint'] = $this->input->post('date_naiss_conjoint');
			$data['mere_conjoint'] = ucwords(strtolower($this->input->post('mere_conjoint')));
			$data['pere_conjoint'] = ucwords(strtolower($this->input->post('pere_conjoint')));
			$data['emploi_conjoint'] = strtoupper($this->input->post('emploi_conjoint'));

			
			$this->Personnel_model->update($data['matricule'],$data);
			
			//var_dump($data);
			$this->Display_conjoint_enfant($data['matricule']);
		}
	}

	function Display_diplome($id){
		$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
		$data['liste_diplomes'] = $this->Diplome_model->get_diplome_par_personnel($id);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Display_diplome',$data);
		$this->load->view('../common/Footer');
	}

	function display_affectation($id){
		$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
		$data['liste_affectations'] = $this->Affectation_model->get_affectation_par_personnel($id);
		$data['liste_avancements'] = $this->Avancement_model->get_avancement_par_personnel($id);
		$data['liste_cessations'] = $this->Cessation_model->get_cessation_par_personnel($id);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Display_affectation',$data);
		$this->load->view('../common/Footer');
	}

	function display_distinction($id){
		$data['selected_personnel'] = $this->Personnel_model->get_personnel_details($id);
		$data['liste_distinctions'] = $this->Distinction_model->get_distinction_par_personnel($id);
		$data['liste_sanctions'] = $this->Sanction_model->get_sanction_par_personnel($id);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Display_distinction',$data);
		$this->load->view('../common/Footer');
	}

	function search(){
		$data['user_name'] = $this->session->userdata('user_name');
		$data['role'] = $this->session->userdata('role');

		$matr = $this->input->post('matri');	
        
		$role = $this->session->userdata('role');
		
		if(($role == 'admin_user') || ($role == 'other_user'))
		{
			$data['context'] = 'search';
		}
		else
		{
			$data['context'] = 'pas_le_droit';
		}
				
		$data['titre'] = 'Résultats de recherche';
		$data['liste_personnel'] = $this->Personnel_model->search_personnel($matr);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Layout', $data);
		$this->load->view('../common/Footer');
	}

	function search_direction(){
		$data['user_name'] = $this->session->userdata('user_name');
		$data['role'] = $this->session->userdata('role');

		$dir = $this->input->post('direction');	
        
		$role = $this->session->userdata('role');
		
		if(($role == 'admin_user') || ($role == 'other_user'))
		{
			$data['context'] = 'search';
		}
		else
		{
			$data['context'] = 'pas_le_droit';
		}
				
		$data['titre'] = 'Résultats des recherches sur la direction <b>'.$dir.'</b>';
		$data['liste_personnel'] = $this->Personnel_model->search_personnel_par_dir($dir);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Layout', $data);
		$this->load->view('../common/Footer');
	}

	function search_service(){
		$data['user_name'] = $this->session->userdata('user_name');
		$data['role'] = $this->session->userdata('role');

		$serv = $this->input->post('service');	
        
		$role = $this->session->userdata('role');
		
		if(($role == 'admin_user') || ($role == 'other_user'))
		{
			$data['context'] = 'search';
		}
		else
		{
			$data['context'] = 'pas_le_droit';
		}
				
		$data['titre'] = 'Résultats des recherches sur le service <b>'.$serv.'</b>';
		$data['liste_personnel'] = $this->Personnel_model->search_personnel_par_serv($serv);

		$this->load->view('../common/Header', $this->view_setup());
		$this->load->view('personnel/Layout', $data);
		$this->load->view('../common/Footer');
	}
}