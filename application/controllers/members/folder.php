<?php
	Class Folder extends CI_controller{
			 function __construct(){
					parent:: __construct();
					$this->load->helper(array('url','form','Blagadag_helper'));
					$this->load->library(array('form_validation','session'));
					$this->load->model('home_model');
					$this->load->model('folder_model');
					if(!$this->session->userdata('id')){
					redirect($routes['default_controller']);
					}
					if($this->session->userdata('status') == 2){
					redirect('admin/admin');
					}
			
			}
			
			
			// view folders and files
			function view($fl_id = true,$parent_id = true){
				
					
				
					$data['fl_id'] = $fl_id;
					$this->db->where('fl_id',$fl_id);
					
					$folder = $this->home_model->getfolder();
					foreach ($folder as $folders){
						$data['folder'] = $folders->fl_name;
					}
					$this->db->where('fl_id',$fl_id);
					$this->db->where('child_id',0);
					$data['files'] = $this->home_model->getfolderfiles();
					//print_r($data['files']);die();
					$this->db->where('parent_id',$fl_id);
					$data['parent_id'] = $parent_id;
					$data['subfol'] = $this->home_model->getfolder();
					$this->load->view('members/folder_view',$data);
			
			}
			
			
			
			
			
			
			// upload or edit a file
			
			function upload($fl_id = true,$up_id =false){
			
			if(!$this->session->userdata('username')){
						redirect('login/login_check');
					}
					// ADD
			
				if(!$up_id){
					
					$data['fl_id'] = $fl_id;
					
					$this->form_validation->set_rules('title','TITLE','required|is_unique[folder_files.title]');
					$data['up_id'] ='';
					
					$config['upload_path']          = './uploads/';
					 $config['allowed_types']        = '*';
					// $config['max_size']             = 10000;
					// $config['max_width']            = 10000;	
					// $config['max_height']           = 10000;
					$this->load->library('upload',$config);
					
					
							if($this->form_validation->run() == false){
								$this->load->view('members/upload_view',$data);
							}
							else{
								
								$title = $this->input->post('title');
								$uploadedfile = $this->upload->do_upload('userfile');
								
								if(!$uploadedfile){
									$msg = $this->upload->display_errors();
									echo "<script type='text/javascript'> alert('$msg')</script>";
									$this->load->view('members/upload_view',$data);
								
								}
								else{
									$file_name = $this->upload->data('file_name');
									$raw_name = $this->upload->data('raw_name');
									
									$save['title'] = $title;
									$save['file_name'] = $file_name;
									$save['raw_name'] = $raw_name;
									$save['child_id'] = 0;
									$save['fl_id'] = $fl_id;
									$this->folder_model->upload($save);
									$message = alertMessage('File Uploaded','success');
									$this->session->set_flashdata('message',$message);
									$this->session->flashdata('message');
									redirect('members/folder/view/' . $fl_id);
								}

							}
					}

				// EDIT / UPLOADED FILE (OPTIONAL)
				else{
					$value['fl_id'] = $fl_id;
					$value['up_id'] = $up_id;
					$this->db->where('up_id',$up_id);
					$this->db->where('fl_id',$fl_id);
					$value['value'] = $this->home_model->getfolderfiles();
					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = '*';
					$this->load->library('upload',$config);
					$this->form_validation->set_rules('title','TITLE','trim|required');
						if($this->form_validation->run() == FALSE){
							$this->load->view('members/upload_view',$value);
						}
						else{
							$title = $this->input->post('title');
							$save['up_id'] = $up_id;
							$save['title'] = $title;
							$save['fl_id'] = $fl_id;
							$uploadedfile = $this->upload->do_upload();
							$this->db->select('file_name');
							$this->db->select('raw_name');
							$this->db->where('up_id',$up_id);
							$query = $this->home_model->getfolderfiles();
									foreach ($query as $row){
										$data['file_name'] = $row->file_name;
										$data['raw_name']  = $row->raw_name;
											
											if(!$uploadedfile){
												$save['file_name'] = $data['file_name'];
												$save['raw_name'] = $data ['raw_name'];
											}
											if($uploadedfile){
												if($data['file_name'] != ''){
													$file = './uploads/' . $data['file_name'];
													//delete the previous file if neccesary
														if(file_exists($file)){
																unlink($file);
														}
												}
											}
									}
									if($uploadedfile){
											$file_name = $this->upload->data('file_name');
											$raw_name = $this->upload->data('raw_name');
											$save['file_name'] = $file_name;
											$save['raw_name'] = $raw_name;
									}
									$this->folder_model->upload($save);
									$message = alertMessage('File Uploaded','success');
									$this->session->set_flashdata('message',$message);
									redirect('members/folder/view/' . $fl_id);
						}
				}
			}
			function deletefile($fl_id,$up_id){
					$this->db->select('file_name');
					$this->db->where('up_id',$up_id);
					$data = $this->home_model->Getfolderfiles();
					foreach($data as $row){
					$file= $row->file_name;
							if(isset($file)){
									unlink('uploads/' . $file);
							}
					$delete = "Delete from folder_files where up_id = '$up_id'";
					$this->db->query($delete);
					$message = alertMessage('File Deleted','success');
					$this->session->set_flashdata('message',$message);
					redirect('members/folder/view/' . $fl_id);
					
					}
					
			}

	}

?>