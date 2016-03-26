<?php $this->load->view('admin/admin_header');?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/lib/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/lib/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/jquery-ui.js"></script>
	
	
			
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-1 uk-margin">
						
								<div class="outer-box">
									<div class="inner-box uk-container-center" style="background-position:-311px 323px; border-radius: 10px;"></div>
								</div>
								<div class="heading-text-cont">
									<span style="color: rgb(52, 130, 183);">&nbsp;&nbsp;<b>Calendar</b></span> 	
								</div>
							
								<div class="uk-width-1">
							<?php echo $this->session->flashdata('message');?>
						</div>
						</div>
						<div class="uk-width-1" style="padding 10px;width:100%;">
							<div id="calendar" style="width:100%;position:relative;"></div> 
						</div>
							
					</div>
					<div class="uk-clearfix"></div>
				


<script type="text/javascript">
$(document).ready(function() {


    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
		selectable: true,
		selectHelper: true,
		header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay',
      	},
		events: [
			<?php foreach ( $result as $row) { ?>
					{
						title: '<?php echo $row['event_title']; ?>',
						start: '<?php echo $row['start_date']."T".$row['start_time']; ?>',
						end: '<?php echo $row['end_date']."T".$row['end_time']; ?>',
						id: '<?php echo $row['id'];?>',													
						allDay: false,
						},
					<?php } ?>
		] ,
		
		select: function(start ,end, jsEvent, view) {
				$('#create-start-date').attr('value',start);
				$('#create-end-date').attr('value',end);
				 var startDate = new Date(start);
				 var startday = startDate.getDate();
				 var endDate = new Date(end);
				 var endday = endDate.getDate();

				if(endday > startday || startday > endday){
					var date1 = new Date(end);
					date1.setDate(date1.getDate()-1);
					var start = new Date(start);
					
					var startday1 = $.datepicker.formatDate('mm/dd/yy',start);
					var startday1 = startday1 + " 12:00:00 AM";
					var endday1 = $.datepicker.formatDate('mm/dd/yy',date1);
					var endday1 = endday1 + " 11:59:59 PM";
					$("#create-start-date").val(startday1).change();
					$("#create-end-date").val(endday1).change();
				 } 
				 else{
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
				// END *
				var modal = UIkit.modal("#calendar-modal-create");
				if ( modal.isActive() ) {
					modal.hide();
				}else {
				modal.show();
				}
			},
			  
		    eventClick: function(event) {	
				window.location.href ="calendar?id="+event.id;
			}
	   
   });

});
</script>



<div id="calendar-modal-create" class="uk-modal">
    <div class="uk-modal-dialog" >
	
        <button type="button" class="uk-modal-close uk-close"></button>
	
        <div class="uk-modal-header">
			<h2 class="cal-title">Create new Event</h2>
        </div>
		
        	<?php
				$att = array( 'class' => 'uk-form uk-form-horizontal');
				echo form_open('admin/createEvent',$att);
			?>
				
        		<div class="uk-form-row">
					<label class="uk-form-label" for="">Event/Activity:</label>
					<div class="uk-form-controls">
						<input type="text" name="title" placeholder=". . ." size="100&"required />
					</div>
        		</div>
				<div class="uk-form-row">
					<label class ="uk-form-label" for="">Description</label>
					<div class ="uk-form-controls">
						<textarea name="description" placeholder=". . ." rows="3" cols="45" style="resize:none;" required></textarea>
					</div>
				</div>
				
				<div class="uk-form-row">
					<label class="uk-form-label" for="">Date Start: </label>
						<div class ="uk-form-controls">
						<input type="text" id="create-start-date" name ="startDate" readonly/>
						</div>
				</div>		
				<div class="uk-form-row">
					<label class="uk-form-label" for="">Date End: </label>
						<div class ="uk-form-controls">
						<input type="text" id="create-end-date" name ="endDate" readonly/>
						</div>
				</div>	
				
        	

        <div class="uk-modal-footer uk-text-right">
        	<button type="button" class="uk-button uk-button-danger uk-modal-close">Close</button>
            <button type="submit" class="uk-button uk-button-primary">Yes</button>
        </div>
        	<?php echo form_close();?>
    </div>
</div>
		