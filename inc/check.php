<?php //https://github.com/White-Raven/A-RAVEN-antisnoop
if (!defined('_DEFVAR')) {
	$host  = $_SERVER['HTTP_HOST'];
	$extra = '404.php'; //that or whatever page you wanna redirect your users to whenever they snoop
	header("Location: https://$host/$extra"); //how to yeet snooping-users with no hassle
	exit; //because.
}
?>
