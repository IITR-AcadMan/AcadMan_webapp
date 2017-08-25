<?php
$req="0";
if (isset($_POST['req'])){$req=$_POST['req'];}
if ($req=="0"){header('Location: ../kb/err.php');}
if ($req=="1"){//check username
    require_once(dirname(__FILE__).'/users.php');
    echo chk_id_avl($_POST['id']);
}
if ($req=="2"){//send OTP
    require_once(dirname(__FILE__).'/otp.php');
    $ph=$_POST['ph'];
    $type=$_POST['type'];
    if ($ph==""){echo 0;}
    else if(is_numeric($ph)&&($ph>=6000000000 and $ph<=9999999999)){
        if (chk_otp_avl($ph,$type)){echo send_otp($ph,$type);
                                   }
        else {gen_otp($ph,$type);
             echo send_otp($ph,$type);}}
        else echo 0;
}
if ($req=="3"){//check OTP
    require_once(dirname(__FILE__).'/otp.php');
    $ph=$_POST['ph'];
    $type=$_POST['type'];
    $otp=$_POST['otp'];
    echo chk_otp($ph,$otp,$type);
}
if ($req=="4"){//update profile
    require_once(dirname(__FILE__).'/session.php');
	require_once(dirname(__FILE__).'/db.php');
    $key=$_POST['key'];
    $value=$_POST['value'];
	if ($key!="enrlid")
	{
		if ($key=="id"){$value=strtoupper($value);}
		if (chk_tok()){
		$tid = $_COOKIE[ "tid" ];
		$eid=askdb( array("eid"), "sessions", array("tid"=> $tid) );
		changedb("users",array($key=>$value),array("enrlid"=>$eid));
		echo 1;
	}
		else echo 0;}
	else echo 0;
}
if ($req=="5"){//delete content
    require_once(dirname(dirname(__FILE__)).'/config.php');
	require_once(dirname(__FILE__).'/db.php');
	if (askdb(array('eid'),'contents',array('id'=>$_POST['file']))==askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid']))&&askdb(array('eid'),'contents',array('id'=>$_POST['file']))!="")
	{forgetdb('contents',array('id'=>$_POST['file']));
	$file = CONTENT.$_POST['file'];
	if (file_exists($file)){
		unlink($file);
		echo 0;
	}
	else echo 1;}
	else echo 1;
}
if ($req=="6"){//change password
	require_once(dirname(__FILE__).'/db.php');
	$eid=askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid']));
	$pwd=askdb(array('pwd'),'users',array('enrlid'=>$eid));
	if ($pwd==$_POST['pwd'])
	{
		changedb('users',array(pwd=>$_POST['newpwd']),array('enrlid'=>$eid));
		echo 1;
	}
	else echo 0;
}
if ($req=="7"){//logout all other
	require_once(dirname(__FILE__).'/db.php');
	$eid=askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid']));
	forgetdb('sessions',array('eid'=>$eid));
	echo 1;
}
if ($req=="8"){//set schedule
	require_once(dirname(__FILE__).'/db.php');
	require_once(dirname(__FILE__).'/session.php');
	require_once(dirname(__FILE__).'/courses_api.php');
	$tid=$_COOKIE["tid"];
		if (chk_tok())
		{
			$error=0;
			$slot=$_POST['slot'];
			$course=$_POST['course'];
			$venue=$_POST['venue'];
			$type=$_POST['type'];
			$table=$_POST['schedule'];
			if(!has_course($course)){$error=1;}
			if($type==0||$type==1||$type==2||$type==3||$type==4){}else {$error=1;}
			$eid = askdb( "eid", "sessions", array("tid"=>$tid));
			$batch = askdb( "batch", "users", array("enrlid"=>$eid));	changedb($table,array("course"=>$course,"venue"=>$venue,"type"=>$type,"updated"=>$eid,"time"=>time()),array("slot"=>$slot,"batch"=>$batch));
		 echo 1;
		}
		else echo 0;
}
if ($req=="9"){//register course
	require_once(dirname(__FILE__).'/db.php');
	require_once(dirname(__FILE__).'/session.php');
		if (chk_tok())
		{
			$tid=$_COOKIE["tid"];
			$course=strtoupper($_POST["course"]);
			$eid = askdb( "eid", "sessions", array("tid"=>$tid));	changedb("enrolledfor",array("crsid"=>$course),array("enrlid"=>$eid));
		    echo 1;
		}
		else echo 0;
}
?>