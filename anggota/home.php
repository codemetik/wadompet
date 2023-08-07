<?php 
$sqlkas = mysqli_query($koneksi, "select * from uang_kas");
$jmlkas = mysqli_fetch_array($sqlkas);

?>
<!-- =========================================================== -->
<div class="row">
  <div class="col-md-3 col-sm-6 col-12"><a href="use_chatgroup.php" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="far fa-comments"></i></span>

      <div class="info-box-content">
        <div class="direct-chat-msg">
          <div class="direct-chat text-sm text-left" id="showone">
            <!-- show limit 1 -->
          </div>  
        </div>  
        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          Chat group
        </span> 
      </div>
     </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="far fa-bell"></i></span>

      <div class="info-box-content">
        <!-- <span class="info-box-number">Ucapkan Selamat!</span> -->
        <div class="direct-chat-msg">
          <div class="direct-chat text-left" id="notifcat">
            <!-- show limit 1 -->
          </div>  
        </div> 
        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          <i class="fas fa-bell"></i> Notifikasi
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12"><a href="?page=kas_user" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="fa fa-balance-scale"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">KAS Saat ini</span>
        <span class="info-box-number"><?= rupiah($jmlkas['total_kas']); ?></span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
          Terakhir/ 21.07.2023
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12"><a href="?page=sendsaldo" class="text-dark">
    <div class="info-box callout callout-grey">
      <span class="info-box-icon text-orange elevation-1"><i class="fas fa-paper-plane"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kirim Uang</span>
        <span class="info-box-number">Saldo</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </a>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->