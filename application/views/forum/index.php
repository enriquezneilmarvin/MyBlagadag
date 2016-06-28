<?php $this->load->view('header');?>



<script type="text/javascript">
	$(document).ready(function(){
		 
	 	$('#submit').click(function(event){
			event.preventDefault();
			var post_content = document.getElementById('pcontent').value;
			if(post_content == ''){
				alert('Bawal Yan!');
				return false;
			
			}
			else{
			
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url('forum/forum/content_post');?>',
						cache: false,
						// dataType: 'JSON',
						//data: {c_post: post_content},
						// cache: false,
						data: 'content1='+post_content,
						success: function(response){
							// alert(response)
							// $('#.fpb').slideDown('slow',function(){
								// $('.holder').html(response);
							// });
							// $('#postholder').slideDown('slow',function(){
								// $('.holder').html(response);
							// });
							
							//----//
							// $('.fpb').hide('slow').html(response).fadeIn('slow');
							$('#pcontent').val('');
							// $('#fpbholder').animate({down:'250px'});
							// $('.fpb').slideDown('slow',function(){
							
							$('.holder').fadeIn(1000).html(response);
							// $('.holder').fadeIn('500');
							// });
						}
					});
			}
		});
		 
	
		/* $('#btn').click(function(event){
			event.preventDefault();
			var reply_val = document.getElementById('reply').value;
			if(reply_val ==  null ){
					alert('XXXXX');
					return false;
			}
			else{
				var post_id = document.getElementById('fp_id').value;
				
				alert(post_id);
				// alert(reply_val+' '+post_id);
				// $.ajax({
					// type: 'POST',
					// url: '<?php echo base_url('forum/forum/reply_post')?>/'+post_id,
					// cache: false,
					// dataType: 'JSON',
					// data: 'reply='+reply_val,
					// success: function(response){
						// alert(response.id)
					// }
					
				// });
			}
		
		}); */
		
	});
	function delpost(id){
		if(confirm('Delete this post?') == true){
			// $("#postholder").fadeOut();
			// alert(id);
			$.ajax({
				url: '<?php echo base_url('forum/forum/delete_post')?>/'+id,
				success: function(res){
					$("#postholder"+id).fadeOut(1000);
				
				}
			});
		}
	}
	function replypost(id){
			event.preventDefault();
			// alert(id);
			var reply_content = document.getElementById('reply').value;
			if(reply_content == ''){
				alert('Bawal Yan!');
				return false;
			}
			else{
				$.ajax({
					type:'POST',
					url: '<?php echo base_url('forum/forum/reply_post')?>/'+id,
					data: 'reply='+reply_content,
					success: function(response){
						$("#reply").val('');
						$(".replybody"+id).html(response);
					}
				});
			}
	}
	function editPost(id){
		alert(id);
		$("#pcontent1"+id).hide(function(){
			// $("#pcontent1"+id).slideUp(500);
			$("#pcontent1"+id).fadeOut(500);
			$("#pcontent1"+id).slideDown(500);
			
			// $("#pcontent1"+id).slideUp();
			$("#pcontent1"+id).prop("readonly",false);
			$("#pcontent1"+id).focus();
			$("#btn"+id).prop("disabled",true);
			// $("#pcontent1"+id).focus();
		});
		
	}
</script>
<script>
	function validateForm(){
			
			var value1 = document.getElementById('pcontent').value;
			
			if(value1 == (/^\s+|\s+$/g,'') || value1 == null ){
				alert('Status Cannot Be Empty');
				return false;
			}
			else{
				return true;
			}
	}
	
	// $(function(id){
		// $.ajax({
			
		// });		
	
	// });
</script>

<style type="text/css">
#contentbody{
	width:1000px;
	margin:auto;
	position:relative;
	text-align:right;
}
</style>
</div>
	<div ="#contentbody">
		<div class="uk-grid">
			<div class="uk-panel uk-panel-box">
			</div>
			<div class="uk-width-1 uk-container-center-box">
				<?php $att = array('class'=>'uk-form uk-form-horizontal');
				echo form_open('',$att);?>
				<div class="uk-form-row">
					<div class="uk-form-controls " >
						<textarea id="pcontent" name="content1" style="resize:none;" rows="4" cols="100"></textarea>
					</div>
					<h1></h1>
					<div class="uk-width-medium-2-5 uk-push-2-5 uk-text-center">
					<button id ="submit" type="submit" style="width:45%;" class="uk-button uk-button-primary">Submit</button>
					</div>
				
				</div>
				
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
	<h1></h1>
	
	
	<div id="contentbody1">
		<div class="uk-grid uk-width-1">
		
			
			
			<div class="uk-container-center">
				
				<?php $att = array('class'=>'uk-form uk-form-horizontal');
				echo form_open('',$att);?>
				<div  class="postbody1 holder"></div><br/>
				
				<?php foreach($result as $row){?>
				<div id="fpbholder">
				<div class="uk-panel uk-panel-box uk-width-1-5 " id="postholder<?=$row->fp_id;?>" style="width:500px;">
					<?php if($row->user_id == $this->session->userdata('id')){?>
					<div class="uk-float-right uk-margin-bottom" >
					<a class="uk-button" onclick="editPost(<?=$row->fp_id;?>)"><i class="uk-icon uk-icon-pencil-square-o"></i> Edit</a>
					<a class="uk-button uk-button-danger" onclick="delpost(<?=$row->fp_id;?>)"><i class="uk-icon uk-icon-trash-o"></i> Delete</a></div>
					<?php }?>
					
					
					<div class="uk-form-controls ">
						<div class="holder001"><textarea id="pcontent1<?=$row->fp_id;?>" style="resize:none;" rows="4" cols="100" readonly><?=$row->content;?></textarea></div>
					<br/>
					
					<div class="uk-width-1-1">
						<input type="text" name="reply" size ="30%" id="reply" />
					</div>
							
					<div class="uk-align-right">
						<input id="fp_id" type="hidden" value="<?=$row->fp_id;?>"/>
						<button type="submit" class="uk-button uk-button-primary" onclick="return replypost(<?=$row->fp_id;?>)" id="btn<?=$row->fp_id;?>">Reply</button>
					</div>
					</div>
					COMMENTS
					<div class="replybody<?=$row->fp_id;?>">
							<?php $replies = $this->forum_model->getReply($row->fp_id);?>
								<?php if(isset($replies)): foreach($replies as $r):?>
							<div class="reply">
								<div class="Replyholder" >
								<input type="text" value="<?=$r->reply;?>" readonly/><h1></h1>
								</div>
							</div>
								<?php endforeach;endif;?>
					</div>
				</div>
				<h1></h1>
				</div>
				<?php }?>
				
				<?php echo form_close();?>
			</div>
			
			
		</div>
	</div>
	
	<!--
	<script>
	$(function(){
		$().dblclick(function(){
			$.ajax({
			
			});
		});
	});
	</script>-->