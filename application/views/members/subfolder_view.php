
<?php $this->load->view('header');?>
</head>
<?php $att = array('class'=>'uk-form uk-form-horizontal'); echo form_open_multipart('members/sub_folder/folder/' . $fl_id .'/' .$parent_id,$att);?>
<body>
<div id ='error'>
<?php echo form_error('fl_name');?>
</div>
<input type="text" name="fl_name"/>

<br/>
<br/>
<button class="uk-button uk-button-primary" type="submit">Submit</button>
</body>
<?php echo form_close();?>

</html>