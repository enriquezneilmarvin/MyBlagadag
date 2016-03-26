<?php 
	Class Admin_folder extends CI_controller{
	
			function __construct(){
				parent::__construct();
				$this->load->library('session');
				$this->load->library('form_validation');
				$this->load->helper(array('url','form'));
				$this->load->model('admin_model');
				if(!$this->session->userdata('id')){
					redirect($routes['default_controller']);		
				}
				if($this->session->userdata('status') == 1){
					redirect('members/home/userchecked');
				}
				
			}
			function create_folder(){
					
				$this->form_validation->set_rules('fl_name','FOLDER NAME','required|is_unique[admin_folder.fl_name]');
				if ($this->form_validation->run() == FALSE){
					$this->load->view('admin/admin_folder_view');
				}
				else{
					$admin_id =  $this->session->userdata('id');
					$fl_name = $this->input->post('fl_name');
					$save['fl_name'] = $fl_name;
					$save['admin_id'] = $admin_id;
					$this->admin_model->saveadminfolder($save);
					$this->session->set_flashdata('msg','Succesfully Added');
					redirect('admin/adminchecked');
				}

			}
			function sub_folder(){
					
				$this->load->view('./under_construction');
			}
			function view(){
				$this->load->view('admin/admin_files_view');
			}
			function GoUp(){
				$this->load->view('admin/admin_upload_view');
			}
			function upload(){
					// debug($_FILES,1);
					// if($this->input->post('submit') == 'file'){
						
						
						$config['remove_spaces'] = true;
						$config['upload_path']          = './uploads/admin_uploads/';
						$config['allowed_types']        = 'jpeg|png|jpg';
						// debug($config,1);
						$this->load->library('upload',$config);
						// debug($_FILES,1);
						if(!$this->upload->do_upload('file-upload')){
							$message = $this->upload->display_errors();
							$message = alertMessage($message,'danger');
							$this->session->set_flashdata('message',$message);
							redirect('admin/admin_folder/goUp');
						}
						else{
							$filename = $this->upload->data('file_name');
							echo "<pre>";
							echo $filename;
						}
						
					// }
					// else{
						// echo "AS";
					// }
			}
	}

?>