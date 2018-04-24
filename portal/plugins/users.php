<?php
require_once('db.php');
function chk_id_avl($username)
{
	$eid = askdb(array("enrlid"),"users",array("id"=>strtoupper($username)));
	if ($eid==""){return 1;}
	else {return 0;}
}