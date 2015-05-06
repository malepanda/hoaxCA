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
        $this->load->view('navbaradmin', $data);
      ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Buat CSR
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Buat CSR
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">


                        <form name="form" role="form" enctype= "multipart/form-data" method="post" action="certificate_request/request.html" onsubmit="return validateForm()">


							<div class="form-group">
                                
                                <label for="inputDomain">Nama Domain</label>
                                <input type="domain" class="form-control" name="domain" id="inputDomain" placeholder="" required="" autofocus="">
                            </div>

                            <div class="form-group">
                                <label for="inputNama">Nama Organisasi</label>
                                <input type="namaOrganisasi" class="form-control" id="inputNama" placeholder="" required="" autofocus="" name="namaOrganisasi">
                            </div>

                            <div class="form-group">
                                <label for="inputUnit">Unit Organisasi</label>
                                <input type="unitOrganisasi" class="form-control" id="inputUnit" placeholder="" required="" autofocus="" name="unitOrganisasi">
                            </div>

                            <div class="form-group">
                                <label for="inputKota">Kota </label>
                                <input type="kota" class="form-control" id="inputKota" placeholder="" required="" autofocus="" name="kota">
                            </div>

                            <div class="form-group">
                                <label for="inputProvinsi">Provinsi<span class="form-error" id="provinsierror"></span></label>
                                <input type="prov" class="form-control" id="inputProv" placeholder="" required="" autofocus="" name="prov">
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
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset_url(); ?>assets/js/bootstrap.min.js"></script>

    

    <script>
    function validateForm() {
        var form = document.forms['form'];
        var valid = true;
        if (form['domain'].value == null || form['domain'].value == '') {
            valid = false;
            $('#domainerror').text('Anda belum mengisi Domain');
        }
        if (form['namaOrganisasi'].value == null || form['namaOrganisasi'].value == '') {
            valid = false;
            $('#namaorgerror').text('Anda belum mengisi Nama Organisasi');
        }
        if (form['unitOrganisasi'].value == null || form['unitOrganisasi'].value == '') {
            valid = false;
            $('#unitorgerror').text('Anda belum mengisi harga jual');
        }
        if (form['kota'].value == null || form['kota'].value == '') {
            valid = false;
            $('#kotaerror').text('Anda belum mengisi harga beli');
        }
        if (form['prov'].value == null || form['prov'].value == '') {
            valid = false;
            $('#provinsierror').text('Anda belum mengisi harga jual');
        }

        return valid;
    }
    </script>

</body>

</html>








