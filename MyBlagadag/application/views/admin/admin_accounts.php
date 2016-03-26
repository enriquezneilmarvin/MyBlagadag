<?php $this->load->view('admin/admin_header');?>
<!--
<div   style="float:right"><a href="" class="uk-button"><i class="uk-icon-pencil"> </i> EDIT</a>
	<a class="uk-button uk-button-danger" href=""><i class="uk-icon-trash uk-icon-white"> </i> DELETE</a>
	</div>-->

<?php if(isset($active)){?>
<h1>ACTIVE ACCOUNTS</h1>
<table class="uk-table uk-table-striped">

<tr> 

	<th> ID </th>
	<th> NAME </th>
	<th> Username </th>
	<th colspan= 4 align="right"></th>
	
	</tr>
<?php foreach($active as $row){ $id = $row->id;?>
<tr>
	<td><?=$row->id;?></td>
	<td><?=$row->fname. ' ' . $row->lname;?></td>
	<td><?=$row->username;?></td>
	<td><div  style="float:right"><a href="<?php echo base_url().'admin/admin/ActiveAccounts?act='.$id?>" class="uk-button uk-button-danger"><i class="uk-icon-ban uk-icon-white"></i> Ban</a></div></td>
	
	
	
	
</tr>
<?php }}?>
<?php if(isset($pending)){ ?>
<h1>PENDING ACCOUNTS</h1>
<table class="uk-table uk-table-striped">

<tr> 

	<th> ID </th>
	<th> NAME </th>
	<th> Username </th>
	<th colspan = 4></th>
	<th> </th>
	</tr>
<?php foreach($pending as $row){ $id = $row->id;?>
<tr>
	<td><?=$row->id;?></td>
	<td><?=$row->fname. ' ' .$row->lname;?></td>
	<td><?=$row->username;?></td>
	<td><div   style="float:right"><a href="<?php echo base_url().'admin/admin/PendingAccounts?pen='.$id;?>" class="uk-button"><i class="uk-icon-thumbs-up"></i> ACCEPT</a>
	<a class="uk-button uk-button-danger" href="<?php echo base_url().'admin/admin/PendingAccounts?dec='.$id;?>"><i class="uk-icon-thumbs-down"></i> DECLINE</a>
	</div></td>
</tr>

<?php }}?>

<?php if(isset($banned)){?>
<h1>BANNED ACCOUNTS</h1>
<table class="uk-table uk-table-striped">

<tr> 
	<center>
	<th> ID </th>
	<th> NAME </th>
	<th> Username </th>
	
	<th colspan = 4></th>
	</center>
	</tr>
<?php foreach($banned as $row){  $id = $row->id;?>
<tr>
	<td><?=$row->id;?></td>
	<td><?=$row->fname. ' ' . $row->lname;?></td>
	<td><?=$row->username;?></td>
	<td><div style="float:right"><a href="<?php echo base_url().'admin/admin/BannedAccounts?del='.$id;?>" class="uk-button uk-button-primary"><i class="uk-icon-circle-o"></i> Unbanned</a></div></td>
</tr>

<?php }} ?>

<div id ="delete" class="uk-modal">
	<?php if(isset($_GET['del'])){ $id = $_GET['del'];}?>
	  <div class="uk-modal-dialog" style="max-width:400px">
		<a href="<?php echo base_url().'admin/admin/BannedAccounts'?>" class="uk-close"></a>
		<div class="uk-modal-header">
		<h2>Confirmation</h2>
		</div>
		
		<div class="uk-form-row">
			<p>Do you want to unban this account?</p>
		</div>
		<div class="uk-modal-footer uk-text-right">
			<a href="<?php echo base_url().'admin/admin/BannedAccounts';?>" class="uk-button">Cancel</a>
			<a href="<?php echo base_url().'admin/admin/unbanned/'.$id;?>" class="uk-button uk-button-primary">Yes</a>
		</div>
	  </div>

</div>


<div id ="active" class="uk-modal">
	<?php if(isset($_GET['act'])){ $id = $_GET['act'];}?>
	  <div class="uk-modal-dialog" style="max-width:400px">
		<a href="<?php echo base_url().'admin/admin/ActiveAccounts'?>" class="uk-close"></a>
		<div class="uk-modal-header">
		<h2>Confirmation</h2>
		</div>
		
		<div class="uk-form-row">
			<p>Do you want to ban this account?</p>
		</div>
		<div class="uk-modal-footer uk-text-right">
			<a href="<?php echo base_url().'admin/admin/ActiveAccounts';?>" class="uk-button">Cancel</a>
			<a href="<?php echo base_url().'admin/admin/banned/'.$id;?>" class="uk-button uk-button-primary">Yes</a>
		</div>
	  </div>

</div>
<div id ="pending" class="uk-modal">
	<?php if(isset($_GET['pen'])){ $id = $_GET['pen'];}?>
	  <div class="uk-modal-dialog" style="max-width:400px">
		<a href="<?php echo base_url().'admin/admin/PendingAccounts'?>" class="uk-close"></a>
		<div class="uk-modal-header">
		<h2>Confirmation</h2>
		</div>
		
		<div class="uk-form-row">
			<p>Do you want to ban this account?</p>
		</div>
		<div class="uk-modal-footer uk-text-right">
			<a href="<?php echo base_url().'admin/admin/PendingAccounts';?>" class="uk-button">Cancel</a>
			<a href="<?php echo base_url().'admin/admin/Accept/'.$id;?>" class="uk-button uk-button-primary">Yes</a>
		</div>
	  </div>

</div>




<div id ="decline" class="uk-modal">
	<?php if(isset($_GET['dec'])){ $id = $_GET['dec'];}?>
	  <div class="uk-modal-dialog" style="max-width:400px">
		<a href="<?php echo base_url().'admin/admin/PendingAccounts'?>" class="uk-close"></a>
		<div class="uk-modal-header">
		<h2>Confirmation</h2>
		</div>
		
		<div class="uk-form-row">
			<p>Do you want to ban this account?</p>
		</div>
		<div class="uk-modal-footer uk-text-right">
			<a href="<?php echo base_url().'admin/admin/PendingAccounts';?>" class="uk-button">Cancel</a>
			<a href="<?php echo base_url().'admin/admin/decline/'.$id;?>" class="uk-button uk-button-primary">Yes</a>
		</div>
	  </div>

</div>


<script type="text/javascript">
$(document).ready(function(){
	<?php if(isset($_GET['del'])){?>

		var modal = UIkit.modal("#delete");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
		
	<?php }?>
	
	<?php if(isset($_GET['act'])){?>

		var modal = UIkit.modal("#active");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
		
	<?php }?>
	
	<?php if(isset($_GET['pen'])){?>

		var modal = UIkit.modal("#pending");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
		
	<?php }?>
	
	<?php if(isset($_GET['dec'])){?>

		var modal = UIkit.modal("#decline");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
		
	<?php }?>
});


</script>


