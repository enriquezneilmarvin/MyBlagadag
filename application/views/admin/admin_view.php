<!DOCTYPE HTML>
<?php $this->load->view('admin/admin_header');?>
<title><?=$title;?>
</title>

<head>
<style type="text/css">

#success{
	color:green;
	
}
</style>
<h3> Admin : <?php echo $this->session->userdata('fname');?></h3>
<head>

<div id = success>
<?php echo $this->session->userdata('msg');?>
</div>

<?php 
	$admin_id = $this->session->userdata('id');
//	$this->db->where('admin_id',$admin_id);
	$result = $this->admin_model->GetFolder($admin_id);

?>
<body>


<table class="uk-table uk-table-striped">


<tr> 
	
	<th> ID </th>
	<th> FOLDER NAME </th>
	<th colspan = 4></th>
	</tr>
<?php foreach($result as $results){ $fl_id = $results->fl_id;?>
<tr>
	<td><?php echo $results->fl_id;?> </td>
	<td><a href='<?php echo base_url('admin/admin_folder/view/' . $fl_id);?>'><i class="uk-icon-folder" > </i> <?php echo $results->fl_name;?> </a></td>
	<td><div   style="float:right"><a href="" class="uk-button"><i class="uk-icon-pencil"> </i> EDIT</a>
	<a class="uk-button uk-button-danger" href=""><i class="uk-icon-trash uk-icon-white"> </i> DELETE</a>
	</div></td>
	
</tr>
<?php }?>
	

</table>
</body>
<br/>



<a href="<?php echo base_url('admin/admin_folder/create_folder');?>"><input type="button" value="ADD FOLDER"></a>
<br/><br/>
<a href="<?php echo base_url('login/user_logout');?>"><input type="button" name="logout" value="LOGOUT"></a>
</html>
<?php $this->load->view('admin/admin_footer');?>