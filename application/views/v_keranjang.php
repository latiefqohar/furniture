<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/template/'); ?>images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
				<h1 class="mb-0 bread">My Cart</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
	<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>Product name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $subtotal=0;
                                foreach($keranjang as $row){ ?>
							<form action="<?= base_url('Keranjang/update_qty'); ?>" method="post">
							<input type="hidden" name="id_keranjang" value="<?= $row->id; ?>">
								<tr class="text-center">
									<td class="product-remove"><a
											href="<?= base_url('Keranjang/hapus_isi/').$row->id; ?>"><span
												class="ion-ios-close"></span></a></td>

									<td class="image-prod">
										<div class="img"
											style="background-image:url(<?= base_url('uploads/'.$row->foto); ?>"></div>
									</td>

									<td class="product-name">
										<h3><?= $row->nama; ?></h3>
										<p><?= $row->deskripsi; ?></p>
									</td>

									<td class="price">Rp. <?= number_format($row->harga,2); ?></td>

									<td class="quantity">
										<div class="input-group mb-3">
											<input type="number" name="quantity" id="qty_<?= $row->id ?>"
												class="quantity form-control input-number" value="<?= $row->jumlah; ?>"
												min="1" max="100" onkeyup="hitung_harga(<?= $row->id ?>)" onchange="hitung_harga(<?= $row->id ?>)">
											<input type="hidden" value="<?= $row->harga; ?>" id="harga_<?= $row->id ?>">
										</div>
									</td>
									<?php 
                                $total=$row->harga * $row->jumlah;  
                                $subtotal+=$total;
                                
                                ?>
									<td class="total" id="total_harga_<?= $row->id ?>">Rp.
										<?= number_format($total,2); ?></td>
									<td><button class="btn btn-warning" id="btn_<?= $row->id ?>" disabled>update</button></td>
								</tr><!-- END TR-->
							</form>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Kode Kupon</h3>
					<p>Masukkan kode kupon yang anda miliki</p>
					<form action="<?= base_url('Keranjang/pakai_kupon'); ?>" method="post" class="info">
						<div class="form-group">
							<label for="">Kode Kupon</label>
							<input type="text" name="kupon" class="form-control text-left px-3" placeholder="" required>
						</div>
				</div>
				<p><button class="btn btn-primary py-3 px-4">Pakai Kupon</button></p>
				</form>
			</div>

			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<!-- <div class="cart-total mb-3">
					<h3>Estimate shipping and tax</h3>
					<p>Enter your destination to get a shipping estimate</p>
					<form action="<?= base_url('Keranjang/estimasi_ongkir'); ?>" method="post">
						<div class="form-group">
							<label for="">Country</label>
							<input type="text" class="form-control text-left px-3" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="country">State/Province</label>
							<input type="text" class="form-control text-left px-3" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="country">Zip/Postal Code</label>
							<input type="text" class="form-control text-left px-3" placeholder="" required>
						</div>
				</div>
				<p><button class="btn btn-primary py-3 px-4">Estimate</button></p> -->
			</div>
			</form>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>Rp. <?= number_format($subtotal,2); ?></span>
					</p>
					<p class="d-flex">
						<span>Biaya kirim</span>
						<span>Rp. <?= number_format(@$ongkir['ongkir'],2); ?></span>
					</p>
					<p class="d-flex">
						<span>Diskon</span>
						<span>Rp. <?= number_format(@$ongkir['diskon'],2); ?></span>
					</p>
					<hr>
					<?php $total_keseluruhan=$subtotal+@$ongkir['ongkir']-@$ongkir['diskon']; ?>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>Rp. <?= number_format($total_keseluruhan); ?></span>
					</p>
				</div>
				<p><a href="<?= base_url('Checkout'); ?>" class="btn btn-primary py-3 px-4">Proses Selanjutnya</a></p>
			</div>
		</div>
	</div>
</section>

<script>
	function hitung_harga(id){
		var qty = document.getElementById("qty_"+id).value;
		var harga = document.getElementById("harga_"+id).value;
		var total_harga = qty*harga;
		document.getElementById("total_harga_"+id).innerHTML = total_harga;
		document.getElementById("btn_"+id).disabled = false;
	}

</script>
