<?php
function parse_csv($data){
$array = explode(",",$data);
return $array;
}
function generate_csv($array){
	$data="";
	$length=count($array);
	foreach($array as $element){
		if ($length>1){
		$data=$data.$element.",";
		}
		else {$data=$data.$element;}
		$length--;
	}
	return $data;
}
?>