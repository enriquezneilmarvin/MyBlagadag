<link rel="stylesheet" href="<?php echo base_url();?>/assets/default-uikit/css/uikit1.css" />
<link rel="shortcut icon" href="<?php echo base_url();?>/uploads/images/b.jpg" type="image/x-icon" />
<script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/uikit.min.js"></script>


<script type="text/javascript">
	$(function(){
		$("#reload").click(function(){
			$("#container1").html('');
			$("#captcha").val('');
			$.ajax({
				url: '<?php echo base_url().'login/reload'?>',
				cache: false,
				dataType: 'JSON',
				success: function(resp){
					$("#container1").html(resp.captcha);
					$("#captcha").val(resp.text);
				}
			});
		});
		$("#submit").click(function(){
			var x1 = $("#captcha").val();
			var x2 = $("#captcha1").val();
			if(x1 == x2){
				return true;
			}
			else{
				alert("MALI");
				return false;
			}
		});
	});
</script>

	
		<title><?=$title?></title>
<head>
<style type='text/css'>
body{
	background-color:#EDF2E6;
	size: 100% @important;
}

</style>

</head>
<br/>
<body>
<?php 
$att = array('class' => 'uk-form');
echo form_open('login/login_check',$att);?>
				
				<div class="uk-grid uk-margin-large-top">
					
					<div class="uk-width-medium-1-3 uk-container-center box uk-animation-shake">
						<div class="uk-panel uk-panel-box">
							<div class="uk-width-1">
							<?php echo $this->session->userdata('message'); ?>
							</div>
								<center>
								<div class="uk-form-row">
									<input type="text" name="username" id="username" placeholder="Username"  style="width:100%"/>
								</div>
								<div class="uk-form-row">
									<input type="password" name="password" id="password" placeholder="Password" style="width:100%"/>
								</div>
								<div class="uk-margin"></div>
								<div class ="uk-form-row uk-container-center">	
									<!--<input class="uk-button uk-button-primary" type="button" name="submit" value="SUBMIT" style="box-sizing:border-box;width:100%"/>-->
									<button type="submit" class="uk-button uk-button-primary" style="width:100%;">LOGIN</button>
								</center>
								</div>
								<center><a href="#register-event" data-uk-modal="{center:true}">Register here</a></center>
								<center><a href="#forgot-pass" data-uk-modal="{center:true;mode='click'}">Forgot Password</a></center>
						</div>
					</div>
				</div>
<?php echo form_close();?>


<div id="register-event" class="uk-modal" style="display">
    <div class="uk-modal-dialog" style="max-width:400px">
	
        <a href="<?php echo base_url().'login'?>" class="uk-close"></a>
        <div class="uk-modal-header">
            <h2>REGISTRATION</h2>
        </div>
        	<?php
				 $att = array( 'class' => 'uk-form uk-form-horizontal');
				 echo form_open('login/reg',$att);
			?>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Fist Name:</label>
					<div class="uk-form-controls">
						<input type="text" name="fname" placeholder="First Name" required />
					</div>
        		</div>
				
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Middle Name:</label>
					<div class="uk-form-controls">
						<input type="text" name="mname" placeholder="Middle Name" required />
					</div>
        		</div>
				
				
				<div class="uk-form-row">
        			<label class="uk-form-label" for=""> Last Name:</label>
					<div class="uk-form-controls">
						<input type="text" name="lname" placeholder="Last Name" required />
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Age:</label>
					<div class="uk-form-controls">
						<input type="text" name="age" placeholder="Age" required />
					</div>
        		</div>
				
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Gender:</label>
					<div class="uk-form-controls">
						<input type="radio" name="gender" value="Male" />MALE
						<input type="radio" name="gender" value="Female" />FEMALE
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Location:</label>
					<div class="uk-form-controls">
						<input type="text" name="loc" placeholder="Location"/>
					</div>
        		</div>
        		<div class="uk-form-row">
        			<label class="uk-form-label" for="">Email:</label>
					<div class="uk-form-controls">
						<input type="text" name="email" placeholder="Valid Email" required />
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Cellphone Number:</label>
					<div class="uk-form-controls">
						<input type="text" name="cpnum" placeholder ="Cellphone No." onkeydown="return ( event.ctrlKey || event.altKey 
						|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
						|| (95<event.keyCode && event.keyCode<106)
						|| (event.keyCode==8) || (event.keyCode==9) 
						|| (event.keyCode>34 && event.keyCode<40) 
						|| (event.keyCode==46) )" required />
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">User Name:</label>
					<div class="uk-form-controls">
						<input type="text" name="username" placeholder="Username" required />
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Password:</label>
					<div class="uk-form-controls">
						<input type="password" name="pass1" placeholder = "Password"required />
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Confirm Password:</label>
					<div class="uk-form-controls">
						<input type="password" name="pass2" placeholder="Confirm Password"required />
					</div>
        		</div>
				<div id="container2" class="uk-form-row">
					<div id="container1"class="uk-form-controls">
					<?php echo $captcha_img;?>
					</div>
				</div>
				<input type ="hidden" id="captcha" value="<?php echo $captcha_word;?>"/>
				<div class="uk-form-row">
					<label class="uk-form-label" for="">CAPTCHA</label>
					<div class="uk-form-controls">
						<input type="text" id = "captcha1" value=""/> 
						
					</div>
					
				</div>
				
				<div class="uk-modal-footer uk-text-right">
					
					<a href="<?php echo base_url().'login'?>" class="uk-button uk-button-danger">Cancel</a>
					<button type="submit" id="submit" class="uk-button uk-button-primary">SUBMIT</button>
				</div>
        	 <?php echo form_close();?>
			 <button id = "reload" class="uk-button uk-button-primary">RELOAD</button>
    </div>
</div>



<div id="forgot-pass" class="uk-modal" style="display">
    <div class="uk-modal-dialog" style="max-width:400px">
	
        <a href="<?php echo base_url().'login'?>" class="uk-close"></a>
        <div class="uk-modal-header">
            <h2>FORGOT PASSWORD</h2>
        </div>
        	<?php
				 $att = array( 'class' => 'uk-form uk-form-horizontal');
				 echo form_open('forgotpassword/email',$att);
			?>
        		<div class="uk-form-row">
        			<label class="uk-form-label" for="">Username:</label>
					<div class="uk-form-controls">
						<input type="text" name="username" placeholder="Username" required />
					</div>
        		</div>
				<div class="uk-form-row">
        			<label class="uk-form-label" for="">Email:</label>
					<div class="uk-form-controls">
						<input type="text" name="email" placeholder="Valid Email" required />
					</div>
        		</div>
				<div class="uk-modal-footer uk-text-right">
					<a href="<?php echo base_url().'login'?>" class="uk-button uk-button-danger">Cancel</a>
					<button type="submit" class="uk-button uk-button-primary">Yes</button>
				</div>
        	 <?php echo form_close();?>
    </div>
</div>
</body>
<script type='text/javascript'>
 $(document).ready(function(){
		<?php if(isset($_GET['reg_id'])) {?>
			var modal = UIkit.modal("#register-event");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
		<?php }?>
});
</script>