
 <html>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/default-uikit/css/uikit1.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery-ui.css" />
	<link rel="shortcut icon" href="<?php echo base_url();?>/uploads/images/b.jpg" type="image/x-icon" />
	<script type="text/javascript" src="<?php echo base_url();?>/assets/ajax/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/ajax/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/uikit.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/uikit.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/accordion.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/accordion.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/lightbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/nestable.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/nestable.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/sortable.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/default-uikit/js/components/sortable.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/jquery-ui.js"></script>
    
  

 
	<div class="uk-container-center uk-width-9-10" >
	 <nav class="uk-navbar" >
		<ul class="uk-navbar-nav uk-hidden-small">
			
				<li>
					<a href="<?php echo base_url('members/home');?>">
					 Home
					</a>
				</li>
				
				<li>
					<a href="<?php echo base_url('members/home/userchecked');?>">
					FILES
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('forum/forum');?>">
					Forum
					</a>
				</li>
			<!--<li><a href="">Item</a></li>
			<li class="uk-parent" data-uk-dropdown>
				<a href="">Parent</a>
				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<li><a href="#">test1</a></li>
						<li><a href="#">test2</a></li>
						<li class="uk-nav-header">test header</li>
						<li><a href="#">test4</a></li>
						<li><a href="#">test5</a></li>
						<li class="uk-nav-divider"></li>
						<li><a href="#">test6</a></li>
						
					</ul>
				</div>
			</li>-->
		</ul>
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav">
				
				<li class="uk-parent" >
				
				<a href="<?php echo base_url('members/profile/profile');?>">
					<img class="uk-border-circle" src="<?php echo base_url('uploads/images/default.png');?>" style="width:35px;height:35px;margin-bottom:5px;"></img>
					<?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname');?>
					
				</a>
				</li>
				<li class="uk-parent" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
                    <a href="">Actions <i class="uk-icon-caret-down"></i></a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
							<li><a href="<?php echo base_url().'login/user_logout'?>">LOGOUT</a></li>
                        </ul>
                    </div>
                </li>
                </ul>
            </div>
	</nav>
	
	<hr></hr>
	<div class="uk-width-1">
	<?php echo $this->session->userdata('message');?>
	</div>
	
	
	
	
