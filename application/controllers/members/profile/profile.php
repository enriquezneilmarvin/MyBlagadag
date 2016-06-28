<?php
	Class Profile extends CI_controller{
		function __construct(){
			parent::__construct();
			if(!$this->session->userdata('username')){
				redirect($routes['default_controller']);
			}
			if($this->session->userdata('id') == 1){
				redirect('members/home/userchecked');
				
			}
		}
		function index(){
			$mytable = 'personalinfo';
			$data['result'] = $this->global_model->global_table_result($mytable);
			$this->load->view('members/profile/profile',$data);
		}
		
		
	}


?>