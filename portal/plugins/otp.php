<?php
require_once(dirname(__FILE__).'/sms.php');
require_once(dirname(__FILE__).'/db.php');
function gen_otp($ph,$type){
telldb("otp",array('phone','otp','type'),array($ph,rand(100000,999999),$type));
}
function send_otp($ph,$type){
	$otp=askdb(array("otp"),"otp",array("phone"=>$ph,"type"=>$type));
    $msg;
    if ($type=="1"){$msg="Your OTP for registration on AcadMan is: ".$otp." -Team AcadMan";}
    if ($otp==""){return 0;}
    else{return send_sms($ph,$msg);}
}
function rem_otp($ph,$type){
    dbconn();
	global $conn;
	$sql="DELETE FROM otp WHERE phone='".$ph."' AND type='".$type."'";
	$row = $conn->query($sql);
	dbdisconn();
}
function chk_otp_avl($ph,$type){
    $otp=askdb(array("otp"),"otp",array("phone"=>$ph,"type"=>$type));
    if ($otp=="") return 0;
    else return 1;
}
function chk_otp($ph,$verify,$type){
    $otp=askdb(array("otp"),"otp",array("phone"=>$ph,"type"=>$type));
    if ($verify==$otp&&$verify!="") return 1;
    else return 0;
}
?>