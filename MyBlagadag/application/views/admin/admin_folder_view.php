<?php $this->load->view('admin/admin_header');?>
<html>
<title>
</title>
<head>
<style ="text/css">
#error{
	color: red;
}


</style>
<head>

<?php echo form_open('admin/admin_folder/create_folder');?>
<div id=error>

<?php echo form_error('fl_name');?>
</div>
<body>

<input text ="text" name = "fl_name"> 

<br/>
<br/>
<input type="submit" name ="submit" value="Submit">

</body>
</html>
