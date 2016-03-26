
<?php 

	Class Home_model extends CI_model{
		function getfolder(){
			return	 $query = $this->db->get('folder')->result();
			 
		}
		function getfolderfiles(){
			return $query = $this->db->get('folder_files')->result();
		}
		function getUsers(){
			return $query = $this->db->get('personalinfo')->result();
		}
		function organize($data)
		{
			foreach ($folder as $seq => $id)
			{
				$data = array('sequence' => $sequence);
				$this->db->where('fl_id', $id);
				$this->db->update('folder', $data);
			}
		}
	}
?>