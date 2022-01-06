<?php
class Other_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}

	public function toutes_les_directions()
	{
		$requete = "SELECT DISTINCT id_direction FROM personnel"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function tous_les_services()
	{
		$requete = "SELECT DISTINCT id_service FROM personnel"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function tous_les_corps()
	{
		$requete = "SELECT * FROM corps"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function tous_les_grades()
	{
		$requete = "SELECT * FROM grade"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function tous_les_soa()
	{
		$requete = "SELECT * FROM localite_de_service"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function tous_les_honneurs()
	{
		$requete = "SELECT * FROM honneur"; 

		$query = $this->db->query($requete);
		return $query->result();
	}
}
?>