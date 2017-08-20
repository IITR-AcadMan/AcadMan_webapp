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
                            <input class="form-control" name="pwd" id="pwd" type="password" placeholder="Password">
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
                        <input onClick="send_ajax('plugins/ajax.php','req=6&pwd='+$('#pwd').val()+'&newpwd='+$('#newpwd').val(),'change');" class="btn btn-primary" id="submit" type="submit" value="Submit">
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
        <div class="panel-body">Logged In from <?php echo askdb(array('count(tid)'),'sessions',array('eid'=>askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid'])))); ?> devices.
        <br/>
        <input class="btn btn-primary" id="submit" type="submit" value="Logout All">
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
        <div class="panel-body">
        <table>
        Currently enrolled for:
        <?php foreach(get_courses() as $crs)
				{echo '<tr><td>'.$crs.'</tr></td>';}
		?>
        </table>
        Contact Admin to change.
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
<script>
$(document).ready(function(){
	
         });
function change(text,status,state){
	if(status==200&&state==4){
		if(text=="0"){generate_message('msgdiv','danger','Incorrect Password!','msgid','','clear');}
		else {generate_message('msgdiv','success','Password Changed Successfully!','msgid','','clear');}
	}};
</script>
<?php
get_footer();
?>