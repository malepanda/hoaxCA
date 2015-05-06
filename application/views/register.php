<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>hoaxCA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .alert {
        max-width: 540px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <div class="container">

      <?php
        if (isset($alert_msg)) {
      ?>
        <div class="alert <?php echo $alert_class; ?>">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <?php echo $alert_msg; ?>
        </div>
      <?php
        }
      ?>

      <form class="form-signin" action="regist.html" method="post">
        <h2 align="center" class="form-signin-heading">Silahkan Mengisi Data untuk Registrasi</h2>
        <br /><br />
        <label for="inputNama" class="sr-only">Nama Lengkap</label>
        <input type="nama" name="nama" id="inputNama" class="form-control" placeholder="Nama Lengkap" required="" autofocus="">
        <label for="inputAlamat" class="sr-only">Alamat</label>
        <input type="alamat" name="alamat" id="inputAlamat" class="form-control" placeholder="Alamat Lengkap" required="" autofocus="">
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
        <label for="inputHP" class="sr-only">ID</label>
        <input type="nokontak" name="nokontak" id="inputHP" class="form-control" placeholder="Nomor HP" required="" autofocus=""><br>
        <label for="inputID" class="sr-only">ID</label>
        <input type="username" name="username" id="inputID" class="form-control" placeholder="Username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata sandi" required="">
        
        <button class="btn btn-primary btn-block" type="submit">Daftar</button>
        
      </form>
      
      

    </div> <!-- /container -->


    <script src="<?php asset_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php asset_url(); ?>js/bootstrap.min.js"></script>

    <script src="<?php asset_url(); ?>js/plugins/bootbox.min.js"></script>  
</body>
</html>
