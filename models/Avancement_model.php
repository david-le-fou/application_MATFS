<?php
class Avancement_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_avancement_par_personnel($matr)
	{
		$requete = "SELECT * FROM avancement 
					INNER JOIN personnel ON personnel.matricule = avancement.matricule
					WHERE personnel.matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('avancement',$data);
		return $this->db->insert_id();
	}

}
?>