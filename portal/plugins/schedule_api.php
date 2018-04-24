<?php
function get_schedule($sch){
	require_once(dirname(__FILE__).'/courses_api.php');
	require_once(dirname(__FILE__).'/db.php');
    require_once(dirname(__FILE__).'/session.php');
		$tid=$_COOKIE["tid"];
		$course=array();
		$type=array();
		$eid = askdb( array("eid"), "sessions", array("tid"=>$tid));
		$batch = askdb( array("batch"), "users", array("enrlid"=>$eid));
	dbconn();
		global $conn;
		$sql="SELECT course,slot,type FROM ".$sch." WHERE batch='".$batch."'";
		$row = $conn->query($sql);
		dbdisconn();
		while($data=$row->fetch_assoc())
		{
			if(has_course($data['course'])){
				$course[$data['slot']]=$data['course'];
				if ($data['type']==1) $type[$data['slot']]='T';
				if ($data['type']==2) $type[$data['slot']]='L';
				if ($data['type']==3) $type[$data['slot']]='P';
				if ($data['type']==0) $type[$data['slot']]='';
				if ($data['type']==4) $type[$data['slot']]='C';
											}
		}
		$response=array("course"=>$course,"type"=>$type);
		return $response;
}