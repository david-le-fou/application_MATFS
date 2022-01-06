<?php
class Sanction_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}


	public function get_sanction_par_personnel($matr)
	{
		$requete = "SELECT * FROM sanction 
					INNER JOIN personnel ON personnel.matricule = sanction.matricule
					WHERE personnel.matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('sanction',$data);
		return $this->db->insert_id();
	}

}
?>