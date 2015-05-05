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
		<p>Now just copy and paste this command into a terminal session on your server.</p>
		<textarea rows="5" cols="100">
			<?php echo $script;?>
		</textarea>
	</div>


	<p class="footer"><a href="user/logout">logout</a></p>
</div>

</body>
</html>