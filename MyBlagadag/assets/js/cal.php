 <?php 
	$this->load->view('./header');
	$school_id = $this->session->userdata('school_id');
	$logged_id = $this->session->userdata('userid');
?>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/fullcalendar.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/dropzone-custom.css" />
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/lib/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/fullcalendar.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/themes/<?php echo $themeSetup[0]['theme_folder'];?>/js/datePicker/jquery-ui.js"></script>
	
	
				<div class="right-container">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-1 uk-margin">
							<div class="heading">
								<div class="outer-box">
									<div class="inner-box uk-container-center" style="background-position:-311px 323px; border-radius: 10px;"></div>
								</div>
								<div class="heading-text-cont">
									<span style="color: rgb(52, 130, 183);">&nbsp;&nbsp;<b> Group Calendar</b></span> 	
								</div>
							</div>
							<div class="uk-width-1">
							<?php echo $this->session->flashdata('message');?>
						</div>
						</div>
						
						
						<div class="uk-width-1">
							<div id="calendar"></div> 
						</div>
							
					</div>
				</div><!-- right-container -->
				<div class="uk-clearfix"></div>
				
				
				



<?php $gp_calendar = $this->group_calendar_model->getgroupCalendar($group_id);?>
				
<div id="calendar-modal-create" class="uk-modal">
    <div class="uk-modal-dialog" >
	
        <button type="button" class="uk-modal-close uk-close"></button>
	
        <div class="uk-modal-header">
			<h2 class="cal-title">Create new Event</h2>
        </div>
		
        	<?php
				$att = array( 'class' => 'uk-form uk-form-horizontal');
				echo form_open('social/group/addEvent/'.$group_id,$att);
			?>
				
        		<div class="uk-form-row">
					<label class="uk-form-label" for="">Event/Activity:</label>
					<div class="uk-form-controls">
						<input type="text" name="title" placeholder=". . ." required />
					</div>
        		</div>
				<div class="uk-form-row">
					<label class ="uk-form-label" for="">Description</label>
					<div class ="uk-form-controls">
						<textarea name="description" placeholder=". . ." required></textarea>
					</div>
				</div>
				
				<div class="uk-form-row">
					<label class="uk-form-label" for="">Date Start: </label>
						<div class ="uk-form-controls">
						<input type="text" id="create-start-date" name ="start" readonly/>
						</div>
				</div>	
				
				<div class="uk-form-row">
					<label class="uk-form-label" for="">Date End: </label>
						<div class ="uk-form-controls">
						<input type="text" id="create-end-date" name ="end" readonly/>
						</div>
				</div>	
				
        	

        <div class="uk-modal-footer uk-text-right">
        	<button type="button" class="uk-button uk-button-danger uk-modal-close">Close</button>
            <button type="submit" class="uk-button uk-button-primary">Yes</button>
        </div>
        	<?php echo form_close();?>
    </div>
</div>



<div id="calendar-modal-edit" class="uk-modal">
    <div class="uk-modal-dialog">
	
    	<a href="<?php echo base_url('social/group/group_calendar/'.$group_id);?>" class="uk-close"></a>
		
		<!-- OJT.MIS-Neil -->
		<?php $event_id = $_GET['id'];?>
		 <?php $info_edit = $this->group_calendar_model->getCalendarData($event_id);?>
		 
			<?php $att = array('class' => 'uk-form uk-form-horizontal');
				echo form_open('social/group/editEvent/'.$group_id.'/'.$event_id,$att);
			?>
			
			<?php if(!empty($info_edit)):?>
			<!-- OJT.MIS-Neil -->
			
	        <div class="uk-modal-header">
	            <h2 class="cal-title">Current Event</h2>
	        </div>

		     <div class="uk-form-row">
		        <label class="uk-form-label" for="">Edit Event/Activity:</label>
		        <div class="uk-form-controls">
		        	<input id="edit-title" type="text" name="title" value="<?php echo $info_edit->event_title;?>" required />
		        </div>
		    </div>
		    <div class="uk-form-row">
		        <label class="uk-form-label" for="">Edit Description:</label>
		        <div class="uk-form-controls">
		        	<textarea id="edit-description" name="description"  required ><?php echo $info_edit->event_description;?></textarea>
		        </div>
		    </div>	
			
		   <div class="uk-form-row">
		        <label class="uk-form-label" for="">Date Start:</label>
		        <div class="uk-form-controls">
					<?php if($info_edit->start_time != '00:00:00'){
							if($info_edit->start_time > '12:00:01'){
									$val = $info_edit->start_time. ' PM';
							}else{
									$val = $info_edit->start_time. ' AM';
							}
						}
						else{
							$val = '12:00:00 AM';
							
						}
					 $sDate =  $info_edit->start_date." ".$val;
					 ?>
				
					 <input type="text"  id="edit-start" name="startDate" value="<?php echo $sDate;?>" readonly /> <!-- Date Format -->
		        </div>
		    </div>
			
		    <div class="uk-form-row">
		        <label class="uk-form-label" for="">Date End:</label>
		        <div class="uk-form-controls">
					<?php if($info_edit->end_time != '23:59:59'){
							if($info_edit->end_time > '12:00:01'){
									$val = $info_edit->end_time. ' PM';
							}else{
									$val = $info_edit->end_time. ' AM';
							}
						}
						else{
							$val = '11:59:59 PM';
							
						}
					 $eDate =  $info_edit->end_date." ".$val;?>
					<input type="text"  id="edit-end"  name="endDate" value="<?php echo $eDate;?>" readonly />  <!-- Date Format -->
		        </div>
		    </div>
			
				
	        <div class="uk-modal-footer uk-text-right">
	          <a href ='<?php echo base_url('social/group/group_calendar/'.$group_id.'?d_id='.$event_id.'&del=true');?>'><button type="button" class="uk-button uk-button-danger">Delete</button></a>
	          <button type="submit" class="uk-button uk-button-primary">Update</button>
	        
	        </div>
			<?php endif;?>
			<?php echo form_close();?>
    </div>
</div>

<div id="delete-event" class="uk-modal">
    <div class="uk-modal-dialog" style="max-width:400px">
	
        <a href="<?php echo base_url('social/group/group_calendar/'.$group_id.'?id='.$_GET['d_id']);?>" class="uk-close"></a>
        <div class="uk-modal-header">
            <h2>Confirmation</h2>
        </div>
        	<?php
				$event_id = $_GET['d_id'];
				$att = array( 'class' => 'uk-form uk-form-horizontal');
				echo form_open('social/group/deleteEvent/'.$group_id.'/'.$event_id,$att);
			?>
        		<div class="uk-form-row">
        			<p>Do you want to delete this event?</p>
        		</div>
				<div class="uk-modal-footer uk-text-right">
					<a href="<?php echo base_url('social/group/group_calendar/'.$group_id.'?id='.$event_id);?>" class="uk-button">Cancel</a>
					<button type="submit" class="uk-button uk-button-primary">Yes</button>
				</div>
        	<?php echo form_close();?>
    </div>
</div>











<script type="text/javascript">
$(document).ready(function(){

	// edit event and see event 
	<?php if(isset($_GET['id'])) {?>

			var modal = UIkit.modal("#calendar-modal-edit");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
			
		<?php }?>
		
		// delete event 
		<?php if(isset($_GET['d_id'])) {?>

			var modal = UIkit.modal("#delete-event");
			if ( modal.isActive() ) {
				modal.hide();
			} else {
				modal.show();
			}
			
		<?php }?>
		
		
		
		// page is now ready, initialize the calendar...
		$('#calendar').fullCalendar({
			selectable: true,
			selectHelper: true,
			events: [
				<?php foreach($groupCalendar as $result){?>
				{
						title: '<?php echo $result->event_title; ?>',
						start: '<?php echo $result->start_date."T".$result->start_time; ?>',
						end: '<?php echo $result->end_date."T".$result->end_time; ?>',
						id: '<?php echo $result->event_id;?>',
						user_id: '<?php echo $result->user_id;?>',
						allDay: false,
				},
				<?php }?>
				] ,
				
				select: function(start ,end, jsEvent, view) {
				$('#create-start-date').attr('value',start);
				$('#create-end-date').attr('value',end);
				

							 /* JS SCRIPT ADDED BY OJT.MIS-NEIL 
								July 2015
							 */
								 var startDate = new Date(start);
								 var startday = startDate.getDate();
								 var endDate = new Date(end);
								 var endday = endDate.getDate();

							if(endday > startday || startday > endday){
								var date1 = new Date(end);
								
								date1.setDate(date1.getDate()-1);
								
								var start = new Date(start);
								
								var startday1 = $.datepicker.formatDate('mm/dd/yy',start);
								
								startday1 = startday1 + " 12:00:00 AM";
								
								var endday1 = $.datepicker.formatDate('mm/dd/yy',date1);
								
								var endday1 = endday1 + " 11:59:59 PM";
								
								$("#create-start-date").val(startday1).change();
								
								$("#create-end-date").val(endday1).change();
								
								
							 } else{
								// FOR THE TIME RANGE ONLY (MOMENT.JS)
								var allDay = !start.hasTime() && !end.hasTime();
								var enable_time = moment(start).format('hh:mm:ss A');
								
								var disable_time = moment(end).format('hh:mm:ss A');
								
								var start = new Date(start);
								
								var startday1 = $.datepicker.formatDate('mm/dd/yy',start);
								
								var endday1 = $.datepicker.formatDate('mm/dd/yy',start)
								
								var startday1 = startday1  + " " +enable_time;
								
								var endday1 = endday1  + " " +disable_time;
								
								$("#create-start-date").val(startday1).change();
								
								$("#create-end-date").val(endday1).change();
							}
				
							var modal = UIkit.modal("#calendar-modal-create");
								if ( modal.isActive() ) {
									modal.hide();
								}else {
								modal.show();
								}
				},
					
			
						
						
						
						eventClick: function(event) {	
						var logged_in = <?php echo $logged_id;?>;
						 // $('#edit-title').attr('value',event.title);
						 // $('#edit-start').attr('value',event.start.format());
						 // $('#edit-end').attr('value',event.end.format());
						 // $('#edit-description').html(event.description);
						// alert(logged_in);
						// alert(event.user_id);
						if (event.user_id == logged_in){
							window.location.href = <?php echo $group_id ;?>+"?id="+event.id;
							}
						}
					
					
					
		});
		
		
	});


</script>
				
