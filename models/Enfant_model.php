<?php
class Enfant_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_enfant_par_personnel($matr)
	{
		$requete = "SELECT * FROM enfant 
					INNER JOIN personnel ON personnel.matricule = enfant.matricule
					WHERE personnel.matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('enfant',$data);
		return $this->db->insert_id();
	}

}
?>