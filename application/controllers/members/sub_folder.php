<?php 
		Class Sub_folder extends CI_controller{
				 function __construct(){
					parent:: __construct();
					$this->load->helper(array('url','form'));
					$this->load->library(array('form_validation','session'));
					$this->load->model('home_model');
					$this->load->model('subfolder_model');
					if(!$this->session->userdata('id')){
							redirect($routes['default_controller']);
					}
					if($this->session->userdata('status') == 2){
						redirect('admin/admin');
					}
					
			}
				function folder($fl_id =true,$parent_id = false){
					if(!$parent_id){
						$id = $this->session->userdata('id');
						$data['mem_id'] = $id;
						$data['fl_id'] = $fl_id;
						$data['parent_id'] = '';
						$this->form_validation->set_rules('fl_name','FOLDER NAME','required|is_unique[folder.fl_name]');
					if($this->form_validation->run() == FALSE) {
						$this->load->view('members/subfolder_view',$data);
					}
					else{
						$fl_name = $this->input->post('fl_name');
						$save['fl_name'] = $fl_name;
						$save['mem_id'] = $data['mem_id'];
						$save['parent_id'] = $data['fl_id'];
						
						$this->subfolder_model->save($save);
						$message = alertMessage('Sub-folder Created','success');
						$this->session->set_flashdata('message',$message);
						redirect('members/folder/view/' . $fl_id);
					
					}
					}
					else{
						
						$data['parent_id'] = $parent_id;
						$data['fl_id'] = $fl_id;
						
						
						$this->form_validation->set_rules('fl_name','FOLDER NAME','required|is_unique[folder.fl_name]');
						if($this->form_validation->run() == false){
							$this->load->view('members/subfolder_view',$data);
						
						}
						
					
					
					}
				
					
					
					
					
				
		
				}
		}

?>