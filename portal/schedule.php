<?php
require_once( dirname( __FILE__ ) . '/theme/theme.php' );
get_header();
$schedule="cs";
if(isset($_GET['sch'])){
	if($_GET['sch']=='cs'){$schedule='cs';}
	if($_GET['sch']=='ds'){$schedule='ds';}
	if($_GET['sch']=='us'){$schedule='us';}
}
require_once(dirname(__FILE__).'/plugins/schedule_api.php' );
require_once(dirname(__FILE__).'/plugins/courses_api.php');
?>
<script>
	$( "#tab2" ).addClass( "active" );
	$( "title" ).html( "AcadMan | Schedule" );
</script>
<style>
	.L{background-color: aqua;}
	.T{background-color: blueviolet;}
	.P{background-color: cadetblue;}
	.LD{background-color: grey;}
	.TD{background-color: grey;}
	.PD{background-color: grey;}
</style>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<h1 id="title" class="text-primary" align="center">Schedule</h1>
	</div>
	<div class="col-sm-1"></div>
</div>
<div class="row" style="padding-top:5%;">
	<div class="col-sm-1"></div>
	<div class="col-sm-2">
		<div class="list-group">
			<a id="cs" href="?sch=cs" class="list-group-item">Current Schedule</a>
			<a id="us" href="?sch=us" class="list-group-item">Upcoming schedule</a>
			<a id="ds" href="?sch=ds" class="list-group-item">Default Schedule</a>
		</div>
		<div>
			<span onMouseOver="show_type('L');" onMouseOut="hide_type('L');"><span style="color: aqua;" class="glyphicon glyphicon-stop"></span>&nbsp;<strong>Lectures</strong><br/><br/></span>
			<span onMouseOver="show_type('T');" onMouseOut="hide_type('T');"><span style="color: blueviolet;" class="glyphicon glyphicon-stop"></span>&nbsp;<strong>Tutorials</strong><br/><br/></span>
			<span onMouseOver="show_type('P');" onMouseOut="hide_type('P');"><span style="color: cadetblue;" class="glyphicon glyphicon-stop"></span>&nbsp;<strong>Practicals</strong><br/><br/></span>
		</div>
	</div>
	<div class="col-sm-8">
	<div id="msgdiv"></div>
	<div id="schedule" class="table-responsive">
		<style>th,td{text-align: center;}</style>
		<?php $slot=get_schedule($schedule); ?>
		<table class="table table-hover table-bordered">
			<tr>
        <th>Schedule</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
      		</tr>
      		<tr>
        <th>08AM-09AM</th>
        <td class="<?php $id='m1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>09AM-10AM</th>
        <td class="<?php $id='m2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>10AM-11AM</th>
        <td class="<?php $id='m3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>11AM-12PM</th>
        <td class="<?php $id='m4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>12PM-01PM</th>
        <td class="<?php $id='m5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>02PM-03PM</th>
        <td class="<?php $id='m6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>03PM-04PM</th>
        <td class="<?php $id='m7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>04PM-05PM</th>
        <td class="<?php $id='m8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>05PM-06PM</th>
        <td class="<?php $id='m9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; echo '" id="'.$id.'">'; if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
		</table>
	</div>
<p align="center" style="color: red;"><strong><em>Click to edit.</em></strong></p>
<button hidden type="text" id="edit" data-toggle="modal" data-target="#editdialog"></button>

<div id="editdialog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button id="modaldismiss" type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div align="center" class="modal-body">
  <label onclick="$('#hiddentype').val('2');" class="radio-inline"><input type="radio" name="type">Lecture</label>
  <label onclick="$('#hiddentype').val('1');" class="radio-inline"><input type="radio" name="type">Tutorial</label>
  <label onclick="$('#hiddentype').val('3');" class="radio-inline"><input type="radio" name="type">Practical</label>
       <br/>
       <br/>
       <select onChange="$('#hiddencourse').val($(this).val());" class="form-control" name="course" id="course">
                            <option selected="selected" value="">Choose One</option>
                            <?php
			foreach(get_courses() as $element){
				echo '<option value="'.$element.'">'.$element.'</option>';
				}
							?>
                            </select>
        <input name="input" type="text" id="slot" hidden>
        <input name="input" type="text" id="hiddentype" hidden>
        <input name="input" type="text" id="hiddencourse" hidden>
        <input name="input" type="text" value="<?php echo $schedule; ?>" id="hiddenschedule" hidden>
      </div>
      <div class="modal-footer" align="center">
       <button onclick="update();" type="button" class="btn btn-default">Update</button>
        <button type="button" id="update" hidden data-dismiss="modal"></button>
      </div>
	  </div>
  </div>
</div>
	</div>
	<div class="col-sm-1"></div>
</div>
<script src="<?php echo DOMAIN.PATH; ?>/js/msg.js"></script>
<script src="<?php echo DOMAIN.PATH; ?>/js/ajax.js"></script>
<script>
	$("td").click(function() {
		$("#edit").click();
		$("#slot").val($(this).attr('id'));
});
	$(document).ready(function(){
        switch ('<?php echo $schedule; ?>'){
            case "cs":
                $("#cs").addClass("active");
				$("#title").html("Current Schedule");
                break;
            case "us":
                $("#us").addClass("active");
				$("#title").html("Upcoming schedule");
                break;
            case "ds":
                $("#ds").addClass("active");
				$("#title").html("Default Schedule");
                break;
                }
	});
function show_type(type){
	switch (type){
            case 'L':
                $(".T").addClass("TD");
                $(".P").addClass("PD");
				$(".TD").removeClass("T");
                $(".PD").removeClass("P");
                break;
			case 'T':
                $(".L").addClass("LD");
                $(".P").addClass("PD");
				$(".LD").removeClass("L");
                $(".PD").removeClass("P");
                break;
			case 'P':
                $(".L").addClass("LD");
                $(".T").addClass("TD");
				$(".LD").removeClass("L");
                $(".TD").removeClass("T");
                break;
                }
};
function hide_type(type){
	switch (type){
            case 'L':
				$(".TD").addClass("T");
                $(".PD").addClass("P");
                $(".T").removeClass("TD");
                $(".P").removeClass("PD");
                break;
			case 'T':
				$(".LD").addClass("L");
                $(".PD").addClass("P");
                $(".L").removeClass("LD");
                $(".P").removeClass("PD");
                break;
			case 'P':
				$(".LD").addClass("L");
                $(".TD").addClass("T");
                $(".L").removeClass("LD");
                $(".T").removeClass("TD");
                break;
                }
};
function update(){
 if ($("#slot").val()==""||$("#hiddencourse").val()==""||$("#hiddentype").val()==""||$("#hiddenschedule").val()==""){alert("Fill in all the fields!");}
	else send_ajax('plugins/ajax.php','req=8&slot='+$("#slot").val()+'&course='+$("#hiddencourse").val()+'&venue=&type='+$("#hiddentype").val()+'&schedule='+$("#hiddenschedule").val(),'ajax_callback1');
};
function ajax_callback1(text,status,state){
	if(status==200&&state==4){
		if(text=="0"){
			alert("Seems like you have been logged out!");
					 }
		if(text=="1"){
			var slottype="";
			switch ($("#hiddentype").val()){
            case "1":
				slottype="T";
                break;
			case "2":
				slottype="L";
                break;
			case "3":
				slottype="P";
                break;
                };
			generate_message('msgdiv','success','Sucessfully Updated!','msgid','','clear');
			$("#"+$("#slot").val()).removeClass("L T P");
			$("#"+$("#slot").val()).addClass(slottype);
			$("#"+$("#slot").val()).html($("#hiddencourse").val());
			$("#update").click();
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