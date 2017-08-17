<?php
require_once(dirname(dirname(__FILE__)).'/config.php');
$conn;
function dbconn()//for connecting database
{
    global $conn;
    $servername = DB_HOST;
	$port = DB_PORT;
	$username = DB_LOGIN;
	$password = DB_PASS;
	$db = DB_NAME;
// Create connection
	$conn = new mysqli($servername, $username, $password, $db, $port);

// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	header('Location: ../kb/dberr.php');
	}
};
function dbdisconn()//for disconnecting database
{
	global $conn;
	$conn->close();
	};
function telldb($table,$format,$data)//store data
{
	dbconn();
	global $conn;
	$sql="insert into ".$table." (";
	$counter=count($format);
	foreach($format as $column){
		if($counter>1){
		$sql=$sql.$column.",";
			$counter--;
		}
		else{
			$sql=$sql.$column;
		}
	}
	$sql=$sql.")values ('";
	$length=count($data);
	for ($i=0;$i<$length-1;$i++){
		$sql=$sql.$data[$i]."','";
	}
	$sql=$sql.$data[$length-1]."')";
	$row = $conn->query($sql);
	dbdisconn();
	};
function askdb($attribute,$table,$params)//fetch data
{
	dbconn();
	global $conn;
	$length=count($params);
	$sql="SELECT ".$attribute." FROM ".$table." WHERE ";
	foreach ($params as $key => $value){
		$sql=$sql.$key."='".$value."'";
		if ($length!=1){$sql=$sql." AND ";}
		$length--;
	}
	$row = $conn->query($sql);
	$data = $row->fetch_assoc();
	return $data[$attribute];
	dbdisconn();
	};
function forgetdb($table,$pkey,$pkeyvalue)//delete data
{
	dbconn();
	global $conn;
	$sql="DELETE FROM ".$table." WHERE ".$pkey."='".$pkeyvalue."'";
	$row = $conn->query($sql);
	dbdisconn();
	};
function changedb($table,$data,$params)//update data
{
	include_once('csv.php');
	$fields=array();
	foreach($data as $key=>$value){
		array_push($fields,$key."='".$value."'");
	}
	$length=count($params);
	$sql="UPDATE ".$table." SET ".generate_csv($fields)." WHERE ";
	foreach ($params as $key => $value){
		$sql=$sql.$key."='".$value."'";
		if ($length!=1){$sql=$sql." AND ";}
		$length--;
	}
	dbconn();
	global $conn;
	$row = $conn->query($sql);
	dbdisconn();
	};
	?>