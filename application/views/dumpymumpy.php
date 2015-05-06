

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
===============================================================================================

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>4 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php base_url(); ?>assets2/css/bootstrap.min.css" rel="stylesheet">

   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Page Heading
                    <small>Secondary Text</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
=============================================================================================
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>InMarket - Inventaris Minimarket</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!--style>
      #msgBox {
        position: fixed;
        width: 500px;
        left: 40%;
      }

      .form-error p {
        display: inline;
        color: red;
      }
    </style-->
</head>

<?php
        echo base_url();
    ?>

<body>
    <div id="wrapper">
      
        <div id="page-wrapper">


            <?php if ($alertMsg != null) { ?>
                <div id="msgBox" class="alert alert-<?php echo $alertClass; ?>">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <?php echo $alertMsg; ?>
                </div>
            <?php } ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tambah Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>beranda">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Tambah Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">


                        <form name="form" role="form" enctype= "multipart/form-data" method="post" action="/kelola_barang/submitTambah" onsubmit="return validateForm()">
                            
                            <div class="form-group">
                                <label>Nama Barang <span class="form-error" id="namaerror"><?php echo form_error('nama'); ?></span></label>
                                <input class="form-control" name="nama">
                            </div>

                            

                            <div class="row">
                              <div class="col-lg-6">
                                <button type="reset" class="btn btn-danger">Ulang<i></i></button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                            </div>
                        </form>

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
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <?php if ($alertMsg != null) { ?>
      <script>
        $('#msgBox').delay(2000).fadeOut(1000);
      </script>
    <?php } ?>

    <script>
    function validateForm() {
        var form = document.forms['form'];
        var valid = true;
        if (form['nama'].value == null || form['nama'].value == '') {
            valid = false;
            $('#namaerror').text('Anda belum mengisi nama');
        }
        if (form['jumlah'].value == null || form['jumlah'].value == '') {
            valid = false;
            $('#jumlaherror').text('Anda belum mengisi jumlah');
        }
        if (form['harga_beli'].value == null || form['harga_beli'].value == '') {
            valid = false;
            $('#hargabelierror').text('Anda belum mengisi harga beli');
        }
        if (form['harga_jual'].value == null || form['harga_jual'].value == '') {
            valid = false;
            $('#hargajualerro').text('Anda belum mengisi harga jual');
        }
        return valid;
    }
    </script>

</body>

</html>
================================================================================
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sukses</title>
</head>
<body>

<div id="container">
  <div id="body">
    <h3>Sukses</h3>
  </div>

  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
===================================================================================================
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homepage | hoaxCA</title>
</head>
<body>

<div id="container">
  <div id="body">
    <h3>Homepage</h3>
    <a href="certificate_request">Request Certificate Signing</a>
    <a href="certificate_request/view">View My Certificate Request</a>
  </div>


  <p class="footer"><a href="user/logout">logout</a></p>
</div>

</body>
</html>
================================================================================
<form method="POST" action="certificate_request/request.html">
      <input type="text" style="width:300px;" name="domain" placeholder="Domain" />
      <input type="text" style="width:300px;" name="namaOrganisasi" placeholder="Nama Organisasi" />
      <input type="text" style="width:300px;" name="unitOrganisasi" placeholder="Unit Organisasi" />
      <input type="text" style="width:300px;" name="kota" placeholder="Kota Lokasi Organisasi" />
      <input type="text" style="width:300px;" name="prov" placeholder="Provinsi Lokasi Organisasi" />
      <button type="submit">Request</button>
    </form>

===================================================================================
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
=========================================================================================================
csrscript

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
================================================================================================
ADMINPAGE

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homepage | hoaxCA</title>
</head>
<body>

<div id="container">
  <div id="body">
    <h3>Welcome, Admin</h3>
    <a href="certificate_request">Tes123</a>
    <a href="admin/viewCSR">View Certificate Request</a>
  </div>


  <p class="footer"><a href="user/logout">logout</a></p>
</div>

</body>
</html>
==============================================================================================
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
      <tr><td>ID</td> <td>Nama Organisasi</td> <td>Unit Organisasi</td> <td>kota</td> <td>Provinsi</td> <td> Setuju </td><td> Tidak </td></tr>
      
      <?php
        foreach ($certreq as $row)
        {
          $ID = $row['ID'];
          $namaOrganisasi = $row['namaOrganisasi'];
          $unitOrganisasi = $row['unitOrganisasi'];
          $kota = $row['kota'];
          $prov = $row['prov'];
          //$validTime = $row['validTime'];

          echo "<tr>";
          
          echo "<td>hoaxCA/req/$ID</td>";
          echo "<td>$namaOrganisasi</td>";
          echo "<td>$unitOrganisasi</td>";
          echo "<td>$kota</td>";
          echo "<td>$prov</td>";
          //echo "<td>$validTime</td>";
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