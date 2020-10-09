<?php 
require 'init.php';

$mahasiswa = new Mahasiswa();
if (!empty($_POST)) {
	$pesanError = $mahasiswa->validasi($_POST);
	if (empty($pesanError)) {
		$mahasiswa->insert();
		header('Location:index.php');
	}
}
include 'template/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-6 py-4">
			<h1 class="h2 mr-auto"><a class="text-info" href="tambah_mahasiswa.php">Tambah Mahasiswa</a></h1>
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
					<label for="nama_mahasiswa">Nama Mahasiswa</label>
					<input type="text" class="form-control" name="nama_mahasiswa" value="<?php echo $mahasiswa->getItem('Nama'); ?>">
				</div>
				<div class="form-group">
					<label for="alamat_mahasiswa">Alamat</label>
					<input type="text" class="form-control" name="alamat_mahasiswa" value="<?php echo $mahasiswa->getItem('Alamat'); ?>">
				</div>
				<input type="submit" class="btn btn-primary" value="Tambah">
			</form>
		</div>
	</div>
</div>
<?php
include 'template/footer.php';
?>