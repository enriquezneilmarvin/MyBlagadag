<?php
	Class Global_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function global_table_result($mytable){
			return $query = $this->db->get($mytable)->result();	
		}
		function global_table_result_array($mytable){
			return $query = $this->db->get($mytable)->result_array();
		}
		function global_insert($mytable,$mydata){
			$this->db->insert($mytable,$mydata);
		}
	}
?>