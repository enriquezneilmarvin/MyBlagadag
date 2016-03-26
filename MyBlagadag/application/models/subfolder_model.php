<?php 

	Class Subfolder_model extends CI_model{
			function save  $save){
				if  isset  $save['sub_id'])){
					$this->db->where  'fl_id',$save['sub_id']);
				}
				else{
					$this->db->insert  'folder',$save);
				}
			}
			
	}
?>