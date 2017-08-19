<?php
require_once(dirname(__FILE__).'/theme/theme.php');
require_once(dirname(__FILE__).'/plugins/db.php');
get_header();
?>
<script>
	$( "title" ).html( "AcadMan | Prefrences" );
</script>
<div style="text-align: center;" hidden class="alert alert-dismissable fade in" id="msgdiv">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong id="msg" style="font-size: 100%"></strong>
        </div>
<div class="container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Change Password</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
       	 <div class="row">
			 <div class="col-sm-4"></div>
       	 <div class="col-sm-4" align="center">
        	 <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" name="password" id="password" type="password" placeholder="Password">
			</div>
                           <br/>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                            <input class="form-control" name="password" id="password" type="password" placeholder="New Password">
				 </div>
                           <br/>
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                            <input class="form-control" name="password" id="password" type="password" placeholder="Confirm Password">
                        	</div>
                        <br>
                        <input class="btn btn-primary" id="submit" type="submit" value="Submit">
        </div>
        </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Sessions</a>
        </h4>
      </div>
      <div align="center" id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Logged In from <?php echo askdb(array('count(tid)'),'sessions',array('eid'=>askdb(array('eid'),'sessions',array('tid'=>$_COOKIE['tid'])))); ?> devices.
        <br/>
        <input class="btn btn-primary" id="submit" type="submit" value="Logout All">
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Change Courses</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Contact Admin.</div>
      </div>
    </div> 
     <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Apply For Admin Rights</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">To apply for admin rights for your batch contact admin.</div>
      </div>
    </div>
  </div> 
</div>
<script>
$(document).ready(function(){
		switch (<?php echo $_GET['msg']; ?>){
            case 1:
                $("#msg").text("File Sucessfully Uploaded!");
                $("#msgdiv").addClass("alert-success");
                $("#msgdiv").show();
                break;
			case 2:
                $("#msg").text("File too large!");
                $("#msgdiv").addClass("alert-warning");
                $("#msgdiv").show();
                break;
			case 3:
                $("#msg").text("Someone else is uploading at this time try again!");
                $("#msgdiv").addClass("alert-warning");
                $("#msgdiv").show();
                break;
			case 4:
                $("#msg").text("Critical Server error! Contact Admin.");
                $("#msgdiv").addClass("alert-danger");
                $("#msgdiv").show();
                break;
                }
         });
</script>
<?php
get_footer();
?>