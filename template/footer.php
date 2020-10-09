		<!-- FOOTER -->
		<footer id="main-footer" class="py-4">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<small>
							<?php
								$tanggal = new DateTime('now');
								echo "Copyright © ".$tanggal->format("Y")." PT. Nashta Global Utama";
							?>
						</small>
					</div>
				</div>
			</div>
		</footer>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>