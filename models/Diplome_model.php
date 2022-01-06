<?php
class Diplome_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_diplome_par_personnel($matr)
	{
		$requete = "SELECT * FROM diplome 
					INNER JOIN personnel ON personnel.matricule = diplome.matricule
					WHERE personnel.matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('diplome',$data);
		return $this->db->insert_id();
	}

}
?>