<?php
header("Content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin:*");
error_reporting(0);
ini_set('display_errors', false);
ini_set('display_startup_errors', false);
$a  = isset($_REQUEST['a']) ? trim($_REQUEST['a']) : 'default';
if($a=="s")
{
	echo file_get_contents('data/'.$_REQUEST["n"].'.json');
	return;
}
elseif($a=="e") 
{
	file_put_contents('data/'.$_REQUEST["n"].'.json',$_REQUEST["d"]);
	echo "ok";
	return;
}
?>
