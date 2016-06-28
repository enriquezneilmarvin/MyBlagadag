
<?php $this->load->view('header');?>
<?php if(isset($value)){
	foreach ($value as $row){
		$up_id = $row->up_id;
		$title = $row->title;
		$file_name = $row->file_name;
		$raw_name = $row->raw_name;	
	}
}
else{
	$title ='';
}
?>
<?php echo form_open_multipart('members/folder/upload/' . $fl_id . '/' . $up_id );?>
<body>

<div id=error><?php echo form_error('title');?></div>
<input type="text" name="title" value ="<?=$title?>"/>
<br/>
<br/>
<input type="file" name="userfile"/>
<br/>
<br/>
<button class="uk-button uk-button-primary">Submit</button>

<?php if($up_id !='' && $file_name != ''){?>
<div id='current_file' style="text-align: center; width: 350; height: 263;"><center><br/>

<img src="<?php echo base_url().'uploads/' . $file_name;?>" style=" width: 300; height: 230;"/>
</div>
<?php }?>




</body>






</html>