<?php 
require 'init.php';

if(empty(Input::get('id_mahasiswa'))) {
	die('Maaf halaman ini tidak bisa diakses langsung');
}
$mahasiswa = new Mahasiswa();
$mahasiswa->generate(Input::get('id_mahasiswa'));

if (!empty($_POST)) {
	$mahasiswa->delete(Input::get('id_mahasiswa'));
	header('Location:index.php');
}
include 'template/header.php';
?>
<!doctype html>
<div class="container">
	<div class="row">
		<div class="col-6 mx-auto">
			<div id="modalHapus">
				<div class="modal-dialog modal-confirm">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Konfirmasi</h4>
						</div>
						<div class="modal-body">
							<p> Apakah anda yakin akan menghapus
							<b><?php echo $mahasiswa->getItem('name'); ?>?</b></p>
						</div>
						<div class="modal-footer">
							<a href="tampil_mahasiswa.php" class="btn btn-secondary">Tidak</a>
							<form method="post">
								<input type="hidden" name="id_barang" value="<?php echo $mahasiswa->getItem('ID'); ?>">
								<input type="submit" class="btn btn-danger" value="Ya">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'template/footer.php';
?>