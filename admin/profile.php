<div class="row">
   <div class="col-md-12">
  <!-- Widget: user widget style 1 -->
  <div class="card card-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-nav">
      <h3 class="widget-user-username"> <a href="" class="text-orange" data-toggle="modal" data-target="#modal-sm"><?= $show['nama_lengkap']; ?></a></h3>
      <h5 class="widget-user-desc"><?= $show['position']; ?></h5>
    </div>
    <div class="widget-user-image">
      <img class="img-circle elevation-2" src="dist/img/user1-128x128.jpg" alt="User Avatar" data-toggle="modal" data-target="#modal-profile">
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-4 border-right">
          <div class="description-block">
            <h5 class="description-header">Username</h5>
            <span class="description-text"><input class="text-center form-control" type="text" value="<?= $show['user']; ?>" readonly></span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 border-right">
          <div class="description-block">
            <h5 class="description-header">Password</h5>
            <span class="description-text"><input class="text-center form-control" type="password" value="<?= $show['pass']; ?>" readonly></span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">Email</h5>
            <span class="description-text"><?= $show['email']; ?></span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">Tempat & Tgl Lahir</h5>
            <span class="description-text"><?= $show['temp_lahir']. ", ". $show['tgl_lahir']; ?></span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">Alamat Lengkap</h5>
            <span class="description-text"><textarea class="form-control" readonly><?= $show['alamat_sekarang']; ?></textarea></span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <a href="#" class="btn elevation-2 btn-block" data-toggle="modal" data-target="#modal-sm-edit"><b><i class="fas fa-edit text-orange"></i> Edit Profile</b></a>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.widget-user -->
  </div>
  <!-- /.col -->
</div>

<!-- modal foto profile -->
      <div class="modal fade" id="modal-profile">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
            	<div class="card-body">
            	<div class="form-group mb-1">
                  <label for="img">Ubah foto profile</label>
                  <input type="file" id="img" class="form-control">
                </div>
            	</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save Change</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


<!-- modal nama -->
      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
            	<div class="card-body">
            	<div class="form-group mb-1">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" class="form-control" value="Bambang Prayogo">
                </div>
                <div class="form-group mb-1">
                  <label for="position">Position</label>
                  <input type="text" id="position" class="form-control" value="Ketua Kelas">
                </div>
            	</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save Change</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- modal edit -->
      <div class="modal fade" id="modal-sm-edit">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
            	<div class="card-body">
            	<div class="form-group mb-1">
                  <label for="username">Username</label>
                  <input type="text" id="username" class="form-control" value="Bambang Prayogo">
                </div>
                <div class="form-group mb-1">
                  <label for="password">Password</label>
                  <input type="password" id="password" class="form-control check" value="Ketuakelas">
                  <input type="checkbox" class="form-checkbox"> Show password
                </div>
                <div class="form-group mb-1">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control" value="prayogo@gmail.com">
                </div>
                <div class="form-group mb-1">
                  <label for="tlahir">Tempat & Tanggal Lahir</label>
                  <input type="text" id="tlahir" class="form-control" value="Pemalang">
                  <input type="date" id="tlahir" class="form-control" value="">
                </div>
                <!-- <div class="form-group mb-1">
                  <label for="tglahir">Tanggal Lahir</label>
                  <input type="date" id="tglahir" class="form-control" value="">
                </div> -->
                <div class="form-group mb-1">
                  <label for="alamat">Alamat Lengkap</label>
                  <textarea type="text" id="alamat" class="form-control">Ds. Tegalmlati, Kec. Petarukan, Kab. Pemalang
                  </textarea>
                </div>
            	</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save Change</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      