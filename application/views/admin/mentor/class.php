<?php $this->load->view('admin/admin_header');?>



<a href="#register-class" class="uk-float-right" data-uk-modal="{center:true;mode='click';}"><button class="uk-button uk-button-primary"><i class="uk-icon uk-icon-plus" > ADD CLASS</i></button></a>









<div id="register-class" class="uk-modal" style="display">
    <div class="uk-modal-dialog" style="max-width:400px">
		
        <a href="<?php echo base_url().'admin/mentor/admin_class'?>" class="uk-close"></a>
        <div class="uk-modal-header">
            <h2>ADD CLASS</h2>
        </div>
        <?php $att = array('class'=>'uk-form uk-form-horizontal');
			echo form_open('',$att);
		
		?>
        		
				
		<div class="uk-form-row">
        			<label class="uk-form-label" for="">Class Name:</label>
					<div class="uk-form-controls">
						<input type="text" name="cname" placeholder="First Name" required />
					</div>
        </div>	
		
		
		
		<div class="uk-form-row">
        			<label class="uk-form-label" for="">Class Room:</label>
					<div class="uk-form-controls">
						 <select name="room">
							<option value="ROOM 101">ROOM 101</option>
							<option value="ROOM 202">ROOM 202</option>
						</select>
					</div>
        </div>	
		
		<div class="uk-form-row">
        			<label class="uk-form-label" for="">Start Time:</label>
					<div class="uk-form-controls">
						<input type="time" name="sTime"  required />
					</div>
        </div>
		
		<div class="uk-form-row">
        			<label class="uk-form-label" for="">End Time:</label>
					<div class="uk-form-controls">
						<input type="time" name="eTime" required />
					</div>
        </div>
		
		<div class="uk-modal-footer uk-text-right">
			<a href="<?php echo base_url().'admin/mentor/admin_class'?>"><button class="uk-button uk-button-danger">Cancel</button></a>
			<button type="submit" class="uk-button uk-button-primary">Save</button>
		</div>
		<?php echo form_close();?>
        	
    </div>
</div>