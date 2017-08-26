<?php
require_once(dirname(__FILE__).'/theme/theme.php');
require_once(dirname(__FILE__).'/plugins/db.php');
require_once(dirname(__FILE__).'/plugins/courses_api.php');
get_header();
?>
<script>
	$( "title" ).html( "AcadMan | Prefrences" );
</script>
<div id="msgdiv">
        </div>
<div class="container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#password">Change Password</a>
        </h4>
      </div>
      <div id="password" class="panel-collapse collapse in">
        <div class="panel-body">
       	 <div class="row">
			 <div class="col-sm-4"></div>
       	 <div class="col-sm-4" align="center">
        	 <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" name="pwd" id="pwd" type="password" placeholder="Current Password">
			</div>
                           <br/>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                            <input class="form-control" name="newpwd" id="newpwd" type="password" placeholder="New Password">
				 </div>
                           <br/>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                            <input class="form-control" name="cpwd" id="cpwd" type="password" placeholder="Confirm Password">
                        	</div>
                        <br>
                        <input onClick="change_password($('#pwd').val(),$('#newpwd').val(),$('#cpwd').val());" class="btn btn-primary" id="submit" type="submit" value="Submit">
        </div>
        </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#session">Sessions</a>
        </h4>
      </div>
      <div align="center" id="session" class="panel-collapse collapse">
        <div class="panel-body">Logged In from <?php echo askdb(array('count(tid)'),'sessions',array('eid'=>askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid'])))); ?> device(s).
        <br/>
        <input onClick="destroy_sessions();" class="btn btn-primary" id="logoutall" type="submit" value="Logout All">
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#course">Change Courses</a>
        </h4>
      </div>
      <div id="course" class="panel-collapse collapse">
        <div align="center" class="panel-body">
        Currently enrolled for:
        <table id="displaycourses">
        <?php foreach(get_courses() as $crs)
				{echo '<tr><td>'.$crs.'</tr></td>';}
		?>
        </table>
        <br/>
        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                            <input class="form-control" name="courses" id="courses" type="text" placeholder="Enter courses seperated by comma.">
                        	</div>
                        <br>
                        <input onClick="register_course($('#courses').val());" class="btn btn-primary" id="register" type="submit" value="Register">
        </div>
      </div>
    </div> 
     <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#admin">Apply For Admin Rights</a>
        </h4>
      </div>
      <div id="admin" class="panel-collapse collapse">
        <div class="panel-body">To apply for admin rights for your batch contact admin.</div>
      </div>
    </div>
  </div> 
</div>
<script src="<?php echo DOMAIN.PATH; ?>/js/msg.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/ajax.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/hash.js"></script>
<script>
$(document).ready(function(){
	
         });
function change_password(oldpwd,newpwd,cpwd){
		if(oldpwd==""||newpwd==""||cpwd==""){generate_message('msgdiv','warning',"Please enter passwords first!",'msgid','','clear');}
		else if(newpwd==cpwd){
				$("#submit").attr("value","Submitting...");
                document.getElementById("submit").disabled = "true";	send_ajax('plugins/ajax.php','req=6&pwd='+sha256_digest($('#pwd').val())+'&newpwd='+sha256_digest($('#newpwd').val()),'ajax_callback1');
		}
		else {generate_message('msgdiv','warning',"Passwords doesn't match!",'msgid','','clear');}
	};
function ajax_callback1(text,status,state){
	if(status==200&&state==4){
		if(text=="0"){generate_message('msgdiv','danger','Incorrect Password!','msgid','','clear');}
		else {generate_message('msgdiv','success','Password Changed Successfully!','msgid','','clear');}
	}
	if(status!=200&&state==4){
		alert('Oops! There is a problem communicating with our servers.');
	}
	if(state==4){
		$("#submit").attr("value","Submit");
		$("#submit").removeAttr("disabled");
	}
		};
function register_course(course){
		if(course==""){generate_message('msgdiv','warning',"Enter atleast one course!",'msgid','','clear');}
		else{
				$("#register").attr("value","Registering...");
                document.getElementById("register").disabled = "true";	send_ajax('plugins/ajax.php','req=9&course='+course,'ajax_callback2');
		}
	};
function ajax_callback2(text,status,state){
	if(status==200&&state==4){
		if(text=="0"){generate_message('msgdiv','danger','Session Timed out!','msgid','','clear');}
		else {
			var csvcourse=$("#courses").val();
			var arraycourse = csvcourse.split(",");
			$("#displaycourses").html('');
			arraycourse.forEach(displayer);
			$("#courses").val("");
			generate_message('msgdiv','success','Registered Successfully!','msgid','','clear');
		}
	}
	if(status!=200&&state==4){
		alert('Oops! There is a problem communicating with our servers.');
	}
	if(state==4){
		$("#register").attr("value","Register");
		$("#register").removeAttr("disabled");
	}
		};
function displayer(item, index) {
    $("#displaycourses").html($("#displaycourses").html() + '<tr><td>'+item+'</tr></td>'); 
}
function destroy_sessions(){
				$("#logoutall").attr("value","Logging Out...");
                document.getElementById("logoutall").disabled = "true";	send_ajax('plugins/ajax.php','req=7','ajax_callback3');
	};
function ajax_callback3(text,status,state){
	if(status==200&&state==4){
		if(text=="1"){
			generate_message('msgdiv','success','Logged out Successfully!','msgid','','clear');
			window.location = "<?php echo DOMAIN.PATH; ?>/logout.php";					 
					 }
	}
	if(status!=200&&state==4){
		generate_message('msgdiv','danger','Unable to log you out!','msgid','','clear');
	}
	if(state==4){
		$("#logoutall").attr("value","Logout All");
		$("#logoutall").removeAttr("disabled");
	}
		};
</script>
<?php
get_footer();
?>