<?php 
		Class Home extends CI_controller{
			 function __construct(){
					parent:: __construct();
					$this->load->helper(array('url','form'));
					$this->load->library(array('form_validation','session'));
					$this->load->model('home_model');
					if(!$this->session->userdata('id')){
					
					redirect($routes['default_controller']);
					}
					if($this->session->userdata('status') == 2){
						redirect('admin/admin');
					}
			}
				
			function index(){
					$this->load->view('members/index');				
			}
			
			function userchecked(){
					
					$id = $this->session->userdata('id');
					
					$fname = $this->session->userdata('fname');
					$mname = $this->session->userdata('mname');
					$lname = $this->session->userdata('lname');
					$type = $this->session->userdata('type');
					
					$gender = $this->session->userdata('gender');
					$this->db->where('mem_id',$id);
					$data['id'] = $id;
					$data['fname'] = $fname;
					$data['mname'] = $mname;
					$data['lname'] = $lname;
					$data['type'] = $type;
					$this->db->where('mem_id',$id);
					$this->db->where('parent_id',0);
					$data['folders'] = $this->home_model->getfolder();
					$data['title'] = "Home";
					$this->load->view('members/home_view',$data);
			}
				
			function org(){
					$folder = $this->input->post('folder');
					$this->home_model->org($folder);
			}
				
			
			
		}
?>