<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Request Certificate | hoaxCA</title>
</head>
<body>

<div id="container">
	<div id="body">
		<h3>Make a Certificate Signing Request here</h3>
		<form method="POST" action="certificate_request/request.html">
			<input type="text" style="width:300px;" name="domain" placeholder="Domain" />
			<input type="text" style="width:300px;" name="namaOrganisasi" placeholder="Nama Organisasi" />
			<input type="text" style="width:300px;" name="unitOrganisasi" placeholder="Unit Organisasi" />
			<input type="text" style="width:300px;" name="kota" placeholder="Kota Lokasi Organisasi" />
			<input type="text" style="width:300px;" name="prov" placeholder="Provinsi Lokasi Organisasi" />
			<button type="submit">Request</button>
		</form>

	</div>


	<p class="footer"><a href="user/logout">logout</a></p>
</div>

</body>
</html>