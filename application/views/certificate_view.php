<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>HoaxCA</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <style>
      #msgBox {
        position: fixed;
        width: 500px;
        left: 40%;
      }

      .form-error p {
        display: inline;
        color: red;
      }
    </style>
</head>

<body>

    <div id="wrapper">
      <?php
        $data['aktif'] = "tambahBarang";
        $this->load->view('navbar', $data);
      ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lihat CSR
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lihat CSR
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                   
                    		<div class="col-lg-12">
                    		<form method="POST" action="<?php echo base_url();?>download">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        
                                        <!-- <th>Tanggal</th>
                                        <th>ID Transaksi</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Total</th> -->

                                        <th>ID</th>
                                        <th>Domain</th>
                                        <th>Download Certificate</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php
        foreach ($certreq as $row)
        {
          if ($row == 0) {
            echo "<tr>";
            echo "Data Tidak Ada";
            echo "</tr>";
          }
          else{
            $ID = $row['ID'];
            $domain = $row['domain'];
            // $uploadable = $row['availableforsigning'];

            echo "<tr>";
            
            echo "<td>hoaxCA/cert/$ID</td>";
            echo "<td>$domain</td>";
            echo "<td><button name='download' type='submit' value='$ID' type='button' class='btn btn-primary'>Accept</button></td>";

            echo "</tr>";
          }
           
        } 
      ?>

                                  
                                </tbody>
                            </table>
                        </div>

                        

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset_url(); ?>assets/js/bootstrap.min.js"></script>

    

    

</body>

</html>




	}
	</style>

	<meta charset="utf-8">
	<title>View Certificate Request | hoaxCA</title>
</head>
<body>

<div id="container">
	<div id="body">
		<h3>My Certificate Request</h3>
		<table>
		  <tr><td>ID</td> <td>Nama Organisasi</td> <td>Unit Organisasi</td> <td>kota</td> <td>Provinsi</td> <td>Waktu Valid (dalam tahun)</td></tr>
		  
		  <?php
				foreach ($certreq as $row)
				{
					$ID = $row['ID'];
					$namaOrganisasi = $row['namaOrganisasi'];
					$unitOrganisasi = $row['unitOrganisasi'];
					$kota = $row['kota'];
					$prov = $row['prov'];
					$validTime = $row['validTime'];

					echo "<tr>";
					
					echo "<td>hoaxCA/req/$ID</td>";
					echo "<td>$namaOrganisasi</td>";
					echo "<td>$unitOrganisasi</td>";
					echo "<td>$kota</td>";
					echo "<td>$prov</td>";
					echo "<td>$validTime</td>";

					echo "</tr>";	
				}	
			?>
		</table>
	</div>


	<p class="footer"><a href= "<?php echo base_url();?>user/logout">logout</a></p>
</div>

</body>
</html>