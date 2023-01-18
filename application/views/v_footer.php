<footer class="ftco-footer ftco-section">
	<div class="container">
		<div class="row">
			<div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
				</a>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Arrum Furniture</h2>
					<p>Arrum Furniture menyediakan produk furnituree yang berkualitas dan bergaransi dengan harga yang cukup terjangkau. Kami mengerti akan kebutuhan customer kami sehingga kami ada untuk memenuhi kebutuhan customer kami.</p>
					<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
						<!-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li> -->
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Menu</h2>
					<ul class="list-unstyled">
						<li><a href="<?= base_url('Home'); ?>" class="py-2 d-block">Beranda</a></li>
						<li><a href="<?= base_url('Belanja'); ?>" class="py-2 d-block">Produk  Kami</a></li>
						<li><a href="<?= base_url('Status'); ?>" class="py-2 d-block">Cek Status</a></li>
						<li><a href="<?= base_url('About'); ?>" class="py-2 d-block">Tentang</a></li>
					</ul>
				</div>
			</div>
			<!-- <div class="col-md-4">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Help</h2>
					<div class="d-flex">
						<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
							<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
							<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
							<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
							<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
						</ul>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">FAQs</a></li>
							<li><a href="#" class="py-2 d-block">Contact</a></li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Anda memiliki pertanyaan?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon icon-map-marker"></span><span class="text">Jl. Raya serang no 324 Kabupaten Tangerang-BAnten</span></li>
							<li><a href="https://api.whatsapp.com/send?phone=62822131443322"><span class="icon icon-whatsapp"></span><span class="text">0822131443322</span></a></li>
							<li><a href="mailto:customer@arrumfurniture.com"><span class="icon icon-envelope"></span><span
										class="text">customer@arrumfurniture.com</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">

				<p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());

					</script> All rights reserved | This template is made with <i class="icon-heart color-danger"
						aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
			stroke="#F96D00" /></svg></div>


<script src="<?= base_url('assets/template/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/jquery.easing.1.3.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/jquery.stellar.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/aos.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

<script src="<?= base_url('assets/template/'); ?>js/main.js"></script>
<script>
	<?= $this->session->flashdata("msg"); ?>
	
</script>
</body>

</html>
