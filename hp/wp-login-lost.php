<?php //https://github.com/White-Raven/A-RAVEN-antisnoop
 require_once( $_SERVER['DOCUMENT_ROOT'] ."/inc/check.php"); ?>
<body class="login no-js login-action-lostpassword wp-core-ui  locale-en-gb">
	<div id="login">
		<h1>
			<a href="https://en-gb.wordpress.org/">Powered by WordPress</a>
		</h1>
			<p class="message">Please enter your username or email address. You will receive an email message with instructions on how to reset your password.</p>

		<form name="lostpasswordform" id="lostpasswordform" action="<? echo "$rootlink/wp-login.php?action=lostpassword";?>" method="post">
			<p>
				<label for="user_login">Username or Email Address</label>
				<input type="text" name="user_login" id="user_login" class="input" value="" size="20" autocapitalize="off" />
			</p>
				<input type="hidden" name="redirect_to" value="" />
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Get New Password" />
			</p>
		</form>

		<p id="nav">
			<a href="<? echo "$rootlink/wp-login.php";?>">Log in</a>
		</p>
		<p id="backtoblog">
			<a href="<? echo "$rootlink/";?>">&larr; Go to WordPress</a>		
		</p>
	</div>
	<div class="clear">
	</div>
</body>
</html>
	
