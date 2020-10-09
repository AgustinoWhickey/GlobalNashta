<?php 
require 'init.php';

if(empty(Input::get('id_mahasiswa'))) {
	die('Maaf halaman ini tidak bisa diakses langsung');
}
$mahasiswa = new Mahasiswa();
$mahasiswa->generate(Input::get('id_mahasiswa'));

if (!empty($_POST)) {
	$pesanError = $mahasiswa->validasi($_POST);
	if (empty($pesanError)) {
		$mahasiswa->update(Input::get('id_mahasiswa'));
		header('Location:index.php');
	}
}
include 'template/header.php';

echo "<pre>";
print_r($mahasiswa->getItem('id_mahasiswa'));
echo "</pre>";
?>
<!doctype html>
<div class="container">
	<div class="row">
		<div class="col-6 py-4">
			<h1 class="h2 mr-auto"><a class="text-info" href="edit_mahasiswa.php">Edit Mahasiswa</a></h1>
			<?php
			if (!empty($pesanError)):
			?>
			<div id="divPesanError">
				<div class="mx-auto">
					<div class="alert alert-danger" role="alert">
						<ul class="mb-0">
							<?php
							foreach ($pesanError as $pesan) {
								echo "<li>$pesan</li>";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<?php
			endif;
			?>
			<form method="post">
				<div class="form-group">
					<label for="id_mahasiswa">ID Mahasiswa</label>
					<input type="text" class="form-control" name="id_mahasiswa" disabled value="<?php echo $mahasiswa->getItem('ID'); ?>">
					<small class="d-block">*ID Mahasiswa tidak bisa diubah</small>
				</div>
				<div class="form-group">
					<label for="nama_mahasiswa">Nama Mahasiswa</label>
					<input type="text" class="form-control" name="nama_mahasiswa" value="<?php echo $mahasiswa->getItem('Nama'); ?>">
				</div>
				<div class="form-group">
					<label for="alamat_mahasiswa">Alamat</label>
					<input type="text" class="form-control" name="alamat_mahasiswa" value="<?php echo $mahasiswa->getItem('Alamat'); ?>">
				</div>
				<input type="submit" class="btn btn-primary" value="Update">
				<a href="tampil_mahasiswa.php" class="btn btn-secondary">Cancel</a>
			</form>
		</div>
	</div>
</div>
<?php
include 'template/footer.php';
?>