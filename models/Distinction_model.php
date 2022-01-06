<?php
class Distinction_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_distinction_par_personnel($matr)
	{
		$requete = "SELECT * FROM distinction 
					INNER JOIN personnel ON personnel.matricule = distinction.matricule
					WHERE personnel.matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('distinction',$data);
		return $this->db->insert_id();
	}

}
?>