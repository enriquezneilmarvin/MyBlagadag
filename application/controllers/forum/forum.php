<?php
	Class Forum extends	CI_controller{
		function __construct(){
			parent::__construct();
			$this->load->model('forum/forum_model');
			if(!$this->session->userdata('id')){
				redirect('login');
			}
		}
		function index(){
			$data['result'] = $this->forum_model->getPost();
			$this->load->view('forum/index',$data);
		}
			
		function content_post(){
			$str ='';
			if($this->input->post('content1')){
					$data = array(
						'content'=>$this->input->post('content1'),
						'user_id'=>$this->session->userdata('id'),
						'date_created'=> date('Y-m-d H:i:s'));
				if($this->forum_model->insertdata($data) !== false){
					// return $data['id'] = $this->db->insert_id();
					// echo $this->db->insert_id();die();
					$id = $this->db->insert_id();  //get the last inserted id
					
				
					
					$result = $this->forum_model->GetRow($id);
					$str .= '
				
					<div>
						<div class="uk-panel uk-panel-box uk-width-1-5 " id="postholder'.$result->fp_id.'" style="width:500px;">
											<div class="uk-float-right uk-margin-bottom" onclick="delpost('.$result->fp_id.')"><a class="uk-button uk-button-danger">Delete</a></div>
											<br/>
							<div class="uk-form-controls">
							
								<textarea id="pcontent1" style="resize:none;" rows="4" cols="100" readonly>'.$result->content.'</textarea>
								<h1></h1>
								
								<div class="uk-width-1-1">
									<input type="text" name="reply" size ="30%"id="reply"/>
									
								</div>
							
							<div class="uk-align-right">
								<input id="fp_id" type="hidden" value='.$result->fp_id.'>
								<button class="uk-button uk-button-primary" onclick="replypost('.$result->fp_id.')" id="btn"  >Reply</button>
							</div> 
							</div>
							COMMENTS
							</div>
								
						</div>
				
				';
				/* $str .= '<div class="uk-width-1-1">
							<input type="text" name="reply"/>
							</div>
							'.$btn = array('class'=>'btn','type'=>'hidden','type'=>'submit','value'=> 'REPLY');$text = form_submit($btn).'	 */
				echo $str;
					// $data = array(
						// 'content'=>$this->input->post('content1'),
						// 'user_id'=>$this->session->userdata('id'),
						// 'date_created'=> date('Y-m-d H:i:s'));
						// 'id'=> $this->db->insert_id());
						// echo '<script>alert('.$this->db->insert_id().');</script>';
					// $data = array()$this->db->insert_id();
					// echo json_encode($data);	
					// redirect('forum/forum');
					// echo 
				}
			}
			
			
			// echo json_encode($data);	
			// $this->forum_model->insertdata($data);
		}
		
		function content_edit(){
		
		
		}
		function delete_post($id){
			// $str='';
			$deletePost = "Delete From forum_post where fp_id='$id'";
			$deleteReply = "Delete From forum_replies where fp_id ='$id'";
			$result1 = $this->db->query($deleteReply);
			$result = $this->db->query($deletePost);
			if($result){
				if($result1){
					return 1;
				}
			}
		}
		function reply_post($post_id){
			$str='';
			$data = array('reply'=> $this->input->post('reply'),
						  'user_id'=>$this->session->userdata('id'),
						  'fp_id'=>$post_id,
						  'date_created'=> date('Y-m-d H:i:s')
				);
			
			if($this->forum_model->insertReply($data) !== false){
				$id = $this->db->insert_id();
				$reply = $this->forum_model->GetReplyRow($post_id);
				// $replies = $this->forum_model->getReplies($post_id);
				// foreach($replies as $rr){
					// $str .='<div id ="replybody'.$reply->fp_id.')"
							// <div class="reply">
								// <div class="Replyholder" >
								// <input type="text" value='.$reply->reply.' readonly/><h1></h1>
								// </div>
							// </div>';
					$str .='<div class="reply">
								<div class="Replyholder">
								<input type="text" value='.$reply->reply.' readonly/><h1></h1>
								</div>
							</div>';
					echo $str;
				// }
				// echo $str;
				// $data['id'] = $id;
				// echo json_encode($data);
				
			
			}
		}
	}
?>