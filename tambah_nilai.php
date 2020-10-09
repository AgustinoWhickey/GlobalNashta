<?php 
require 'init.php';
$DB = DB::getInstance();

$nilai = new Nilai();
$mahasiswa = $DB->get('mahasiswa');
$matakuliah = $DB->get('mata_kuliah');
if (!empty($_POST)) {
	$pesanError = $nilai->validasi($_POST);
	if (empty($pesanError)) {
		$nilai->insert();
		header('Location:tampil_nilai.php');
	}
}
include 'template/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-6 py-4">
			<h1 class="h2 mr-auto"><a class="text-info" href="tambah_nilai.php">Tambah Nilai</a></h1>
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
					<label for="nama_mahasiswa">Mahasiswa</label>
					<select type="text" class="form-control" name="nama_mahasiswa">
						<?php
						foreach ($mahasiswa as $mhs) {
							echo "<option value='".$mhs->ID."'>".$mhs->Nama."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="mata_kuliah">Mata Kuliah</label>
					<select type="text" class="form-control" name="mata_kuliah">
						<?php
						foreach ($matakuliah as $mk) {
							echo "<option value='".$mk->ID."'>".$mk->Nama_mata_kuliah."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="nilai">Nilai</label>
					<input type="text" class="form-control" name="nilai">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" class="form-control" name="keterangan">
				</div>
				<input type="submit" class="btn btn-primary" value="Tambah">
			</form>
		</div>
	</div>
</div>
<?php
include 'template/footer.php';
?>