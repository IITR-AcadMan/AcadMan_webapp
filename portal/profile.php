<?php
require_once( dirname( __FILE__ ) . '/theme/theme.php' );
require_once( dirname( __FILE__ ) . '/config.php' );
get_header();
require_once( 'plugins/db.php' );
$tid = $_COOKIE[ "tid" ];
$eid;
$access=0;
if (isset($_GET['id'])){$eid=$_GET['id'];}
else {$eid = askdb( array("eid"), "sessions", array("tid"=> $tid)); $access=1;}
$id = askdb( array("id"), "users", array("enrlid"=> $eid) );
$fn = askdb( array("fn"), "users", array("enrlid"=> $eid) );
$ln = askdb( array("ln"), "users", array("enrlid"=> $eid));
$dob = askdb( array("dob"), "users", array("enrlid"=> $eid));
$ph = askdb( array("ph"), "users", array("enrlid"=> $eid));
$email = askdb( array("email"), "users", array("enrlid"=> $eid));
$q = askdb( array("q"), "users", array("enrlid"=> askdb( array("eid"), "sessions", array("tid"=> $tid))));
$a = askdb( array("a"), "users", array("enrlid"=> askdb( array("eid"), "sessions", array("tid"=> $tid))));
if($access==0){
	echo '<style>
	.tobehidden{
		visibility: hidden;
	}
</style>';
}
?>
<script>
	$( "title" ).html( "AcadMan | Profile" );
</script>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="profile well" align="left">
		<div id="msgdiv"></div>
			<label for="enrlid">Enrollment No.:</label>
			<div class="input-group">
				<input class="form-control" name="enrlid" id="enrlid" type="text" value=<?php echo $eid ?> maxlength="8" readonly>
				<span onClick="alert('Contact Admin to Change');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<br/>
			<label for="id">Username:</label>
			<div class="input-group">
				<input class="form-control" name="id" id="id" type="text" value=<?php echo $id ?> readonly >
				<span onClick="edit('id');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<br/>
			<label for="fn">First Name:</label>
			<div class="input-group">
				<input class="form-control" name="fn" id="fn" type="text" value=<?php echo $fn ?> readonly >
				<span onClick="edit('fn');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<br/>
			<label for="ln">Last Name</label>
			<div class="input-group">
				<input class="form-control" name="ln" id="ln" type="text" value=<?php echo $ln ?> readonly >
				<span onClick="edit('ln');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<br/>
			<label for="dob">Date of Birth:</label>
			<div class="input-group">
				<input class="form-control" name="dob" id="dob" type="date" placeholder="Date of Birth" value=<?php echo $dob ?> readonly >
				<span onClick="alert('Contact Admin to Change');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<br/>
			<label for="ph">Phone Number:</label>
			<div class="input-group">
				<input class="form-control" name="ph" id="ph" type="text" placeholder="Phone" value=<?php echo $ph ?> readonly >
				<span onClick="edit('ph');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<br/>
			<label for="email">Email address:</label>
			<div class="input-group">
				<input class="form-control" name="email" id="email" type="text" placeholder="Email" value=<?php echo $email ?> readonly >
				<span onClick="edit('email');" class="tobehidden input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			</div>
			<div class="tobehidden">
			<br/>
			<label for="q">Security Question:</label>
			<div class="input-group">
				<input class="form-control" name="q" id="q" type="text" placeholder="Security Question" value="<?php 
                                    if ($q=="0") echo "What city were you born in? ";
                                    if ($q=="1") echo "What is your mother 's maiden name?";
                                    if ($q=="2") echo "What was the name of your first pet?";
                                    if ($q=="3") echo "Who is your favorite author?";
                                    if ($q=="4") echo "What was the last name of your favorite teacher?";
                                    if ($q=="5") echo "What is the name of the street on which you grew up?";
                                    if ($q=="6") echo "What is the name of your favorite sports team?";
                                    if ($q=="7") echo "Who is your all-time favorite movie character?";
                                    if ($q=="8") echo "What was the make of your first car?";?>" readonly >
                                    <span onClick="alert('Contact Admin to Change');" class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        </div>
                        <br/>
                        <label for="a">Answer:</label>
                        <div class="input-group">
						  <input class="form-control" name="a" id="a" type="password" placeholder="Answer" value="<?php echo $a ?>" readonly >
                      <span onClick="toggle_reveal();" class="input-group-addon"><i id="eye" class="glyphicon glyphicon-eye-open"></i></span>
                       <span onClick="edit('a');" class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        </div>

<button hidden type="text" id="update" data-toggle="modal" data-target="#updatedialog"></button>

<div id="updatedialog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button id="modaldismiss" type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update</h4>
      </div>
      <div class="modal-body">
        <input class="form-control" type="text" name="input" id="input">
        <input name="input" type="text" id="data" hidden>
      </div>
      <div class="modal-footer" align="center">
       <button onclick="submit();" type="button" class="btn btn-default">Submit</button>
        <button type="button" id="submit" hidden data-dismiss="modal"></button>
      </div>
	  </div>
  </div>
</div>
              </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
<script src="<?php echo DOMAIN.PATH; ?>/js/ajax.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/msg.js"></script>
<script>
function edit(data){
		$("#input").val($("#"+data).val());
		$("#data").val(data);
		$("#update").click();
	}
function submit(){
	input=$("#input").val();
	data=$("#data").val();
	send_ajax('<?php echo DOMAIN.PATH."/plugins/ajax.php"; ?>',"req=4&key="+data+"&value="+input,'ajax_callback1');
	};
function ajax_callback1(text,status,state){
	if(status==200&&state==4){
		if(text=="1"){
			$("#"+data).val(input);
            $("#submit").click();
			generate_message('msgdiv','success','Sucessfully Updated!','msgid','','clear');
            return;
		}
		if(text=="0"){
			alert("Sorry! Unable to update. Try again later.");
            return false;
		}
	}
	if(status!=200&&state==4){
		alert("Seems like you are disconnected from network!");
        return false;
	}
		};
	function toggle_reveal(){
		if($('#eye').hasClass('glyphicon-eye-close')){
			$('#eye').removeClass('glyphicon-eye-close');
			$('#eye').addClass('glyphicon-eye-open');
			$('#a').attr("type","password");}
		else{$('#eye').removeClass('glyphicon-eye-open');
			$('#eye').addClass('glyphicon-eye-close');
			$('#a').attr("type","text");}
	}
</script>
<?php
get_footer();
?>