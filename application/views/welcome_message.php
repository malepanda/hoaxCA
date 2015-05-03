<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>hoaxCA | Not That Trusted CA</title>
</head>
<body>

<div id="container">
	<div id="body">
		<h3>Login</h3>
		<form method="POST" action="user/login.html">
			<input type="text" style="width:300px;" name="username" placeholder="Username" />
			<input type="password" style="width:300px;" name="password" placeholder="password" />
			<button type="submit">Login</button>
		</form>
		<br>
		<a href="user/register.html">Register</a>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>