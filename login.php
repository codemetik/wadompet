<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wadompet</title>
    <link rel="icon" href="dist/img/wallet.svg">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="dist/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .bg-radian{
    background-image: linear-gradient(white, #6495ED);
  }
  </style>
</head>
<body class="hold-transition login-page bg-secondary" onload="myFunction()" style="margin: 0;">
  <div id="loader"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="" class="text-white"><b>Wa</b>Dompet</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body bg-radian">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="Username" autofocus required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn bg-orange btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Loader -->
<script type="text/javascript">
  var myVar;
  function myFunction(){
    myVar = setTimeout(showPage, 1000);
  }

  function showPage(){
    document.getElementById('loader').style.display = "none";
  }
</script>
</body>
</html>

<?php 
include "koneksi.php";

if (isset($_POST['login'])) {
$user = $_POST['user'];
$pass = $_POST['pass'];

$querylvel = mysqli_query($koneksi, "select * from tb_user where user = '$user' and pass = '$pass'");

  if (mysqli_num_rows($querylvel) > 0 ) {
    $data = mysqli_fetch_array($querylvel);
    $id_user = $data['id_user'];
    $date = date('Y-m-d H:i:s');
    $name_agent = $_SERVER['HTTP_USER_AGENT'];
    $insert_os_agent = mysqli_query($koneksi, "insert into user_agent values('','".$data['id_user']."','$date','".$name_agent."')");

    function tb_user($koneksi, $id_user, $name_agent){
      $query = mysqli_query($koneksi, "select * from user_agent where id_user = '$id_user' and name_user_agent = '".$name_agent."' group by id_user asc");
      $data = mysqli_fetch_array($query);
      $isi = $data['name_user_agent'];
      return $isi;
    }
    $name_user_agent = tb_user($koneksi, $id_user, $name_agent);

    if ($data['id_level'] == '1') {
        $_SESSION['agent'] = $name_user_agent;
        $_SESSION['id_user'] = $data['id_user'];
        echo "<script>
        alert('ANDA LOGIN SEBAGAI ADMIN');
        document.location.href = 'admin.php';
        </script>";
    }else if($data['id_level'] == '2'){
      if ($insert_os_agent) {
        $_SESSION['agent'] = $name_user_agent;
        $_SESSION['id_user'] = $data['id_user'];
        echo "<script>
        alert('ANDA LOGIN SEBAGAI ANGGOTA');
        document.location.href = 'anggota.php';
        </script>";
      }
    }
  }
  
} //tutup  
?>
