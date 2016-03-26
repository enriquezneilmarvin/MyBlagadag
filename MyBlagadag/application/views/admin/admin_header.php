 <html>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" href="<?php echo base_url();?>/assets/default-uikit/css/uikit.min.css" />-->
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/default-uikit/css/uikit1.css" />
	<!-- <link rel="stylesheet" href="<?php echo base_url();?>/assets/fullcalendar/lib/cupertino/jquery-ui.min.css" />-->
	
	<link rel="shortcut icon" href="<?php echo base_url();?>/uploads/images/b.jpg" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.css"/>
	
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.css" />-->
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/dropzone-custom.css" />-->
	
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js"></script>-->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/jquery.min.js"></script>-->
	<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/jquery-1.11.3.min.js"></script>-->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/moment.js"></script>-->
	
	
    <script src="<?php echo base_url();?>/assets/default-uikit/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>/assets/default-uikit/js/uikit.min.js"></script>
	
	<div class="uk-container-center uk-width-9-10" >
	 <nav class="uk-navbar" >
		<ul class="uk-navbar-nav uk-hidden-small">
			<li><a href="<?php echo base_url().'admin/admin'?>">Home</a></li>
			<li><a href="<?php echo base_url().'admin/admin/adminchecked'?>">Files</a></li>
			<li><a href="<?php echo base_url().'admin/admin/calendar'?>">Calendar</a></li>
			
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
			
			<li class ="uk-parent" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
			<a href ="#">Class <i class="uk-icon-caret-down"></i></a>
				
				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<li><a href="<?php echo base_url().'admin/mentor/admin_class'?>">Manage your Class</a></li>
						<li><a href="<?php echo base_url().'admin/mentor/admin_class/enter'?>">Enter Class</a></li>
						
				</div>
			</li>
			
			<li class ="uk-parent" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
			<a href="#">Accounts <i class="uk-icon-caret-down"></i></a>
				
				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<li><a href="<?php echo base_url().'admin/admin/ActiveAccounts'?>">Active Accounts</a></li>
						<li><a href="<?php echo base_url().'admin/admin/BannedAccounts'?>">Banned Accounts</a></li>
						<li><a href="<?php echo base_url().'admin/admin/PendingAccounts'?>">Pending Accounts</a></li>
						
					</ul>
				</div>
			</li>
			
			<li class="uk-parent" data-uk-dropdown="{mode:click}" aria-haspopup="true" aria-expanded="false">
				<a>Export <i class="uk-icon-caret-down"></i></a>
					<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
					<li><a href="<?php echo base_url().'admin/admin/exportPdf'?>">Export as PDF</a></li>
					<li><a href="<?php echo base_url().'admin/admin/exportExcel'?>">Export as EXCEL</a></li>
					</ul>
					</div>
				</li>
		
		</ul>
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav">
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