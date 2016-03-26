<?php $this->load->view('admin/admin_header');?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url(); ?>assets/css/dropzone.css" />
	<!-- <script src="<?php echo base_url('assets/default-uikit/js');?>/jquery-1.11.2.min.js"></script>-->
	<script src="<?php echo base_url('assets/js'); ?>/dropzone.min.js"></script>

<head>


<script type="text/javascript">
	$(document).ready(function(){
			Dropzone.autoDiscover = false;
			var element = document.getElementById('upload-form');
			var dropzone = new Dropzone(element);
			// var dropzone = new Dropzone(element,{
				// url: $('#upload-form').attr('action'),
				//url: '<?php echo base_url('admin/admin_folder/upload');?>',
				// method: 'post',
				// acceptedFiles:'image/jpeg,image/jpeg',
				// paramName: 'file-upload',
				// addRemoveLinks: true,
				// maxFilesize : 2,
				// dictFileTooBig :'File too big',
				// dictResponseError :'Response error',
				// dictCancelUploadConfirmation: 'Do you want to cancel upload?',
				// dictCancelUpload: 'Upload Cancelled',
				// dictRemoveFile: 'Remove File',
				// dictInvalidFileType: 'Invalid file type',
			// });
	});
</script>

</head>

<div class="uk-width-1 uk-center">
	<?=$this->session->set_flashdata('message');?>
</div>
<body>

<center>	
<!--
<form action="" method="POST" id="upload-form" enctype="multipart/form-data" class="dropzone dz-clickable" style="width: 1000px" >
-->

<?php $att = array('id' =>'upload-form','class'=>'dropzone dz-clickable',);
	 echo form_open_multipart('admin/admin_folder/upload',$att);
?>
<input type="file" name="file-upload" class="dropzone dz-hidden-input"  style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;"  />

</div>
<!--
<input type="hidden" name ="userfile" value="file" name="submit" />
-->

<button type="submit" style="float:right;" class="uk-button">UPLOAD</button>

<?php echo form_close();?>
</body>



</html>