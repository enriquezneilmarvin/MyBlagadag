<?php
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
	Class Forgotpassword extends CI_controller{
		function __construct(){
			parent::__construct();
			$this->load->model('forgotpassword_model');
		}
		
		function email(){
				$this->form_validation->set_rules('email','EMAIL','valid_email');
				$resp = null;
				system('ping google.com',$resp);
				if($resp == 0){	
						if($this->form_validation->run()==false){
							$message = alertMessage('You Need a valid email address! ','danger');
							$this->session->set_flashdata('message',$message);
							redirect($routes['default_controller']); 
						}
						else{
							$username = $this->input->post('username');
							$email = $this->input->post('email');
							$result = $this->forgotpassword_model->getEmailLike($username,$email);
							
							if(isset($result)){
								$id = $result->id;
								$password = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 8);
								$hash = md5($password);
								
								
									$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com',465)->setUsername('blagadaginfo@gmail.com')->setPassword('neilenriquez0526');
									$message =  Swift_Message::newInstance();
									$message->setSubject('BlagadagTeam');
									$message->setFrom('blagadaginfo@gmail.com');
									$message->setTo($email);
									$message->setBody('This is your new password <b>'.$password.'</b>','text/html');
									// $message->addPart('<< DO NOT REPLY >>','text/plain');
									$mailer = Swift_Mailer::newInstance($transport);
									$se = $mailer->send($message);
								
									
									if ($se) {
										$mes = alertMessage('Check your Email for New Password','info');
										$this->session->set_flashdata('message',$mes);
										$update = "UPDATE personalinfo set password = '$hash' where id = '$id'";
										$this->db->query($update);
										redirect($routes['default_controller']); 
									} else {
										$mes = alertMessage('We couldnt send our email. Check your email or password then try again','info');
										$this->session->set_flashdata('message',$mes);
										redirect($routes['default_controller']); 
									}		
							}
							else{
								$message = alertMessage('Username and Email did not match on our data','danger');
								$this->session->set_flashdata('message',$message);
								redirect($routes['default_controller']);
							}
						}
				}
				else{
					$message = alertMessage('We couldnt send our Email. Check your internet connection first!','warning');
					$this->session->set_flashdata('message',$message);
					redirect($routes['default_controller']);
				
				}
			}
		}
?>