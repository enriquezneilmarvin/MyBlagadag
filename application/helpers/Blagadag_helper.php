<?php
function dateString($myDate,$format){
	if($format==1){ //date string
		return date_format(date_create($myDate),'M j, Y');
	}
	else if($format==2){//date string with time
		return date_format(date_create($myDate),'M j, Y g:i a');
	}
	else{//date string with time with day
		return date_format(date_create($myDate),'D, M j, Y g:i a');
	}	
}

function alertMessage($text,$format){
	if($format == "danger"){
		return "<div class='uk-alert uk-alert-".$format."' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>".$text."</p></div>";
	}
	else if($format == "success"){
		return "<div class='uk-alert uk-alert-".$format."' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>".$text."</p></div>";
	}
	else if($format == "warning"){
		return "<div class='uk-alert uk-alert-".$format."' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>".$text."</p></div>";
	}
	else if($format == "info"){
		return "<div class='uk-alert uk-alert-".$format."' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>".$text."</p></div>";
	}
	else{
		return "<div class='uk-alert uk-alert-".$format."' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>".$text."</p></div>";
	}
}



function debug($array,$die=0){
	echo "<pre>";
	print_r($array);
	if($die==1){
		die();
	}

}
?>