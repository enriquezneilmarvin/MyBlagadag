<?php
		Class Login_model extends CI_model{
			function userget(){
				$query = $this->db->get('personalinfo');
				return $query->result();
			}
			
			function getInfo($email){
			$this->db->where('email',$email);
				// return $query = $this->db->get('personalinfo')->row();
			// $this->db->like('username',$username);
			// $this->db->like('email',$email);
			return $this->db->get('personalinfo')->row();
			}
			function confirm($email){
				$x = 1;
				$update = "Update personalinfo set is_confirm = '$x',status = '$x',type ='member' where email = '$email'";
				$this->db->query($update);
			}
		
		}
?>