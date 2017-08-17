<?php
require_once(dirname(dirname(__FILE__)).'/plugins/session.php');
require_once(dirname(dirname(__FILE__)).'/config.php');
if (!chk_tok()){
header('Location: '.DOMAIN.PATH.'/register.php?msg=1');
}
?>