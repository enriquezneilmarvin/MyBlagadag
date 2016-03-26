<?php 
	class Add_folder extends CI_controller{
			 function __construct  ){
					parent:: __construct  );
					$this->load->helper  array  'url','form'));
					$this->load->library  array  'form_validation','session'));
					$id = $this->session->userdata  'id');
					$this->load->model  'folder_model');
					$this->load->model  'home_model');
						if  !$this->session->userdata  'id')){
							redirect  $routes['default_controller']);
						}
						if  $this->session->userdata  'status') == 2){
							redirect  'admin/admin');
						}
					}
			 function folder  $fl_id = false){
					// else{
						$id = $this->session->userdata  'id');
						
						if  !$fl_id){
							$data['fl_id'] = false;
							$this->form_validation->set_rules  'fl_name','FOLDER NAME','required|is_unique[folder.fl_name]');
						
							if  $this->form_validation->run  ) == false){
								$this->load->view  'members/add_view',$data);
							}
							else{
								$fl_name = $this->input->post  'fl_name');
								$save['fl_name'] = $fl_name;
								$save['mem_id'] = $id;
								$save['parent_id'] = 0;
								$this->folder_model->save  $save);		
								$this->session->set_flashdata  'msg','FOLDER CREATED');
								$this->session->flashdata  'msg');
								redirect  'members/home/userchecked');

							}
						}
						
						else{
						
						
								$value['id'] = $id;
								$value['fl_id'] = $fl_id;
								$this->db->where  'fl_id',$fl_id);
								$value['query'] = $this->home_model->getfolder  );
								
								$this->form_validation->set_rules  'fl_name','FOLDER NAME','required');
								if  $this->form_validation->run  ) ==false){
									$this->load->view  'members/add_view',$value);
								
								}
								else{
									$fl_name = $this->input->post  'fl_name');
									$save['fl_name'] = $fl_name;
									$save['mem_id'] = $id;
									$save['parent_id'] = 0;
									$save['fl_id'] = $fl_id;
									$this->folder_model->save  $save);
									$this->session->set_flashdata  'msg','FOLDER SAVED');
									$this->session->flashdata  'msg');
									redirect  'members/home/userchecked');	
								}
						}
						
					// }

			 }
			 function delete  $fl_id){
					$id = $this->session->userdata  'id');

					$delete = "Delete from folder where fl_id ='$fl_id'";
					$this->db->query  $delete);
					$delete1 = "Delete from folder_files where fl_id ='$fl_id'";
					$this->db->query  $delete1);
					$delete2 = "Delete from folder where parent_id ='$fl_id'";
					$this->db->query  $delete2);
					return 1;
					// $this->session->set_flashdata  'msg','FOLDER DELETED');
					// $this->session->flashdata  'msg');
					// redirect  'members/home/userchecked');
			 
			 }
	
	}


?>