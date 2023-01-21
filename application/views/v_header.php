<!DOCTYPE html>
<html lang="en">

<head>
	<title>Arrum Furniture</title>
	<link rel="icon" type="image/png" href="<?= base_url('assets/arrum_logo.png'); ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/animate.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/magnific-popup.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/aos.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/ionicons.min.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/jquery.timepicker.css">


	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/flaticon.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/icomoon.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/'); ?>css/style.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="goto-here">
	<div class="py-1 bg-primary">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
									class="icon-phone2"></span></div>
							<span class="text">021-12332211</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
									class="icon-paper-plane"></span></div>
							<span class="text">customer@arrumfurniture.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">Pesanan Cepat, Transaksi Mudah &amp; Harga murah</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Arrum Furniture</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
            <!-- itung keranjang -->
            <?php 
			$user_id = $this->session->userdata('id');
            $data=$this->db->query('select sum(jumlah) as total from keranjang where status_bayar=0 and user_id='.$user_id)->row_array();
            ?>
            <!-- end itung -->
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="<?= base_url('Home'); ?>" class="nav-link">Beranda</a></li>
					<li class="nav-item"><a href="<?= base_url('Belanja'); ?>" class="nav-link">Produk Kami</a></li>
					<li class="nav-item"><a href="<?= base_url('Status'); ?>" class="nav-link">Cek Status &amp; konfirmasi</a></li>
					<li class="nav-item active"><a href="<?= base_url('About'); ?>" class="nav-link">Tentang</a></li>
					<?php if($this->session->userdata("login") ==1){ ?>
					<li class="nav-item active"><a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">Dashboard</a></li>
					<?php }else{ ?>
					<li class="nav-item active"><a href="<?= base_url('Auth'); ?>" class="nav-link">Login</a></li>
					<?php } ?>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Shop</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="<?= base_url('Belanja'); ?>">Pesan</a>
							<a class="dropdown-item" href="wishlist.html">Wishlist</a>
							<a class="dropdown-item" href="product-single.html">Single Product</a>
							<a class="dropdown-item" href="cart.html">Cart</a>
							<a class="dropdown-item" href="checkout.html">Checkout</a>
						</div>
					</li> -->
					<!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
					<li class="nav-item cta cta-colored"><a href="<?= base_url('Keranjang'); ?>" class="nav-link"><span
								class="icon-shopping_cart"></span>[<?= $data['total']; ?>]</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
