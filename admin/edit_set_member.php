<?php 
if (isset($_GET['id'])) {
	$iduser = $_GET['id'];

	$query = mysqli_query($koneksi, "select * from tb_user where user = '$iduser'");
	$data = mysqli_fetch_array($query);

}
?>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-nav">
				<h3 class="card-title">Edit Data Anggota</h3>
			</div>
			<form action="" method="post">
			<div class="card-body">
				<div class="form-group">
					<label for="user">Username :</label>
					<input type="text" name="user" class="form-control form-control-sm" value="<?= $data['user']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="pass">Password :</label>
					<input type="password" name="pass" id="pass" class="form-control form-control-sm check" value="<?= $data['pass']; ?>">
					<input type="checkbox" class="form-checkbox"> Show
				</div>
				<div class="form-group">
					<label for="nama">Nama Lengkap :</label>
					<input type="text" name="nama" class="form-control form-control-sm" value="<?= $data['nama_lengkap']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Email">Email :</label>
					<input type="email" name="email" class="form-control form-control-sm" value="<?= $data['email']; ?>">
				</div>
				<div class="form-group">
					<label for="tgl_lahir">Tgl Lahir :</label>
					<input type="date" name="tgl_lahir" class="form-control form-control-sm" value="<?= $data['tgl_lahir']; ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat Sekarang :</label>
					<textarea type="text" name="alamat" class="form-control form-control-sm" value="<?= $data['alamat_sekarang']; ?>"><?= $data['alamat_sekarang']; ?></textarea>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group">
					<input type="submit" name="simpan-perubahan" class="form-control elevation-1 bg-orange text-bold" value="SIMPAN PERUBAHAN">
				</div>
				<div class="form-group">
					<a href="?page=set_members" class="btn btn-white elevation-1 text-primary">Kembali</a>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php 
if(isset($_POST['simpan-perubahan'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$alamat = $_POST['alamat'];

	$queryupdate = mysqli_query($koneksi, "update tb_user set pass = '".$password."', email = '".$email."', tgl_lahir = '".$tgl_lahir."', alamat_sekarang = '".$alamat."' where user = '$username'");
	if ($queryupdate) {
		echo "<script>
		alert('Perubahan berhasil disimpan.');
		document.location.href = '?page=edit_set_member&id=$username';
		</script>";
	}else{
		echo "<script>
		alert('Perubahan berhasil disimpan.');
		document.location.href = '?page=edit_set_member&id=$username';
		</script>";
	}
}
?>