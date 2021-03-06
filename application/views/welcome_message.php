<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php base_url();?>assets/icon/ikon.ico">

    <title>hoaxCA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php base_url(); ?>assets/css/signin.css" rel="stylesheet">

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

      <form class="form-signin" action="user/login.html" method="post">
      <h2 align="center" class="form-signin-heading">Selamat Datang di HoaxCA</h2>
        <h2 class="form-signin-heading">Silahkan masukkan ID dan kata sandi</h2>
        <br /><br />
        <label for="inputID" class="sr-only">ID</label>
        <input type="username" name="username" id="inputID" class="form-control" placeholder="ID" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata sandi" required=""><br>
        <h1 align="center"><button class="btn btn-primary btn-lg" type="submit">Masuk</button>
        <a href="user/register.html" class="btn btn-lg btn-warning" role="button">Register</a></h1>
      </form>
      
      

    </div> <!-- /container -->


    <script src="<?php asset_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php asset_url(); ?>js/bootstrap.min.js"></script>

    <script src="<?php asset_url(); ?>js/plugins/bootbox.min.js"></script>  
</body>
</html>