<?php
require_once APPPATH.'libraries/swift_mailer/swift_required.php';
		Class Login extends CI_controller{
			 function __construct(){
					parent:: __construct();
					$this->load->helper(array('url','form','Blagadag_helper','captcha'));
					$this->load->library(array('form_validation','session','encrypt'));
					$this->load->model('login_model');
					
			}
			
			function index(){
				delete_files('./captcha');
				if($this->session->userdata('username') != '' ){
						if($this->session->userdata('id') == 1){
							redirect('admin/admin');
						}else{
							redirect('members/home/userchecked');
						}
					}
				// $captcha = './captcha/'.'*.*';
				// unlink($captcha);
				$data['title'] = "LOGINFORM";
				$vals = array(
					'img_path' => './captcha/',
					'img_url'  => base_url().'captcha',
					'expiration'=> 1800,
					'img_height' => 90,
					'font_size' => 20,
					'img_width' => 150,
					'word'=>substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 8),
					'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
				));
			
				$cap = create_captcha($vals);
				$data['captcha_img'] = $cap['image'];
				$data['captcha_word']  = $cap['word'];
				$this->load->view('login_view',$data);
				
			}
		function reload(){
			
		$vals = array(
			'img_path' => './captcha/',
			'img_url'  => base_url().'captcha',
			'expiration'=> 1800,
			'img_height' => 90,
			'img_width' => 150,
			'word'=>substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 8),
			'colors'        => array(
			'background' => array(255, 255, 255),
			'border' => array(255, 255, 255),
			'text' => array(0, 0, 0),
			'grid' => array(255, 40, 40)
				));
			
			$cap = create_captcha($vals);
			$data['captcha'] = $cap['image'];
			$data['text']  = $cap['word'];
			echo json_encode($data);
			
			
		}
			function login_check(){
				$this->form_validation->set_rules('username','USERNAME','required|trim');
				$this->form_validation->set_rules('password','PASSWORD','required|trim');
				if($this->form_validation->run()== FALSE){
					
					$error = validation_errors();
					$message = alertMessage($error,'danger');
					$this->session->set_flashdata('message',$message);
					redirect($routes['default_controller']);
					
				}
				else{
					$username = $this->input->post('username');
					$password = md5($this->input->post('password'));
					// $hash  = password_hash($password,PASSWORD_BCRYPT);
				
					$this->db->where('username',$username);
					$this->db->where('password',$password);
					$data = $this->login_model->userget();
					
					if($data){
						//$username = $this->session->set_userdata('username');
						foreach($data as $row){
							$id = $row->id;
							$fname = $row->fname;
							$mname = $row->mname;
							$lname = $row->lname;
							$gender	= $row->gender;
							$type = $row->type;
							$status = $row->status;
						}
							$session_data['id'] = $id;
							$session_data['fname'] = $fname;
							$session_data['mname'] = $mname;
							$session_data['lname'] = $lname;
							$session_data['gender'] = $gender;
							$session_data['type'] = $type;
							$session_data['status'] = $status;
							$session_data['username'] = $username;
							$sess_array = $this->session->set_userdata($session_data);
						
						if($status == 2){
							redirect('admin/admin');
						}
						elseif($status ==1){
							redirect('members/home/userchecked');
						}
						elseif($status == 0){
							$error = "Your Account is Pending. Please Confirm it using your email";
							$message = alertMessage($error,'info');
							$this->session->set_flashdata('message',$message);
							redirect($routes['default_controller']);
						}
						elseif($status == 3){
							$message = alertMessage('Your Account is Banned. You Cannot Login','danger');
							$this->session->set_flashdata('message',$message);
							redirect($routes['default_controller']);
						}
					}
					else{
							$error = "Invalid Username Or Password";
							$message = alertMessage($error,'danger');
							$this->session->set_flashdata('message',$message);
							redirect($routes['default_controller']);
					}
				}

			}
			
			
			function reg(){
			
			$this->form_validation->set_rules('email','EMAIL','required|valid_email|is_unique[personalinfo.email]');
			
			if($this->form_validation->run() == false){
					$message = alertMessage('We Need a valid/unique email to confirm your account!','danger');
					$this->session->set_flashdata('message',$message);
					 redirect($routes['default_controller']);
					 
			}
			else{
				$resp = null;
				system('ping google.com',$resp);
				if($resp = 0){
				// if()
						if($this->input->post('pass1') == $this->input->post('pass2')){
							$data = array(
									'fname' => $this->input->post('fname')
									,'mname' => $this->input->post('mname')
									,'lname' => $this->input->post('lname')
									,'age' =>$this->input->post('age')
									,'gender' => $this->input->post('gender')
									,'location'=> $this->input->post('loc')
									,'email' => $this->input->post('email')
									,'is_confirm' => 0
									,'cpnum' => $this->input->post('email')
									,'username'=> $this->input->post('username')
									,'password'=> md5($this->input->post('pass1'))
									,'status'=> 0
									,'type'=>'pending
									'
							);
							$email = $this->input->post('email');
							$this->db->insert('personalinfo',$data);
							
							$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com',465)->setUsername('blagadaginfo@gmail.com')->setPassword('neilenriquez0526');
							// $email2 = $this->encrypt->encode($email);
							 // $email2 = rawurlencode($email);
							$email2 = encode_url($email);
							$message =  Swift_Message::newInstance();

							$message->setSubject('BlagadagTeam');
							$message->setFrom('blagadaginfo@gmail.com');
							$message->setTo($email);
							$message->setBody('Please Click the Link to confirm your Account <b><a>localhost:8080/MyBlagadag/login/is_confirm/?id='.$email2.'</a></b>','text/html');
							
							$mailer = Swift_Mailer::newInstance($transport);
							$se = $mailer->send($message);
						
							
							if($se){
								$message = alertMessage('Succesfully Register. Please Confirm your Account using your email','success');
							}
							else{
								$message = alertMessage('We Couldnt Send our Email. Check your Internet Connection','warning');
							}	
							$this->session->set_flashdata('message',$message);
							redirect($routes['default_controller']);
							
						}
						else{
							$error = 'Password Did not Match. Please Repeat the registration';
							$message = alertMessage($error,'warning');
							$this->session->set_flashdata('message',$message);
							redirect($routes['default_controller']);
						
						}
					}
					else{
						$message = alertMessage('We couldnt send our Email. Check your internet connection first!','warning');
						$this->session->set_flashdata('message',$message);
						redirect($routes['default_controller']);
					}
				}
			}
			function user_logout(){			
				 $this->session->sess_destroy();
				 $message = alertMessage('You have been logout','success');
				 $this->session->set_flashdata('message',$message);
				 redirect($routes['default_controller']);
			}
			function is_confirm(){
			
				$email2 = $_GET['id'];
				$email =  decode_url($email2);
				$result = $this->login_model->getInfo($email);
				if($dec = ''){
					$message = alertMessage('Click the link that we given to your email ','info');
				}
				else{
					if($result){
						if($result->is_confirm == 0){		
							$id = $result->id;
							if($this->login_model->confirm($email) !== false){
								$message = alertMessage('Account Confirmed. Enjoy !','Info');
							}
						}
						else{
							$message = alertMessage('Account already confirm.','Info');
						}
					}
					else{
						$message = alertMessage('You Enter a Invalid URL. Stop !','danger');
					}
				}
				$this->session->set_flashdata('message',$message);
				redirect($routes['default_controller']);
			}
	}
?>