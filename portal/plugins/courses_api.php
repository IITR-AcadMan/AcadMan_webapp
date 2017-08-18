<?php
function humanFileSize($size)
{
    if ($size >= 1073741824) {
      $fileSize = round($size / 1024 / 1024 / 1024,1) . ' GB';
    } elseif ($size >= 1048576) {
        $fileSize = round($size / 1024 / 1024,1) . ' MB';
    } elseif($size >= 1024) {
        $fileSize = round($size / 1024,1) . ' KB';
    } else {
        $fileSize = $size . ' bytes';
    }
    return $fileSize;
}
function get_courses(){
	require_once(dirname(__FILE__).'/db.php');
	require_once(dirname(__FILE__).'/csv.php');
	if (isset($_COOKIE["tid"])){$tid=$_COOKIE["tid"];}else $tid=$_POST["tid"];
	$eid = askdb(array("eid"),"sessions",array("tid"=>$tid));
	$crs = parse_csv(askdb(array("crsid"),"enrolledfor",array("enrlid"=>$eid)));
	return $crs;
}
function has_course($course){
	require_once(dirname(__FILE__).'/db.php');
	require_once(dirname(__FILE__).'/csv.php');
	$tid="";
	if (isset($_COOKIE['tid'])) $tid=$_COOKIE["tid"]; else $tid=$_POST['tid'];
	$eid = askdb(array("eid"),"sessions",array("tid"=>$tid));
	$crs = parse_csv(askdb(array("crsid"),"enrolledfor",array("enrlid"=>$eid)));
	$bool = 0;
	foreach($crs as $verify){
		if ($course==$verify){$bool=1;}
	}
	return $bool;
}

function get_card_meta($course){
		require_once(dirname(__FILE__).'/db.php');
		dbconn();
		global $conn;
		$sql="SELECT contents.id as id,contents.eid as eid,contents.file_name as file_name,contents.size as size,contents.comment as comment,users.fn as fn FROM contents LEFT JOIN users ON contents.eid = users.enrlid WHERE course='".$course."' ORDER BY contents.id DESC";
		$row = $conn->query($sql);
			dbdisconn();
		$response=array();
		while($data=$row->fetch_assoc())
		{
			if(has_course($course)){	array_push($response,array('id'=>$data['id'],'eid'=>$data['eid'],'filename'=>$data['file_name'],'comment'=>$data['comment'],'size'=>$data['size'],'fn'=>$data['fn']));
									}
		}
		return $response;
		}
function get_file_card($id,$fn,$eid,$filename,$contentsize,$time,$comment){
	require_once(dirname(__FILE__).'/db.php');
	$enrlid=askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid']));
				$tz = 'Asia/Kolkata';
				$timestamp = $time;
				$dt = new DateTime("now", new DateTimeZone($tz));
				$dt->setTimestamp($timestamp);
				echo '<div class="well">';
				if($eid==$enrlid){
					echo '<div hidden class="dismiss" onclick="alert(\''.$id.'\');">
				<button type="button" class="close">&times;</button>
  				</div>';
				}
				echo '<div class="media">
 				<div class="media-left">
				<i class="glyphicon glyphicon-file"></i>
  				</div>
  				<div class="media-body">
   				<h4 class="media-heading"><a target="_blank" href="download.php?file='.$id.'">'.$filename.' ('.humanFileSize($contentsize).')</a><br/><small><i>Uploaded on '.$dt->format('l, jS F, Y \a\t h:i:s A').'</i></small></h4>
   				<p>'.$comment.'</p>
  				</div>
				<p align="right">-by <a target="_blank" href="profile.php?id='.$eid.'">'.$fn.'</a></p>
				</div>
			</div>';
}
?>