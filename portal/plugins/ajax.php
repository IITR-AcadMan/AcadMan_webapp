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
?>