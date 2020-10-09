<?php 
require 'init.php';


$DB = DB::getInstance();
if (!empty($_GET)) {
	$tabelMahasiswa = $DB->getLike('mahasiswa','Nama','%'.Input::get('search')."%");
} else {
	$tabelMahasiswa = $DB->get('mahasiswa');
}
include 'template/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="py-4 d-flex justify-content-end align-items-center">
				<h1 class="h2 mr-auto">
					<a class="text-info" href="tampil_mahasiswa.php">Tabel Mahasiswa</a>
				</h1>
				<a href="tambah_mahasiswa.php" class="btn btn-primary">Tambah Mahasiswa</a>
				<form class="w-25 ml-4" method="get">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="search" name="search">
						<div class="input-group-append">
							<input type="submit" class="btn btn-outline-secondary" value="Cari">
						</div>
					</div>
				</form>
			</div>
			<?php
			if (!empty($tabelMahasiswa)) :
			?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Mahasiswa</th>
							<th>Alamat</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($tabelMahasiswa as $mhs) {
							echo "<tr>";
							echo "<th>{$mhs->ID}</th>";
							echo "<th>{$mhs->Nama}</th>";
							echo "<td>{$mhs->Alamat}</td>";
							echo "<td>";
							echo "<a href=\"edit_mahasiswa.php?id_mahasiswa={$mhs->ID}\"class=\"btn btn-info\">Edit</a> ";
							echo "<a href=\"hapus_mahasiswa.php?id_mahasiswa={$mhs->ID}\"class=\"btn btn-danger\">Hapus</a>";
							echo "</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			<?php
			endif;
			?>
		</div>
	</div>
</div>
<?php
include 'template/footer.php';
?>