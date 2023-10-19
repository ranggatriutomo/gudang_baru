<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="logo.png">
  <title>Inventory| Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- sweetalert -->
  <link rel="stylesheet" href="alert/css/sweetalert.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
    <b> PT. Delta Anugerah Bahari Nusantara</b>
  </div>
  <div class="register-box-body">

    <!-- <b><p class="login-box-msg">Register</p> -->

    <form action="proses_simpan_registrasi.php" method="post">
         <div class="form-group">
          <label>Fullname *</label>
          <div class="input-group">
           <input type="text" name="nama" value="" required="required" class="form-control">
           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          </div>
        </div>  
        <div class="form-group">
          <label>Username *</label>
          <div class="input-group">
           <input type="text" name="username" required="required" value="" class="form-control">
           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          </div>
        </div>   
        <div class="form-group">
          <label>Password *</label>
          <div class="input-group">
           <input type="password" name="password" required="required" value="" class="form-control">
           <input type="hidden" name="level" value="wait" class="form-control">
           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          </div>
        </div>     
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div><br><br>
        <!-- /.col -->
        </form>
        <div class="col-xs-12">
          <a href= "last_index.php" >
            <button type="button" class="btn btn-warning btn-block btn-flat"><span class="fa fa-undo">&nbsp;&nbsp;&nbsp;</span>Back To Login</button>
          </a>
        </div><br><br>
      </div>
    


    
  </div>
<!-- /.login-box -->

<!--Scripts sweetalert-->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

</body>
</html>
