<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>Aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>Aset/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">

    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body ">
        <?php 
          echo $this->session->flashdata('message');
          
        ?>

        <form action="<?php echo base_url() ?>Registration/actionLogin" method="post">
          <center>
            <h4 class="mt-2">BiologiKu</h4>
          </center>

          <center><img src="<?php echo base_url() ?>Aset/logogame.png" width="100" height="100" alt=""></center><br>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="userName" class="form-control" name="username" placeholder="Username"
                required="required" autofocus="autofocus">
              <label for="useraName">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
                required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>

          <button type="submit" class="btn btn-info btn-block mb-5 mt-3">Login</button>
        </form>
       
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>Aset/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>Aset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>Aset/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>