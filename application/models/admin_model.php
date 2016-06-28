<?php
	Class Admin_model extends CI_model{
	
	
		function saveadminfolder($save){
			$this->db->insert('admin_folder',$save);
		}
		function GetFolder($admin_id){
		$this->db->where('admin_id', $admin_id);		
		$this->db->from('admin_folder');
		$query = $this->db->get();
		return $query->result();
		}
		function getUsers(){
			return $query = $this->db->get('personalinfo')->result();
		}
		function getActive($status){
			$this->db->where('status',$status);
			$this->db->from('personalinfo');
			$query =  $this->db->get();
			return $query->result();
		}
		function getCalendar(){
			return $query = $this->db->get('calendar')->result_array();
		}
	
	}
?>