<?php $this->load->view('header');?>
<style type='text/css'>
#error{
	color: red;
}
</style>
<script type="text/javascript">

function areyousure()
{
	return confirm('<?php echo('Are you sure you want to save this folder ?');?>');
}
</script>
</head>
<?php $att = array ('class'=> 'uk-form uk-form-horizontal'); echo form_open_multipart('members/add_folder/folder/'.$fl_id,$att);?>
<body>
<?php $fl_name = ''; if(isset($query)){

foreach($query as $row){
	$fl_id = $row->fl_id;
	$fl_name = $row->fl_name;
}}?>


<div id =error><?=form_error('fl_name');?></div>
<input type="text" name="fl_name" value="<?=$fl_name;?>" required/>

<br/>
<br/>
<button class="uk-button uk-button-primary" type="submit" onclick="return areyousure()">SUBMIT</button>
</body>

</html>