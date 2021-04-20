<?php
define('_DEFVAR', 1); //https://github.com/White-Raven/A-RAVEN-antisnoop
$path = $_SERVER['DOCUMENT_ROOT'];
$hpwptype = $_GET["action"];
$host  = $_SERVER['HTTP_HOST'];
$hpheader = 1; // exists just as a leftover of myself integrating my own website's header into the page, so it doesn't declare some stuff multiple times.
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
        $rootlink = "https";
    } else {
        $rootlink = "http";}
$rootlink .= "://";
$rootlink .= $host; // an usefull host url for later
$cookiedomain = ".$host"; // baking session cookie just to be a good boi/gril for cookie security
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_domain', $cookiedomain);
ini_set('session.cookie_samesite', 'Strict');
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
$usersession = session_id();
$sessionlogtime = date(DATE_ISO8601);
$userIP = $_SERVER['REMOTE_ADDR'];
$userClient = $_SERVER['HTTP_USER_AGENT'];
$sessionlogURL = $_SERVER['REQUEST_URI'];
$logfile = fopen( $path ."/hp/wp-logs/$userIP.log", "a"); 			// if you don't want base logging, just delete these 4
$logline = "$sessionlogtime - $usersession - $userClient @ $sessionlogURL\n";	// if you don't want base logging, just delete these 4
fwrite($logfile, $logline); 							// if you don't want base logging, just delete these 4
fclose($logfile); 								// if you don't want base logging, just delete these 4
// Logs user names and passwords attempted
if((isset($_POST['log'])) && (!empty($_POST['log']))) {
	$loginattempt = $_POST['log'];
    if (!empty($_POST['pwd'])) { 
    	$passwordattempt = $_POST['pwd'];
    	if ($_POST['rememberme'] == 'on') {	$remmemsetting = "Y";} else { $remmemsetting = "N";};
	    	//log files by IP
		$csvfile = fopen($path ."/hp/wp-pass-attempts/by_IP/$userIP.csv", 'ab');
		$csvline = array("$loginattempt","$passwordattempt","$remmemsetting","$usersession","$sessionlogtime","$userClient");
		fputcsv($csvfile, $csvline, ',');
		fclose($csvfile);
	    	//log files by user session
		$csvfile = fopen($path ."/hp/wp-pass-attempts/by_phpsession/$usersession.csv", 'ab');
		$csvline = array("$loginattempt","$passwordattempt","$remmemsetting","$userIP","$sessionlogtime","$userClient");
		fputcsv($csvfile, $csvline, ',');
		fclose($csvfile);
	    	//log file of everything
		$csvfile = fopen($path ."/hp/wp-pass-attempts/mainwppsw.csv", 'ab');
		$csvline = array("$loginattempt","$passwordattempt","$remmemsetting","$userIP","$usersession","$sessionlogtime","$userClient");
		fputcsv($csvfile, $csvline, ',');
		fclose($csvfile);
	    //file to whatever you want to inflict on who ever went to your honeypot
		header("Location: $rootlink/hp/fooyoubots.php");
		exit();
    };
}
// Logs emails attempted for password recovery
if((isset($_POST['user_login'])) && (!empty($_POST['user_login']))) {
	//log files by IP
	$recattempt = $_POST['user_login'];
	$csvfile = fopen($path ."/hp/wp-recovery-attempts/by_IP/$userIP.csv", 'ab');
	$csvline = array("$recattempt","$usersession","$sessionlogtime","$userClient");
	//log files by user session
	fputcsv($csvfile, $csvline, ',');
	$csvfile = fopen($path ."/hp/wp-recovery-attempts/by_phpsession/$usersession.csv", 'ab');
	$csvline = array("$recattempt","$userIP","$sessionlogtime","$userClient");
	fputcsv($csvfile, $csvline, ',');
	//log file of everything
	$csvfile = fopen($path ."/hp/wp-recovery-attempts/mainwprec.csv", 'ab');
	$csvline = array("$recattempt","$userIP","$usersession","$sessionlogtime","$userClient");
	fputcsv($csvfile, $csvline, ',');
	fclose($csvfile);
     //file to whatever you want to inflict on who ever went to your honeypot
	header("Location: $rootlink/hp/fooyoubots.php");
	exit();
}
// leftover of myself integrating my own website's header into the page, so it doesn't declare some stuff multiple times.
if ($hpheader == '1') { 
	?>
<!DOCTYPE html>
	<html lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Log In &lsaquo; WordPress &#8212; WordPress</title>
	<meta name='robots' content='max-image-preview:large, noindex, noarchive' />
	<link rel='dns-prefetch' href='http://s.w.org/' />
<? ;}?> 
	<link rel='stylesheet' id='dashicons-css'  href='hp/wp-includes/css/dashicons.mina78f.css?ver=5.7.1' media='all' />
	<link rel='stylesheet' id='buttons-css'  href='hp/wp-includes/css/buttons.mina78f.css?ver=5.7.1' media='all' />
	<link rel='stylesheet' id='forms-css'  href='hp/wp-admin/css/forms.mina78f.css?ver=5.7.1' media='all' />
	<link rel='stylesheet' id='login-css'  href='hp/wp-admin/css/login.mina78f.css?ver=5.7.1' media='all' />
	<meta name='referrer' content='strict-origin-when-cross-origin' />
	<meta name="viewport" content="width=device-width" />
</head>
<?php
// simple method to switch between the login page and password recovery the same way it does on wordpress
if (isset($hpwptype) && $hpwptype == "lostpassword") {
	include ("$path/hp/wp-login-lost.php");
} else {
	include ("$path/hp/wp-login-main.php");
}
?>
