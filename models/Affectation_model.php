<?php
class Affectation_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_affectation_par_personnel($matr)
	{
		$requete = "SELECT * FROM affectation WHERE matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('affectation',$data);
		return $this->db->insert_id();
	}

}
?>