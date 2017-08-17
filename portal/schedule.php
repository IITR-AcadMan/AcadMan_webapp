<?php
require_once( dirname( __FILE__ ) . '/theme/theme.php' );
get_header();
$schedule="cs";
if(isset($_GET['sch'])){
	if($_GET['sch']=='cs'){$schedule='cs';}
	if($_GET['sch']=='ds'){$schedule='ds';}
	if($_GET['sch']=='us'){$schedule='us';}
}
require_once( 'plugins/schedule_api.php' );
?>
<script>
	$( "#tab2" ).addClass( "active" );
	$( "title" ).html( "AcadMan | Schedule" );
</script>
<style>
	.T{background-color: aqua;}
	.L{background-color: blueviolet;}
	.P{background-color: cadetblue;}
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
			<span style="color: aqua;" class="glyphicon glyphicon-stop"></span>&nbsp;<strong>Lectures</strong><br/><br/>
			<span style="color: blueviolet;" class="glyphicon glyphicon-stop"></span>&nbsp;<strong>Tutorials</strong><br/><br/>
			<span style="color: cadetblue;" class="glyphicon glyphicon-stop"></span>&nbsp;<strong>Practicals</strong><br/><br/>
		</div>
	</div>
	<div class="col-sm-8">
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
        <td class="<?php $id='m1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m1"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m1"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m1"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m1"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f1'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m1"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>09AM-10AM</th>
        <td class="<?php $id='m2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m2"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m2"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m2"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m2"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f2'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m2"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>10AM-11AM</th>
        <td class="<?php $id='m3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m3"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m3"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m3"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m3"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f3'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m3"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>11AM-12PM</th>
        <td class="<?php $id='m4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m4"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m4"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m4"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m4"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f4'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m4"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>12PM-01PM</th>
        <td class="<?php $id='m5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m5"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m5"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m5"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m5"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f5'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m5"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>02PM-03PM</th>
        <td class="<?php $id='m6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m6"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m6"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m6"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m6"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f6'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m6"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>03PM-04PM</th>
        <td class="<?php $id='m7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m7"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m7"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m7"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m7"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f7'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m7"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>04PM-05PM</th>
        <td class="<?php $id='m8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m8"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m8"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m8"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m8"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f8'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m8"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
       <tr>
        <th>05PM-06PM</th>
        <td class="<?php $id='m9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m9"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='t9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m9"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='w9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m9"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='th9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m9"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
        <td class="<?php $id='f9'; if(isset($slot['type'][$id])) echo $slot['type'][$id]; ?>" id="m9"><?php if(isset($slot['course'][$id])) echo $slot['course'][$id]; ?></td>
			</tr>
		</table>
	</div>
	</div>
	<div class="col-sm-1"></div>
</div>
<script>
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
</script>
<?php
get_footer();
?>