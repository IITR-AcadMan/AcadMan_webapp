<?php
require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/plugins/db.php');
require_once(dirname(__FILE__).'/theme/theme.php');
require_once(dirname(__FILE__).'/plugins/courses_api.php');
get_header();
$course=get_courses();
$crs;
if (isset($_GET['crs'])) $crs=$_GET['crs']; else $crs=$course[0];
$msg=0;
if(isset($_FILES['file'])){
	$id=time();
	$error=0;
	$target=CONTENT.$id;
	//if ($_FILES["file"]["size"] > 20000000){$msg=2;$error=1;}
	if (file_exists($target)){$msg=3;$error=1;}
	if (!has_course($crs)){$msg=4;$error=1;}
	if($error==0){
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)){
			$comment=$_POST['comment'];
			$filename=basename($_FILES["file"]["name"]);
			$eid=askdb(array("eid"),'sessions',array('tid'=>$_COOKIE['tid']));
			$size=$_FILES["file"]["size"];
			telldb('contents',array('id','eid','file_name','size','course','comment'),array($id,$eid,$filename,$size,$crs,$comment));
			$msg=1;
		}
		else{$msg=4;}
	}
}
?>
<script>$("#tab3").addClass("active");
$("title").html("AcadMan | Courses");</script>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<h1 id="title" class="text-primary" align="center">Courses</h1>
	</div>
	<div class="col-sm-1"></div>
</div>
<div class="row" style="padding-top:5%;">
	<div class="col-sm-1"></div>
	<div class="col-sm-2">
		<div class="list-group">
		<?php
			foreach(get_courses() as $element){echo '<a id="'.$element.'" href="?crs='.$element.'" class="list-group-item">'.$element.'</a>';}
		?>
		</div>
	</div>
	<div class="col-sm-8">
	<div id="msgdiv">
    </div>
		<div class="row">
			<div class="col-sm-6"><button onClick="$('#file').click();" style="width: 100%;" class="btn btn-success">Upload</button></div>
			<div class="col-sm-6"><button onClick="$('.dismiss').removeAttr('hidden');" style="width: 100%;" class="btn btn-danger">Delete</button></div>
		</div>
		<br/>
		<form action="#" method="post" enctype="multipart/form-data">
			<input onChange="$('#comment,#submit,#reset').removeAttr('hidden'); $('#submit').addClass('btn btn-success'); $('#reset').addClass('btn btn-danger');" style="font-size: 0px; position: absolute; top: 0; right: 0; opacity: 0;" type="file" name="file" id="file">
			<textarea hidden id="comment" style="width: 100%;" name="comment" rows="4"></textarea>
			<div>
					<table>
						<tr style="width: 100%;">
						<td style="width: 100%;">
						<input hidden onClick="$('#submit').removeClass('btn btn-success'); $('#reset').removeClass('btn btn-danger'); $('#comment,#submit,#reset').attr('hidden','true');" value="Reset" type="reset" id="reset">
						</td>
						<td style="width: 100%;" align="right">
						<input hidden value="Submit" type="submit" id="submit">
						</td>
						</tr>
					</table>
			</div>
		</form>
        <br/>
		<div id="coursescard">
		</div>
	<script>
function generate_card(elementid,text,msgid,action){
	var content='<div style="text-align: center;" class="well alert alert-dismissable fade in"><a href="#" id="'+msgid+'" hidden class="close" data-dismiss="alert" aria-label="close">&times;</a><strong style="font-size: 100%">'+text+'</strong></div>';
	if (action=="merge"){
	$('#'+elementid).html($('#'+elementid).html()+content);}
	else if (action==="clear"){
	$('#'+elementid).html(content);}
}
<?php
			$card=get_card_meta($crs);
			foreach($card as $tab)
			{
			echo "generate_card('coursescard','";	get_file_card($tab['id'],$tab['fn'],$tab['eid'],$tab['filename'],$tab['size'],$tab['id'],$tab['comment']);
			echo "','".$tab['id']."','merge');";
			}
?>
	</script>
	</div>
	<div class="col-sm-1"></div>
</div>
<script src="<?php echo DOMAIN.PATH; ?>/js/ajax.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/msg.js"></script>
<script>
	$(document).ready(function(){
        switch ('<?php echo $crs; ?>'){
            <?php foreach($course as $crs)
			{echo 'case "'.$crs.'":
                $("#'.$crs.'").addClass("active");
				$("#title").html("'.$crs.'");
                break;';}	
			?>
                }
		switch (<?php echo $msg; ?>){
            case 1:
				generate_message('msgdiv','success','File Sucessfully Uploaded!','msgid','','clear');
                break;
			case 2:
				generate_message('msgdiv','warning','File too large!','msgid','','clear');
                break;
			case 3:
				generate_message('msgdiv','warning','Someone else is uploading at this time try again!','msgid','','clear');
                break;
			case 4:
				generate_message('msgdiv','danger','Critical Server error! Contact Admin.','msgid','','clear');
                break;
                }
         });
function delete_file (id){
	currentid=id;
	if (confirm("Are you sure that you want to delete this file?")){send_ajax('plugins/ajax.php','req=5&file='+id,'ajax_callback1');}
	};
function ajax_callback1(text,status,state){
	if(status==200&&state==4){
		if(text=="0"){
			$("#"+currentid).click();
			generate_message('msgdiv','success','Successfully Deleted!','msgid','','clear');
					 }
		if(text=="1"){
			$("#"+currentid).click();
			generate_message('msgdiv','warning','Already Deleted!','msgid','','clear'); 
					 }
		if(text=="2"){
			alert("Access Denied!");			 
					 }
	}
	if(status!=200&&state==4){
		alert("Seems like you are disconnected from network!");
	}
		};
</script>
<?php
get_footer();
?>