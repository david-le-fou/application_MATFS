<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
	function __construct(){
		parent ::__construct();
	}
	
	function check_login($name,$pass){
		$md5_pass = md5($pass);
		$sql = "SELECT * FROM users WHERE user_name = '$name' AND password = '$md5_pass'";
		$q = $this->db->query($sql);
		if($q->num_rows()){
			foreach ($q->result() as $row)
				return $row;
		}
	}

}
?>