<?php 
	Class Forgotpassword_model extends CI_model{
		function getEmailLike($username,$email){
			$this->db->like('username',$username);
			$this->db->like('email',$email);
			return $this->db->get('personalinfo')->row();
		}
	
	
	}




?>