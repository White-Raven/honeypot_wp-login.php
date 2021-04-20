<?php //https://github.com/White-Raven/A-RAVEN-antisnoop
require_once( $_SERVER['DOCUMENT_ROOT'] ."/inc/check.php"); ?> 
<body class="login no-js login-action-login wp-core-ui  locale-en-gb">
	<div id="login">
		<h1><a href="https://en-gb.wordpress.org/">Powered by WordPress</a></h1>

		<form name="loginform" id="loginform" action="<? echo "$rootlink/wp-login.php";?>" method="post">
			<p>
				<label for="user_login">Username or Email Address</label>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" autocapitalize="off" />
			</p>

			<div class="user-pass-wrap">
				<label for="user_pass">Password</label>
				<div class="wp-pwd">
					<input type="password" name="pwd" id="user_pass" class="input password-input" value="" size="20" />
					<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Show password">
						<span class="dashicons dashicons-visibility" aria-hidden="true"></span>
					</button>
				</div>
			</div>
			<p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> 
				<label for="rememberme">Remember Me</label>
			</p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
				<input type="hidden" name="redirect_to" value="https://a-raven.net/wp/wp-admin/" />
				<input type="hidden" name="testcookie" value="1" />
			</p>
		</form>

		<p id="nav">
			<a href="<? echo "$rootlink/wp-login.php?action=lostpassword";?>">Lost your password?</a>
		</p>
		<p id="backtoblog">
			<a href="<? echo "$rootlink/";?>">&larr; Go to WordPress</a>
		</p>
	</div>
	<script src='hp/wp-includes/js/jquery/jquery.min9d52.js?ver=3.5.1' id='jquery-core-js'></script>
	<script src='hp/wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script>
	<script src='hp/wp-includes/js/dist/vendor/wp-polyfill.min89b1.js?ver=7.4.4' id='wp-polyfill-js'></script>
	<script src='hp/wp-includes/js/dist/hooks.minf521.js?ver=50e23bed88bcb9e6e14023e9961698c1' id='wp-hooks-js'></script>
	<script src='hp/wp-includes/js/dist/i18n.min87d6.js?ver=db9a9a37da262883343e941c3731bc67' id='wp-i18n-js'></script>
	<script src='hp/wp-admin/js/user-profile.mina78f.js?ver=5.7.1' id='user-profile-js'></script>
	<div class="clear">
	</div>
</body>
</html>
