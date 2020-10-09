<?php 
require 'init.php';


$DB = DB::getInstance();
if (!empty($_GET)) {
	$tabelNilai = $DB->getLike('nilai','ID_mata_kuliah','%'.Input::get('search')."%");
} else {
	$tabelNilai = $DB->get('nilai');
}
include 'template/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="py-4 d-flex justify-content-end align-items-center">
				<h1 class="h2 mr-auto">
					<a class="text-info" href="tampil_nilai.php">Tabel Nilai</a>
				</h1>
				<a href="tambah_nilai.php" class="btn btn-primary">Tambah Nilai</a>
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
			if (!empty($tabelNilai)) :
			?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Mahasiswa</th>
							<th>Mata Kuliah</th>
							<th>Nilai</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($tabelNilai as $nilai) {
							echo "<tr>";
							echo "<th>{$nilai->ID_mahasiswa}</th>";
							echo "<th>{$nilai->ID_mata_kuliah}</th>";
							echo "<td>{$nilai->Nilai}</td>";
							echo "<td>";
							echo "<a href=\"edit_nilai.php?id_nilai={$nilai->id}\"class=\"btn btn-info\">Edit</a> ";
							echo "<a href=\"hapus_nilai.php?id_nilai={$nilai->id}\"class=\"btn btn-danger\">Hapus</a>";
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