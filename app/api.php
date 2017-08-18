<?php
require_once(dirname(dirname(__FILE__)).'/portal/config.php');
$response=array("err" => 404);
if(isset($_POST['reqid']))
{
    $req=$_POST['reqid'];
    if ($req=='1')//login
    {
    require_once(ABS_PATH.'/plugins/db.php');
    if (isset($_POST['id'])){$id=$_POST['id'];} else $id="";
    if (isset($_POST['pwd'])){$pwd=$_POST['pwd'];} else $pwd="";
	$password = askdb("pwd","users",array("id"=>$id));
	if ($pwd==$password&&$password!=""){
		$tid=time();
		$token=hash('sha256',$tid.$pwd);
		$eid = askdb("enrlid","users",array("id"=>$id));
		$tokentodb=array($tid, $token, $eid);
		telldb("sessions",array("tid","token","eid"),$tokentodb);
		$response=array("tid" => $tid,"token" => $token,"err" => 200);
        }
        else{
        $response=array("tid" => "","token" => "","err" => 403);
        }
    }
     if ($req=='2')//logout
    {
    require_once(ABS_PATH.'/plugins/session.php');
    des_tok();
	{$response=array("err" => 200);}	
    }
     if ($req=='3')//register
    {
    require_once(ABS_PATH.'/plugins/db.php');
    require_once(ABS_PATH.'/plugins/otp.php');
    if (chk_otp($_POST['ph'],$_POST['otp'],$_POST['type'])){
   rem_otp($_POST['ph'],$_POST['type']);
    $register=array($_POST['enrlid'],strtoupper($_POST['id']),$_POST['pwd'],$_POST['fn'],$_POST['ln'],$_POST['dob'],$_POST['ph'],$_POST['email'],$_POST['q'],$_POST['a']);
telldb("users",array('enrlid','id','pwd','fn','ln','dob','ph','email','q','a'),$register);
	$response=array("err" => 200);
}
else{$response=array("err" => 206);}
    }
    if ($req=='4')//send otp
    {
    require_once(ABS_PATH.'/plugins/otp.php');
    gen_otp($_POST['ph'],'1');
    if (send_otp($_POST['ph'],'1')){$response=array("err" => 200);}
    else {$response=array("err" => 403);}
    }
	if ($req=='5')//get schedule
    {
    	require_once(ABS_PATH.'/plugins/db.php');
		require_once(ABS_PATH.'/plugins/session.php');
		require_once(ABS_PATH.'/plugins/courses_api.php');
		$tid=$_POST["tid"];
		if (chk_tok_post())
		{
		$schedule;
		$type;
		$venue;
		$eid = askdb( "eid", "sessions", array("tid"=>$tid));
		$batch = askdb( "batch", "users", array("enrlid"=>$eid));
		dbconn();
		$sql="SELECT course,slot,type,venue FROM ".$_POST['type']." WHERE batch='".$batch."'";
		$row = $conn->query($sql);
		while($data=$row->fetch_assoc())
		{
			if(has_course($data['course'])){
				$schedule[$data['slot']]=$data['course'];
				$type[$data['slot']]=$data['type'];
				$venue[$data['slot']]=$data['venue'];
											}
		}
		 $response=array("err"=>200,"schedule"=>$schedule,"type"=>$type,"venue"=>$venue);
		dbdisconn();
		}
		else $response=array("err" => 403);
								
    }
	if ($req=='6')//set schedule
    {
    	require_once(ABS_PATH.'/plugins/db.php');
		require_once(ABS_PATH.'/plugins/session.php');
		require_once(ABS_PATH.'/plugins/courses_api.php');
		$tid=$_POST["tid"];
		if (chk_tok_post())
		{
			$error=0;
		$slot=$_POST['slot'];
		$course=$_POST['course'];
		$venue=$_POST['venue'];
		$type=$_POST['type'];
		$table=$_POST['schedule'];
			if(!has_course($course)){$error=1;}
			if($type==0||$type==1||$type==2||$type==3){}else {$error=1;}
			$eid = askdb( "eid", "sessions", array("tid"=>$tid));
			$batch = askdb( "batch", "users", array("enrlid"=>$eid));	changedb($table,array("course"=>$course,"venue"=>$venue,"type"=>$type,"updated"=>$eid,"time"=>time()),array("slot"=>$slot,"batch"=>$batch));
		 $response=array("err"=>200);
		}
		else $response=array("err" => 403);
								
    }
	if ($req=='7')//sync
    {
    	require_once(ABS_PATH.'/plugins/session.php');
    	if (chk_tok_post())
		{
			if(isset($_POST['tstamp'])){$response=array("err" => 200,"update_required"=>1);}
		}
		else $response=array("err" => 403);
								
    }
	if ($req=='8')//username availability
    {
    	require_once(ABS_PATH.'/plugins/users.php');
    	if (chk_id_avl($_POST['id']))
		{$response=array("err" => 200);}
		else $response=array("err" => 403);
								
    }
	if ($req=='9')//courses enrolled
    {
    	require_once(ABS_PATH.'/plugins/courses_api.php');
		require_once(ABS_PATH.'/plugins/session.php');
    	if (chk_tok_post())
		{$response=array("err" => 200,"courses"=>get_courses());}
		else $response=array("err" => 403);					
    }
	if ($req=='10')//upload content
    {
    	require_once(ABS_PATH.'/plugins/courses_api.php');
		require_once(ABS_PATH.'/plugins/session.php');
		require_once(ABS_PATH.'/plugins/db.php');
		if (chk_tok_post()){
		$crs=$_POST['course'];
		$msg=0;
		if(isset($_FILES['file'])){
		$id=time();
		$error=0;
		$target=CONTENT.$id;
		//if ($_FILES["file"]["size"] > 20000000){$msg=2;$error=1;}
		if (file_exists($target)){$msg=3;$error=1;}
		if($error==0){
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)){
			$comment=$_POST['comment'];
			$filename=basename($_FILES["file"]["name"]);
			$eid=askdb('eid','sessions',array('tid'=>$_POST['tid']));
			$size=$_FILES["file"]["size"];
			telldb('contents',array('id','eid','file_name','size','course','comment'),array($id,$eid,$filename,$size,$crs,$comment));
			$msg=1;
		}
		else{$msg=4;}
	}
}
			if($msg==0){$response=array("err" => 0);}
				 if($msg==1){$response=array("err" => 200);}
				 if($msg==2){$response=array("err" => 2);}
				 if($msg==3){$response=array("err" => 3);}
				 if($msg==4){$response=array("err" => 4);}
		}
		else {$response=array("err" => 403);}
	}
	if ($req=='11')//get content
    {
    	require_once(ABS_PATH.'/plugins/courses_api.php');
		require_once(ABS_PATH.'/plugins/session.php');
    	if (chk_tok_post())
				{
					$course=$_POST['course'];
					if (has_course($course))
					{
						$data=get_card_meta($course);
						$response=array("err" => 200,'files'=>$data);
					}
					else $response=array("err" => 403);
				}
		else $response=array("err" => 403);
    }
	if ($req=='12')//profile
    {
    	require_once(ABS_PATH.'/plugins/db.php');
		require_once(ABS_PATH.'/plugins/session.php');
    	if (chk_tok_post())
				{
					$tid = $_POST[ "tid" ];
					$eid;
					if (isset($_POST['enrlid'])){$eid=$_POST['enrlid'];}
					else {$eid = askdb( "eid", "sessions", array("tid"=> $tid));}
					$id = askdb( "id", "users", array("enrlid"=> $eid) );
					$fn = askdb( "fn", "users", array("enrlid"=> $eid) );
					$ln = askdb( "ln", "users", array("enrlid"=> $eid));
					$dob = askdb( "dob", "users", array("enrlid"=> $eid));
					$ph = askdb( "ph", "users", array("enrlid"=> $eid));
					$email = askdb( "email", "users", array("enrlid"=> $eid));
					$q = askdb( "q", "users", array("enrlid"=> askdb( "eid", "sessions", array("tid"=> $tid))));
					$response=array("err" => 200,"profile"=>array("id"=>$id,"fn"=>$fn,"ln"=>$ln,"dob"=>$dob,"ph"=>$id,"email"=>$email,"q"=>$q));
				}
		else $response=array("err" => 403);
    }
	if ($req=='13')//download content
    {
    	require_once(ABS_PATH.'/plugins/db.php');
		require_once(ABS_PATH.'/plugins/session.php');
		require_once(ABS_PATH.'/plugins/courses_api.php');
    	if (chk_tok_post())
				{
		if(has_course(askdb('course','contents',array('id'=>$_POST['id']))))
		{
		$file = CONTENT.$_POST['id'];

		if (file_exists($file)) {
			$response="";
    		header('Content-Description: File Transfer');
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; 		filename="'.askdb('file_name','contents',array('id'=>$_POST['id'])).'"');
    		header('Expires: 0');
    		header('Cache-Control: must-revalidate');
    		header('Pragma: public');
    		header('Content-Length: ' . filesize($file));
    		readfile($file);
    		exit;
										}
				else $response=array("err" => 206);
			}
				else $response=array("err" => 403);
						}
				else $response=array("err" => 403);
    }
}
$JSON = json_encode($response);
echo $JSON;
?>