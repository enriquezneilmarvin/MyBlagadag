	


<?php $this->load->view('header');?>
<style type = "text/css">
#success{
	color: green

}
#delete{
color: #FF0000;

}


</style>

<script type="text/javascript">

function areyousure()
{
	return confirm('<?php echo('Are you sure you want to delete this image ?');?>');
}
function areyousure1()
{
	return confirm('<?php echo('Are you sure you want to delete this sub folder and all its content?');?>');
}
</script>
</head>
<h2> FOLDER NAME: <?=$folder;?><h2>

			
<body>

<h5> YOUR CURRENT FILES</h5>

<a href="<?php echo base_url('members/folder/upload/'. $fl_id );?>" class="uk-button uk-button-primary" style="float:right;">ADD FILES</a>
<table class="uk-table uk-table-striped">
<tr>

	<th><b>ID</b></th>
	<th><b>IMAGE</b></th>
	<th></th>

</tr>
<?php foreach($files as $file){ $up_id = $file->up_id;?>	
<tr>
	<td><?=$file->up_id;?></td>
	<td><a href="<?php echo base_url().'/uploads/'.$file->file_name?>" data-uk-lightbox title="<?php echo $file->file_name;?>"><image src="<?php echo base_url('/uploads/' . $file->file_name);?>" width="80px" height="130"/></a></td>
	
	<td><div  style="float:right"><a href ="<?php echo base_url('members/folder/upload/' . $fl_id . '/' . $up_id);?>" class="uk-button"><i class="uk-icon-pencil" ></i> EDIT</a>
	<a href ="<?php echo base_url('members/folder/deletefile/'. $fl_id .'/'. $up_id);?>" class="uk-button uk-button-danger" onclick="return areyousure()"><i class="uk-icon-trash"></i> DELETE</a></div></td>
</tr>
<?php }?>
</table>
<br/>

</br/>
<!--
<h5>YOUR CURRENT SUB FOLDERS</h5>

<table border = 5>
<tr>
	<th><b>ID</b></th>
	<th><b>SUB FOLDERS</b></th>
	<th colspan = 4><b>ACTION</b></th>
</tr>

<?php foreach($subfol as $sfolder){   
	$sub_id = $sfolder->fl_id;
	
	$parent_id = $sfolder->parent_id;
	
	
?>
<tr>
	<td><?=$sfolder->fl_id;?></td>
	<td align ='center'><a href='<?php echo base_url('members/folder/view/' . $sub_id .'/'. $parent_id);?>'><img src="<?php echo base_url('/uploads/Images/folderlogo.jpeg');?>" style=" width: 150; height: 150;"/><br/><?=$sfolder->fl_name;?></a></td>
	<td align ='center'><a href ='<?php echo base_url('members/sub_folder/folder/' . $sub_id . '/' . $parent_id);?>'><img src="<?php echo base_url('/uploads/Images/files.png');?>" style=" width: 60; height: 40;padding: 25px; "/><br/>EDIT</a></td>
	<td align ='center'><a href ='' onclick="return areyousure1()" id='delete'><img src="<?php echo base_url('/uploads/Images/trash.png');?>" style=" width: 60; height: 40;padding: 25; "/><br/>DELETE</a></td>
	
</tr>
<?php }?>
</table>
<br/>
<a href="<?php echo base_url('members/sub_folder/folder/' . $fl_id . '/');?>"><input type="button" name="button" VALUE="ADD FOLDER"/></a>

<br/>
<br/>
<a href="<?php echo base_url('members/home/userchecked/');?>"><input type="button" name="button" VALUE="BACK TO HOME"/></a>

</body>


-->
<a href="<?php echo base_url('members/sub_folder/folder/' . $fl_id);?>" class="uk-button uk-button-primary" style="float:right;">ADD SUB-FOLDERS</a>

<ul class="uk-sortable uk-grid uk-grid-small uk-grid-width-1-5" data-uk-sortable="">
	<?php foreach($subfol as $sfolder){?>
	<li class="uk-grid-margin">
		<div class="uk-panel uk-panel-box">	
			<div class="uk-position-top-right">
				<div class="uk-button-dropdown group-menu" data-uk-dropdown aria-haspopup="true" aria-expanded="false">
				<a href="#" class="group-menu uk-button" style="border:0;">
				<span class="uk-icon-cog uk-icon-small"></span>
				</a>
				<div class="uk-dropdown uk-dropdown-small uk-dropdown-center" style="margin-bottom: -45px;margin-right: 50px;">
					<ul class="uk-nav uk-nav-dropdown friend-hover">
						<li><a href=""><span class="uk-icon uk-icon-pencil-square" ></span> EDIT</a></li>
						<li><a href=""><span class="uk-icon uk-icon-trash" ></span> DELETE</a></li>
					</ul> 
				</div>
				</div>
			</div><a href="<?php echo base_url('members/folder/view/' . $sub_id .'/'. $parent_id);?>"><?php echo $sfolder->fl_name;?></a>
		</div>
	</li>
	<?php }?>
</ul>

</html>
