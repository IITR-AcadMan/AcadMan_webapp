<?php
require_once('plugins/session.php');
require_once('config.php');
if (chk_tok()){
header('Location: dashboard.php');
}
if (isset($_POST['id'])){
require_once('plugins/otp.php');
require_once('plugins/db.php');
if (chk_otp($_POST['ph'],$_POST['otp'],'1')){
   rem_otp($_POST['ph'],'1');
$register=array($_POST['enrlid'],'',strtoupper($_POST['id']),$_POST['pwd'],$_POST['fn'],$_POST['ln'],$_POST['dob'],$_POST['ph'],$_POST['email'],$_POST['q'],$_POST['a']);
telldb("users",array('enrlid','batch','id','pwd','fn','ln','dob','ph','email','q','a'),$register);
gen_tok(strtoupper($_POST['id']),$_POST['pwd']);
header('Location: '.KB.'/welcome.php');}
    else {header('Location: '.DOMAIN.PATH.'/register.php?msg=2');}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <TITLE>AcadMan | Register</TITLE>
    </head>
    <body>
        <div class="row" style="padding-top:5%;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="register well" align="center">
                   <div id="msgdiv">
                    </div>
                    <form onsubmit="return validate()" action="register.php" method="POST">
                        <div class="input-group">
                        <span class="input-group-addon field"><strong>Enrollment No.</strong></span>
						  <input name="enrlid" type="text" autofocus required class="form-control" placeholder="e.g. 16000001" >
                        </div>
                        <br/>
                        <div id="id" class="input-group">
                        <span class="input-group-addon field"><strong>Username</strong></span>
						  <input id="trigger" onkeyup="chkid(this.value)" class="form-control" name="id" type="text" placeholder="e.g. jsmith123" required >
                          <span id="idicon" class="glyphicon form-control-feedback"></span>
                        </div>
                        <br/>
                        <div id="pwd" class="input-group">
                        <span class="input-group-addon field"><strong>Password</strong></span>
						  <input class="form-control" onkeyup="chkpwd(this.value);chkcpwd($('#cpassword').val());" id="password" name="pwd" type="password" placeholder="Password" required >
                          <span id="pwdicon" class="glyphicon form-control-feedback"></span>
                        </div>
                        <br/>
                        <div id="cpwd" class="input-group">
                        <span class="input-group-addon field"><strong>Confirm Password</strong></span>
						  <input class="form-control" onkeyup="chkcpwd(this.value)" id="cpassword" name="cpwd" type="password" placeholder="Confirm Password" required >
                            <span id="cpwdicon" class="glyphicon form-control-feedback"></span>
                        </div>
                        <br/>
                        <div class="input-group">
                        <span class="input-group-addon field"><strong>First Name</strong></span>
						  <input class="form-control" name="fn" type="text" placeholder="e.g. John" required >
                        </div>
                        <br/>
                        <div class="input-group">
                        <span class="input-group-addon field"><strong>Last Name</strong></span>
						  <input class="form-control" name="ln" type="text" placeholder="e.g. Smith">
                        </div>
                        <br/>
                        <div class="input-group">
						<span class="input-group-addon field"><strong>Date of Birth</strong></span>
					  <input class="form-control" name="dob" placeholder="yyyy-mm-dd" type="text" id="Datepicker" required readonly>
                      </div>
                      <br/>
                      <div id="phdiv" class="input-group">
                        <span class="input-group-addon field"><strong>Mobile No.</strong></span>
                        <span class="input-group-addon"><strong>+91</strong></span>
						  <input class="form-control" id="ph" name="ph" type="text" placeholder="e.g. 9934099340" required >
						 <span id="verifyicon" onClick='$("#verify").click();' class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
							<span id="phicon" class="glyphicon form-control-feedback"></span></div>
<button hidden id="verify" onclick="if(sendotp($('#ph').val())){$('#verify1').click();}" type="button" >Verify</button>
<button hidden id="verify1" type="button" data-toggle="modal" data-target="#verifydialog">Verify1</button>

<div id="verifydialog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter OTP Sent</h4>
      </div>
      <div class="modal-body">
        <input class="form-control" length="6" maxlength="6" type="text" name="otp" id="otp">
      </div>
      <div class="modal-footer" align="center">
        <button onclick="chkotp($('#ph').val(),$('#otp').val())" type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
					  </div>
                       <br/>
                        <div class="input-group">
                        <span class="input-group-addon field"><strong>Email</strong></span>
						  <input class="form-control" name="email" type="email" placeholder="e.g. jsmith@example.com" required >
                        </div>
                        <br/>
                        <div class="input-group">
                           <span class="input-group-addon field"><strong>Security Question</strong></span>
                          <select class="form-control" name="q" id="q">
                            <option selected="selected" value="">Choose One</option>
                            <option value="0">What city were you born in?</option>
                            <option value="1">What is your mother's maiden name?</option>
                            <option value="2">What was the name of your first pet?</option>
                            <option value="3">Who is your favorite author?</option>
                            <option value="4">What was the last name of your favorite teacher?</option>
                            <option value="5">What is the name of the street on which you grew up?</option>
                            <option value="6">What is the name of your favorite sports team?</option>
                            <option value="7">Who is your all-time favorite movie character?</option>
                            <option value="8">What was the make of your first car?</option>
                            </select>
                        </div>
                        <br/>
                        <div class="input-group">
                        <span class="input-group-addon field"><strong>Answer</strong></span>
						  <input readonly class="form-control" id="a" name="a" type="text" placeholder="Answer">
                        </div>
                        <br/>
                        <input class="btn btn-primary" type="submit" id="submit" value="Register"></input><br/><br/>
                        Already Registered?<br/>
						Login <a href="login.php">here</a>
                    </form>
                </div>
          </div>
            <div class="col-sm-4"></div>
    </div>
	<style>.field{
    width: 50%;
    text-align: left;
    }</style>
<script src="js/hash.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/ajax.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/msg.js"></script>
<script>
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function validate(){if ($("#phdiv").hasClass("has-success")){$("#password").val(sha256_digest($("#password").val()));
$("#cpassword").val(sha256_digest($("#cpassword").val()));
                $("#submit").attr("value","Please Wait...");
                document.getElementById("submit").disabled = "true";}
                    else {alert("Phone must be verified");
                         return false;}
                };
function chkid(id){
    if (id.length == 0) {
        $("#id").removeClass("has-success");
        $("#id").removeClass("has-error");
        $("#idicon").removeClass("glyphicon-ok");
        $("#idicon").removeClass("glyphicon-remove");
        return;
    } else {
		send_ajax('plugins/ajax.php',"req=1&id="+id,'ajax_callback1');
        var xmlhttp = new XMLHttpRequest();
    }
};
function ajax_callback1(text,status,state){
	if(status==200&&state==4){
		if(text=="0"){
			$("#id").removeClass("has-success");
            $("#idicon").removeClass("glyphicon-ok");
            $("#id").addClass("has-error");
            $("#idicon").addClass("glyphicon-remove");
		}
		if(text=="1"){
			$("#id").removeClass("has-error");
            $("#idicon").removeClass("glyphicon-remove");
            $("#id").addClass("has-success");
            $("#idicon").addClass("glyphicon-ok");
		}
	}
		};
function chkpwd(password){
    if (password.length == 0) {
        $("#pwd").removeClass("has-success");
        $("#pwd").removeClass("has-error");
        $("#pwdicon").removeClass("glyphicon-ok");
        $("#pwdicon").removeClass("glyphicon-remove");
        return;}
    else {
            if ("1"=="1")
            {$("#pwd").removeClass("has-error");
            $("#pwdicon").removeClass("glyphicon-remove");
             $("#pwd").addClass("has-success");
             $("#pwdicon").addClass("glyphicon-ok");}
            else if("1"=="0")
            {$("#pwd").removeClass("has-success");
            $("#pwdicon").removeClass("glyphicon-ok");
            $("#pwd").addClass("has-error");
            $("#pwdicon").addClass("glyphicon-remove");
            }
        }};
function chkcpwd(cpassword){
    if (cpassword.length == 0) {
        $("#cpwd").removeClass("has-success");
        $("#cpwd").removeClass("has-error");
        $("#cpwdicon").removeClass("glyphicon-ok");
        $("#cpwdicon").removeClass("glyphicon-remove");
        return;}
    else {
            if ($("#password").val()==cpassword)
            {$("#cpwd").removeClass("has-error");
            $("#cpwdicon").removeClass("glyphicon-remove");
             $("#cpwd").addClass("has-success");
             $("#cpwdicon").addClass("glyphicon-ok");}
            else if($("#password").val()!=cpassword)
            {$("#cpwd").removeClass("has-success");
            $("#cpwdicon").removeClass("glyphicon-ok");
            $("#cpwd").addClass("has-error");
            $("#cpwdicon").addClass("glyphicon-remove");
            }
        }};
function sendotp(ph){
    if(getCookie(ph)!="")
    {
        alert("OTP already sent");
        return true;
    }
    else 
    {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            if (this.responseText=="1")
            {
                document.cookie = ph+"=true";
                return true;
            }
            else if (this.responseText=="0")
            {
                alert("Sorry! Unable to send OTP. Try again later.");
                return false;
            }
        }
            if (this.readyState == 4 && this.status != 200){
                alert("Seems like you are disconnected from network!");
                return false;
            }
        };
        xmlhttp.open("POST", "plugins/ajax.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("type=1&req=2&ph="+ph);
    }
};
function chkotp(ph,otp){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            if (this.responseText=="1")
            {
                $('#ph').attr('readonly', true);
                $('#verifyicon').hide();
                $("#phdiv").removeClass("has-error");
                //$("#phicon").removeClass("glyphicon-remove");
                $("#phdiv").addClass("has-success");
                //$("#phicon").addClass("glyphicon-ok");
                alert("Successfully Verified!");
                document.cookie = ph+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                return;
            }
            else
            {   $("#phdiv").removeClass("has-success");
                //$("#phicon").removeClass("glyphicon-ok");
                $("#phdiv").addClass("has-error");
                //$("#phicon").addClass("glyphicon-remove");
                alert("Incorrect OTP!");
                return false;
            }
        }
            if (this.readyState == 4 && this.status != 200){
                alert("Seems like you are disconnected from network!");
                return false;
            }
        };
        xmlhttp.open("POST", "plugins/ajax.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("type=1&req=3&ph="+ph+"&otp="+otp);
};
$("#q").change(function(){if ($("#q").val()!="") {$("#a").removeAttr("readonly");}
							  else {$("#a").prop("readonly", true); $("#a").val("");}});
$(function() {
	$( "#Datepicker" ).datepicker().datepicker( "option", "dateFormat", "yy-mm-dd" ).datepicker( "option", "changeMonth", "true" ).datepicker( "option", "changeYear", "true" ).datepicker("option","yearRange", "1980:-15"); 
});
$("#ph").keydown(function(e){
  var key = e.which;
	if (key>=96&&key<=105){key-=48;}
	var char=String.fromCharCode(key);
	var a=$("#ph").val();
  if (key>=48&&key<=57) {e.preventDefault();
if (a.length<9) {$("#ph").val(a+char);}
if (a.length==9){$("#ph").val(a+char); $("#verify").click();}
  }
							 else{if(key>47||key==32){e.preventDefault();};}
});
$(document).ready(function(){
        switch (<?php if (isset($_GET['msg'])) echo $_GET['msg']; else echo "0"; ?>){
            case 1:
				generate_message('msgdiv','danger','Something went wrong. Contact Admin for support.','msgid','','clear');
                break;
			case 2:
				generate_message('msgdiv','danger','Incorrect OTP!','msgid','','clear');
                break;
                }
         });
</script>
    </body>
</html>