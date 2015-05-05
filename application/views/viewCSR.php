<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>

	<meta charset="utf-8">
	<title>View Certificate Request | hoaxCA</title>
</head>
<body>

<div id="container">
	<div id="body">
		<h3>My Certificate Request</h3>
		<form method="POST" action="accCSR">	
		<table>
		  <tr><td>ID</td> <td>Domain</td> <td>Nama Organisasi</td> <td>Unit Organisasi</td> <td>kota</td> <td>Provinsi</td> <td>Script</td></tr>
		  
		  <?php
				foreach ($certreq as $row)
				{
					$ID = $row['ID'];
					$domain = $row['domain'];
					$namaOrganisasi = $row['namaOrganisasi'];
					$unitOrganisasi = $row['unitOrganisasi'];
					$kota = $row['kota'];
					$prov = $row['prov'];
					$script = $row['script'];

					echo "<tr>";
					
					echo "<td>hoaxCA/req/$ID</td>";
					echo "<td>$domain</td>";
					echo "<td>$namaOrganisasi</td>";
					echo "<td>$unitOrganisasi</td>";
					echo "<td>$kota</td>";
					echo "<td>$prov</td>";
					echo "<td><textarea rows='5 cols='100'>$script</textarea></td>";
					echo "<td><button name='acc' type='submit' value='$ID'>Accept</button></td>";
					echo "<td><button name='dec' type='submit' value='$ID'>Decline</button></td>";

					echo "</tr>";	
				}	
			?>
		</table>
		</form>
	</div>


	<p class="footer"><a href= "<?php echo base_url();?>user/logout">logout</a></p>
</div>

</body>
</html>