<?php
			Class Folder_model extends CI_model{
				function save($save){
					if(isset($save['fl_id'])){
						$this->db->where('fl_id',$save['fl_id']);
						$this->db->update('folder',$save);
					}
					else{
						$this->db->insert('folder',$save);
					}
				
				}
				function upload($save){
					if(isset($save['up_id'])){
						$this->db->where('up_id',$save['up_id']);
						$this->db->update('folder_files',$save);
					}
					else{
						$this->db->insert('folder_files',$save);
					}
				
				}
			}
?>