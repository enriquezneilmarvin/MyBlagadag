<?php 
	Class admin_class extends CI_controller{
	
		function __construct(){
			parent::__construct();
			if(!$this->session->userdata('id')){
				redirect($routes['default_controller']);
			}
			if($this->session->userdata('status') == 1){
				redirect('home/userchecked');
			}
		}
		function index(){
			$this->load->view('admin/mentor/class');
		}
		
	
	}	


?>