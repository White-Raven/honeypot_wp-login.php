<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$host  = $_SERVER['HTTP_HOST'];
$cookiedomain = ".$host";
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_domain', $cookiedomain);
ini_set('session.cookie_samesite', 'Strict');
session_start();
if (!isset($_SESSION['count'])) {$_SESSION['count'] = 0;} else {$_SESSION['count']++;}
$usersession = session_id();
$sessionlogtime = date(DATE_ISO8601);
$userIP = $_SERVER['REMOTE_ADDR'];
$userClient = $_SERVER['HTTP_USER_AGENT'];
$sessionlogURL = $_SERVER['REQUEST_URI'];
$logfile = fopen( $path ."/hp/wp-logs/$userIP.log", "a");
$logline = "$sessionlogtime - $usersession - $userClient @ $sessionlogURL\n";
fwrite($logfile, $logline);
fclose($logfile);

//you can pretty much rewrite this file how the eff you want without AT ALL affecting the functionnality of the Honeypot starting from here.

//The part above is just to log the visits of this page.
//The part under is where you wanna yeet whoever tried their luck.

//As of now, I did it so it would make less well-coded bots download a 10GIGABYTE file, just to try if I can crash them or at least make them chug.
//Perk of redirecting to this file instead of an external page directly: you don't have to allow external sources in your Content-Security-Policy: form-action 'self'; header.
//If you want it to just loop back directly to the honeypot, then you should just modify the header("Location: $rootlink/hp/fooyoubots.php"); 
//to  header("Location: $rootlink/wp-login.php");  and  header("Location: $rootlink/wp-login.php?action=lostpassword");

$url='https://speed.hetzner.de/10GB.bin';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
<head>
	<link rel='stylesheet' href="/../hp/fooyoubots/fooyoubots.css" media='all' />
</head>
<html><body><div class="bg"></div></body></html>
