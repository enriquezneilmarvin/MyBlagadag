<?php

	Class Forum_model extends CI_Model{
		function insertdata($data){
			$this->db->insert('forum_post',$data);
			return $this->db->insert_id();
			
		}
		function getPost(){
			$this->db->order_by('fp_id','desc');
			return $query = $this->db->get('forum_post')->result();
		
		}
		function GetRow($id){
			$this->db->where('fp_id',$id);
			return $query = $this->db->get('forum_post')->row();
		}
		function insertReply($data){
			$this->db->insert('forum_replies',$data);
			return $this->db->insert_id();
		}
		function getInfo($user_id){
			// $this->db->where('user_id',$id);
			
		}
		function getReply($post_id){
			$this->db->where('fp_id',$post_id);
			$this->db->order_by('date_created','desc');
			
			return $query = $this->db->get('forum_replies')->result();
		}	
		function getReplyRow($post_id){
			$this->db->where('fp_id',$post_id);
			return $query = $this->db->get('forum_replies')->row();
		}
		function getReplies($post_id){
			$this->db->where('fp_id',$post_id);
			return $query = $this->db->get('forum_replies')->result();
		}
	
	}

?>