<?php $this->load->view('header');?>

<script type="text/javascript">
$(document).ready(function(){
	f_sort();
});

var fixHelper = function(e, ui) {
	ui.children().each(function() {
		$(this).width($(this).width());
	});
	return ui;
};



function f_sort(){
	$('#files_sort').sortable({
    scroll: false,
    helper: fixHelper,
	axis: 'y',
	handle: '#handle',
	// handle: '.handle',
	}).disableSelection();
	$('#files_sort').sortable();
}

/* 
$('#files_sort').sortable({
    helper: fixWidthHelper
}).disableSelection();

var fixWidthHelper = function(e, ui) {
	ui.children().each(function() {
		$(this).width($(this).width());
	});
	return ui;
};
function f_sort(){
	// $("#files_sort").sortable({
		// scroll:true,
		// axis: 'y',
		// handle:'.handle',
		// helper: fixWidthHelper,
	// });
	$("#files_sort").sortable();
}
 */


function areyousure(id)
{
	if(confirm('<?php echo('Are you sure you want to delete this folder ?');?>')  == true){
		$.ajax({
			cache: false,
			url: '<?php echo base_url().'members/add_folder/delete/'?>'+id,
			sucess: function(resp){
				// alert(resp);
				$("#trow"+id).fadeOut(1000);
			}
			
		});
	}
}
</script>
			
		<a href="<?php echo base_url().'members/add_folder/folder/'?>" class="uk-float-right"><button class="uk-button uk-button-primary"><i class="uk-icon uk-icon-plus"> ADD FOLDER</i></button></a>
			<table class="uk-table uk-table-striped">
			<thead>
			<tr>
				<th>Sort</th>
				<th>ID</th>
				<th colspan="4">Folder</th>

			</tr>
			</thead>
			
			<tbody id="files_sort" >
			<?php $i = 1;foreach($folders as $row){ 
				$fl_id = $row->fl_id;
			?>
			<tr id ="trow<?=$fl_id?>">
				
					<td id="handle"><a class="uk-button" style="cursor:move"><span class="uk-icon uk-icon-bars"></span></a></td>
					<td><?=$i;?></td>
					<td><a href="<?php echo base_url('members/folder/view/' . $fl_id);?>"><i class="uk-icon-folder"></i> <?=$row->fl_name;?></a></td>
					<td><div style="float:right">
					<a href="<?php echo base_url('members/add_folder/folder/' . $id . "/" . $fl_id)?>" class="uk-button"><i class="uk-icon-pencil"> </i> EDIT</a>
					<a class="uk-button uk-button-danger"  onclick ="return areyousure('<?=$fl_id;?>')"><i class="uk-icon-trash uk-icon-white"> </i> DELETE</a>
					</div></td>
				
			</tr>
			</tbody>
			
			<?php $i++; }?>
			
		

			</table>
			
			
			
	
	
						<!--<ul class="uk-nestable" data-uk-nestable="{handleClass:'uk-nestable-handle'}">
                            <li class="uk-nestable-item">
                                <div class="uk-nestable-panel">
                                    <i class="uk-nestable-handle uk-icon uk-icon-bars uk-margin-small-right"></i>
                                    Item 1
                                </div>
                            </li>
                            <li class="uk-nestable-item">
                                <div class="uk-nestable-panel">
                                    <i class="uk-nestable-handle uk-icon uk-icon-bars uk-margin-small-right"></i>
                                    Item 2
                                </div>
                            </li>
                            <li class="uk-nestable-item">
                                <div class="uk-nestable-panel">
                                    <i class="uk-nestable-handle uk-icon uk-icon-bars uk-margin-small-right"></i>
                                    Item 3
                                </div>
                            </li>
                            <li class="uk-nestable-item">
                                <div class="uk-nestable-panel">
                                    <i class="uk-nestable-handle uk-icon uk-icon-bars uk-margin-small-right"></i>
                                    Item 4
                                </div>
                            </li>
                        </ul>-->
				
					<!--
						<div class="uk-grid uk-margin-top-medium">
						<?php foreach($folders as $row){?>
							<div class="uk-sortable" data-uk-sortable="{handleClass:'uk-sortable-handle'}">
								<div class="uk-width-medium-1-10 uk-container-box">
									<div class="uk-panel uk-panel-box">
									<i class="uk-sortable-handle uk-icon uk-icon-folder uk-margin-small-right">
										<?php echo $row->fl_name;?></i>
									</div>
								</div>
							</div>
						<?php }?>
						
					
					</div>
					-->
					<!--
					<a href="#register-class" class="uk-float-right" data-uk-modal="{center:true;mode='click';}"><button class="uk-button uk-button-primary"><i class="uk-icon uk-icon-plus"> ADD CLASS</i></button></a>
				
					
							<div class="uk-sortable" data-uk-sortable="{handleClass:'uk-sortable-handle'}">
								<?php foreach($folders as $row){?>
									<div class="uk-grid uk-margin-top-medium">
									
											<div class="uk-width-medium-1-10 uk-container-box">
											
												<div class="uk-panel uk-panel-box">
												
												<i class="uk-sortable-handle uk-icon uk-icon-folder uk-margin-small-right"></i>
												
													<?php echo $row->fl_name;?>
												</div>
												
											</div>
									</div>
								<?php }?>
							</div>
							-->
					
