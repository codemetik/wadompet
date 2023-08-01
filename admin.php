<?php 
session_start();
include "koneksi.php"; 

if (!isset($_SESSION['agent'])) {
  echo "<script>document.location.href = 'login.php';</script>";
}

$show_agent = mysqli_query($koneksi, "select * from user_agent x inner join tb_user y on y.id_user = x.id_user where name_user_agent = '".$_SESSION['agent']."' group by x.id_user asc");
$show = mysqli_fetch_array($show_agent);

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

  <link rel="stylesheet" type="text/css" href="dist/css/style.css">
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

  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Add the evo-calendar.css for styling -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css"/>

<!-- jquery untuk hide show chackbox -->
<script src="plugins/jquery/jquery.js"></script>
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" onload="myFunction()" style="margin: 0;">
  <div id="loader"></div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light bg-nav elevation-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="btn bg-white elevation-1 img-circle" data-widget="pushmenu">
          <i class="fas fa-user text-abu"></i> <!-- <h6 class="text-primary">Saldo</h6> -->
        </a>
      </li>
      <li class="nav-item d-lg-inline-block">
        <h4><a href="?page=profile" class="nav-link text-bold text-orange"><?= $show['user']; ?></a></h4>
      </li>
    </ul>

    <!-- SEARCH FORM -->


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar text-dark bg-danger text-bold elevation-1  bg-radian">
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-dark">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Inbox
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=chat_group" class="nav-link text-dark">
                  <i class="far fa-comments nav-icon"></i>
                  <p>Chat Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=chat_private" class="nav-link text-dark">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Message</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="?page=catatan" class="nav-link text-dark">
              <i class="nav-icon fas fa-book"></i>
              <p>Catatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-dark">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>



      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content pt-5 pb-5 mb-5">
      <div class="container-fluid">
        <!-- =========================================================== -->
            <?php 
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
              switch ($page) {
                case 'home':
                  include 'admin/home.php';
                  break;
                // case 'nabung':
                //   include 'admin/nabung.php';
                case 'request_tiket':
                  include 'admin/request_tiket.php';
                  break;
                case 'set_members':
                  include 'admin/set_members.php';
                  break;
                case 'profile':
                  include 'admin/profile.php';
                  break;
                case 'kas':
                  include "admin/kas.php";
                  break;
                case 'tabungan':
                  include "admin/tabungan.php";
                  break;
                case 'riwayat_tabungan':
                  include "admin/riwayat_tabungan.php";
                  break;
                case 'kas_masuk':
                  include "admin/kas_masuk.php";
                  break;
                case 'kas_keluar':
                  include "admin/kas_keluar.php";
                  break;
                case 'chat_group':
                  include "admin/chat_group.php";
                  break;
                case 'chat_private':
                  include "admin/chat_private.php";
                  break;
                case 'catatan':
                  include "admin/catatan.php";
                  break;
                  
                default:
                  include 'admin/home.php';
                  break;
              }
            }else{
              include 'admin/home.php';
            }

            if (isset($_GET['page']) == 'home') {
              if ($_GET['page'] != 'home') {
                $bga = 'bg-white';
              }else{
                $bga = 'bg-dark';
              }
            }
            if (isset($_GET['page']) == 'request_tiket') {
              if ($_GET['page'] != 'request_tiket') {
                $bgb = 'bg-white';
              }else{
                $bgb = 'bg-dark';
              }
            }
            if (isset($_GET['page']) == 'kas') {
              if ($_GET['page'] != 'kas') {
                $bgc = 'bg-white';
              }else{
                $bgc = 'bg-dark';
              }
            }
            if (isset($_GET['page']) == 'set_members') {
              if ($_GET['page'] != 'set_members') {
                $bgd = 'bg-white';
              }else{
                $bgd = 'bg-dark';
              }
            }

            ?>
        <!-- /.row -->

        <div class="row">
          <div class="col-sm-12">

          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer bg-foot">
    <div class="row">
      <div class="col-3"><a href="?page=home" title="Home">
        <div class="info-box <?= $bga; ?>">
          <span class="info-box-icon text-orange"><i class="fas fa-home"></i></span>
        </div>
        <!-- /.info-box -->
      </a>
      </div>
      <!-- /.col -->
      <div class="col-3"><a href="?page=request_tiket" title="Request tiket topUp">
        <div class="info-box <?= $bgb; ?>">
          <span class="info-box-icon text-orange"><i class="fas fa-file-invoice-dollar"></i></span>
        </div>
        <!-- /.info-box -->
      </a>
      </div>
      <!-- /.col -->
      <div class="col-3"><a href="?page=kas" title="Kas">
        <div class="info-box <?= $bgc; ?>">
          <span class="info-box-icon text-orange"><i class="fas fa-balance-scale"></i></span>
        </div>
        <!-- /.info-box -->
      </a>
      </div>
      <!-- /.col -->
      <div class="col-3"><a href="?page=set_members" title="Anggota">
        <div class="info-box <?= $bgd; ?>">
          <span class="info-box-icon text-orange"><i class="fas fa-users"></i></span>
          <!-- <i class="fa-solid fa-users-rectangle"></i> -->
        </div>
        <!-- /.info-box -->
      </a>
      </div>
      <!-- /.col -->
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>

<!-- Add jQuery library (required) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

<!-- Add the evo-calendar.js for.. obviously, functionality! -->
<script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/js/evo-calendar.min.js"></script>
<script>
  $('#calendar').evoCalendar({
    theme: 'Royal Navy'
});
</script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
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
