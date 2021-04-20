<?php
//you can pretty much rewrite this file how the eff you want without AT ALL affecting the functionnality of the Honeypot.
//I did it so it would make less well-coded bots download a 10GIGABYTE file, just to try if I can crash them or at least make them chug.
//Perk of redirecting to this file instead of an external page directly: you don't have to allow external sources in your Content-Security-Policy: form-action 'self'; header.
//If you want it to just loop back directly to the honeypot, then you should just modify the header("Location: $rootlink/hp/fooyoubots.php"); 
//to  header("Location: $rootlink/wp-login.php");  and  header("Location: $rootlink/wp-login.php?action=lostpassword");
$url='https://speed.hetzner.de/10GB.bin';
   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
<head>
	<link rel='stylesheet' href='fooyoubots/fooyoubots.css' media='all' />
</head>
<html><body><div class="bg"></div></body></html>
