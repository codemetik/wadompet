<a href="#" class="btn btn-primary float-right " data-toggle="modal" data-target="#modal-default">
  <i class="fas fa-plus"></i>
</a>

<div class="row">
  <div class="col-sm-12">
      <?php 
      $queryct = mysqli_query($koneksi, "select * from catatan group by id_catatan desc");
      
      while($datact = mysqli_fetch_array($queryct)){ ?>
         <!-- Message. Default to the left -->
    <a href="" data-toggle="modal" data-target="#modal<?= $datact['id_catatan']; ?>">
      <div class="direct-chat-msg left msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-timestamp float-left"><?= $datact['tgl_waktu']." [".$datact['id_catatan']."]"; ?></span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="dist/img/avatar5.png" alt="Message User Image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          <?= $datact['isi']; ?>
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
    </a>
    <!-- modal-id_catatan -->
    <div class="modal fade" id="modal<?= $datact['id_catatan']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">No : <?= $datact['id_catatan']; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <a href="?page=catatan&upload=<?= $datact['isi']; ?>" class="btn btn-sm btn-primary mb-1" onclick="return confirm('Anda akan mengupload chat ini ke halaman anggota');">Upload teks ke halaman anggota</a><br>
              <a href="?page=catatan&delete=<?= $datact['id_catatan']; ?>" class="btn btn-sm btn-primary" onclick="return confirm('Chat ini akan dihapus. Anda yakin?');">Hapus catatan</a>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
      <?php }
      ?>
  </div>
</div>
<!-- modal input catatan -->
  <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content"><form action="" method="post">
      <div class="modal-body">
        <div class="form-group">
          <textarea class="form-control" name="isi" placeholder="Tulis catatan ..." required></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div></form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 

if (isset($_POST['simpan'])) {
  $isi = $_POST['isi'];
  $date = date('Y-m-d H:i:s');

  $querycat = mysqli_query($koneksi, "insert into catatan values('', '$isi','$date')");

  if ($querycat) {
      echo "<script>
      document.location.href = '?page=catatan';
      </script>";
  }
}

if (isset($_GET['upload'])) {
  $upload = $_GET['upload'];
  $query = mysqli_query($koneksi, "update notifikasi_catatan set isi_chat = '$upload' where id_notifcat = '1'");
  if ($query) {
    echo "<script>
    document.location.href = '?page=catatan';
    </script>"; 
  }
}else if(isset($_GET['delete'])){
  $delete = $_GET['delete'];
  $query = mysqli_query($koneksi, "delete from catatan where id_catatan = '$delete'");
  if ($query) {
      echo "<script>
      document.location.href = '?page=catatan';
      </script>"; 
  }
}
?>