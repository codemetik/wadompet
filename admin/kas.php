<form action="" method="post">
<div class="row">
  <div class="col-sm-12">
    <div class="info-box callout callout-grey bg-nav">
      <div class="info-box-content form-group">
      	<label for="number">Nominal Topup</label>
      	<input type="number" id="number" name="number" class="form-control text-lg" placeholder="Rp.">
      </div>
     </div>
    <!-- /.info-box -->
  </div>
  <div class="col-sm-12">
    <div class="info-box callout callout-grey bg-nav">
      <div class="info-box-content form-group">
      	<label>Pilih Rekening Siswa</label>
      	  <select class="select2bs4" name="id" multiple="multiple" data-placeholder="Select a No Bank"
          style="width: 100%;">
          <?php 
          $query = mysqli_query($koneksi, "select * from tb_user");
          while ($data = mysqli_fetch_array($query)) { ?>
            <option value="<?= $data['id_user']; ?>"><?= $data['id_user'].", ".$data['user']; ?></option>
          <?php }
          ?>
		  </select>
      </div>
     </div>
    <!-- /.info-box -->
  </div>
  <div class="col-sm-12 text-center">
  	<button type="submit" name="topup" class="btn bg-light elevation-1 text-bold"><i class="fas fa-paper-plane text-orange"></i>  Kirim</button>
  </div>
</div>
</form>