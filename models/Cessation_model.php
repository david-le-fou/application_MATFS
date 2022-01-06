<?php
class Cessation_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_cessation_par_personnel($matr)
	{
		$requete = "SELECT * FROM cessation 
					INNER JOIN personnel ON personnel.matricule = cessation.matricule
					WHERE personnel.matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('cessation',$data);
		return $this->db->insert_id();
	}

}
?>