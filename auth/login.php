<?php
require_once "../_config/config.php";
if (isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."';</script>";    
}else{
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | RumahSakit</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('plugins/iCheck/square/blue.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?=base_url();?>"><b>Login</b> RumahSakit</a>
        </div>
          <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                    <?php
                        if (isset($_POST['login'])) {
                            //melakukan pengecekan form
                            $user = trim(mysqli_real_escape_string($koneksi, $_POST['user']));
                            $pass = sha1(trim(mysqli_real_escape_string($koneksi, $_POST['pass'])));
                            $sql_login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user' AND password= '$pass' ") or die (mysqli_error($koneksi));
                            if (mysqli_num_rows($sql_login) > 0) {
                                $row_akun = mysqli_fetch_array($sql_login);
                                $_SESSION['user'] = $user;
                                $_SESSION['nama_user'] = $row_akun["nama_user"];
                                echo "<script>window.location='".base_url()."';</script>";
                            }else{?>
                                <div class="login-box-body">
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>Login gagal</strong>Username / Password salah                
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    ?>
                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="pass" class="form-control" placeholder="Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>
        </div>
    </div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url('bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?=base_url('plugins/iCheck/icheck.min.js');?>"></script>
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
<?php
}
?>