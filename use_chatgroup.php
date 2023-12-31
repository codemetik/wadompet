<?php 
session_start();
include "koneksi.php";


$query = mysqli_query($koneksi, "select * from user_agent x inner join tb_user y on y.id_user = x.id_user 
inner join dompet_user z on z.id_user = y.id_user where name_user_agent = '".$_SESSION['agent']."' and x.id_user = '".$_SESSION['id_user']."' group by x.id_user asc");
$user = mysqli_fetch_array($query);
$cek = mysqli_num_rows($query);
if (!isset($_SESSION['agent']) && !isset($_SESSION['id_user']) || isset($_SERVER['HTTP_USER_AGENT']) != $user['name_user_agent']) {
  echo "<script>document.location.href = 'login.php';</script>";
}

if ($cek > 0 ) {
  if ($user['id_level'] == '1') {
    $link = 'admin.php';
  }else if ($user['id_level'] == '2') {
    $link = 'anggota.php';
  }  
}else{
  $link = 'index.php';
}


function rupiah($angka){
  $hasil_rupiah = "Rp. " . number_format($angka, 2 ,',','.');
  return $hasil_rupiah;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Wadompet</title>
  <link rel="icon" href="dist/img/wallet.svg">

<!--   <link rel="stylesheet" type="text/css" href="dist/css/style.css"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Add the evo-calendar.css for styling -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css"/>

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<style type="text/css">
  .bg-nav{
    background-image: linear-gradient(#6495ED, #6495ED);
  }
  .bg-radian{
    background-image: linear-gradient(white, #6495ED);
  }
  .bg-foot{
    background-image: linear-gradient(#6495ED, #6495ED)
  }
  .bg-abu{
    background-color: #6495ED;
  }
  .text-abu{
    color: #6495ED;
  }
</style>

</head>
<body class="hold-transition layout-fixed layout-navbar-fixed layout-footer-fixed" >
<!--   onload="myFunction()" style="margin: 0;"
<div id="loader"></div> -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-nav navbar-primary elevation-1">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?= $link; ?>" class="btn elevation-1 img-circle">
          <i class="fas fa-angle-left text-dark"></i> <!-- <h6 class="text-primary">Saldo</h6> -->
        </a>
      </li>
      <li class="nav-item d-lg-inline-block">
        <h6><a href="anggota.php?page=profile" class="nav-link text-bold text-white"><?= $user['nama_lengkap']; ?></a></h6>
      </li>
    </ul>

    <!-- SEARCH FORM -->


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-radian text-bold text-white elevation-1">
    <!-- Brand Logo -->
    <a href="?page=home" class="brand-link">
      <img src="dist/img/wallet.svg" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8;" width="120" height="40">
      <span class="brand-text bold text-dark">Wadompet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content pt-4 pb-3">
      <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12" id="showchat">
          <!-- shochat -->
         
        </div>
      </div>


      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->



<div class="main-footer bg-dark">
   <form method="post" id="form-user">
    <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']; ?>">
    <div class="input-group">
      <input type="text" name="message" id="message" placeholder="Ketik pesan ..." class="form-control" required autofocus>
      <span class="input-group-append">
<!--         <input type="submit" name="kirim" id="kirim" class="btn btn-primary" value="Send" /> -->
        <button type="submit" name="kirim" id="kirim" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
      </span>
    </div>
  </form>
</div>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.js"></script>
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="dist/js/demo.js"></script> -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script> -->
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

<!-- PAGE SCRIPTS -->
<!-- <script src="dist/js/pages/dashboard2.js"></script> -->

<!-- Add jQuery library (required) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script> -->

<!-- Add the evo-calendar.js for.. obviously, functionality! -->


<!-- <script type="text/javascript">
  var myVar;
  function myFunction(){
    myVar = setTimeout(showPage, 1000);
  }

  function showPage(){
    document.getElementById('loader').style.display = "none";
  }
</script> -->
<!-- <script type="text/javascript">
  function autoScroll(){
    var konten = document.getElementById("msg");
    konten.scrollIntoView();
  }
</script> -->
<!-- <script type="text/javascript">

</script> -->
<script type="text/javascript">
  var scrollDown = function(){
    let chatBox = document.getElementById('showchat');
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  scrollDown();

$(document).ready(function(){
  $('#kirim').on('click', function(){
      var data = $('#form-user').serialize();
      var id_user = $('#id_user').val();
      var message = $('#message').val();
      if (message == "") return;
      $.ajax({
        method: "POST",
        url: 'anggota/proses/proses_chatGroup.php',
        data: { type: "insert", id_user:id_user, message:message },
        success: function(data){
          $('#showchat').append(data);
          scrollDown();
        }
        
      });
  });

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    function show() {
      $("#showchat").load("chat/showchat.php");
    }
    show();
    setInterval(show,1);
  });
</script>
</body>
</html>
