<?php
require_once(dirname(__FILE__).'/config.php');
require_once(dirname(__FILE__).'/plugins/db.php');
require_once(dirname(__FILE__).'/plugins/session.php');
require_once(dirname(__FILE__).'/plugins/courses_api.php');
if(chk_tok())
{
	if(isset($_GET['file']))
	{
		if(has_course(askdb(array("course"),'contents',array('id'=>$_GET['file']))))
		{
		$file = CONTENT.$_GET['file'];

		if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.askdb(array("file_name"),'contents',array('id'=>$_GET['file'])).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
								}
		else echo "File not Found!";
	}
		else echo "Unauthorized Access";
	}
	else echo "Bad Request";
}
else {header('Location: '.DOMAIN.PATH.'/login.php?msg=3');}
?>