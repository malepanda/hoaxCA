<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register to hoaxCA</title>
</head>
<body>

<div id="container">
	<div id="body">
		<h3>Register</h3>
		<form method="POST" action="regist.html">
			<input type="text" style="width:300px;" name="username" placeholder="Username" />
			<input type="password" style="width:300px;" name="password" placeholder="password" />
			<input type="text" style="width:300px;" name="nama" placeholder="Nama Lengkap" />
			<input type="text" style="width:300px;" name="alamat" placeholder="Alamat Lengkap" />
			<input type="text" style="width:300px;" name="email" placeholder="Alamat E-mail" />
			<input type="text" style="width:300px;" name="nokontak" placeholder="Nomor Telpon/HP" />
			<button type="submit">Create</button>
		</form>
		<br>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>