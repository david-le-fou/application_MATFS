<?php
class Personnel_model extends CI_Model{
	private $count;
	
	public function __construct()
	{
		parent::__construct();
		$this->count = 0;
	}

	public function find_all($start,$offset)
	{	
		$query = $this->db->get('personnel', $start,$offset);
		$this->count = $query->num_rows();
		return $query->result();
	}

	public function getCountTable()
	{
		$query = $this->db->get('personnel');
		return $query->num_rows();
	}

	public function get_personnel_details($matr)
	{
		$requete = "SELECT * FROM personnel	WHERE matricule = '$matr'";

		$query = $this->db->query($requete);
		return $query->result();
	}

	function add($data){
		$this->db->insert('personnel',$data);
		return $this->db->insert_id();
	}

	public function update($id,$data)
	{
		$this->db->where('matricule',$id);
		$this->db->update('personnel',$data);
	}

	public function search_personnel($matr)
	{
		$requete = "SELECT * FROM personnel WHERE matricule LIKE '%$matr%'"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function search_personnel_code_profil($matr)
	{
		$requete = "SELECT * FROM personnel WHERE code_profil = '$matr'"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function search_personnel_par_dir($dir)
	{
		$requete = "SELECT * FROM personnel WHERE id_direction = '$dir'"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function search_personnel_par_serv($ser)
	{
		$requete = "SELECT * FROM personnel WHERE id_service = '$ser'"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function personnel_reheta($start, $stop)
	{
		$requete = "SELECT * FROM personnel WHERE num_auto_incr BETWEEN $start AND $stop"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function personnel_reheta_no_limit()
	{
		$requete = "SELECT * FROM personnel"; 

		$query = $this->db->query($requete);
		return $query->result();
	}

	public function maka_donnees_badge()
	{
		$requete = "SELECT matricule, nom, prenoms, id_direction, id_service, photo, code_profil FROM personnel"; 

		$query = $this->db->query($requete);
		return $query->result();
	}
}
?>