<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url('assets/template/')?>images/bg_3.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
        <div class="row justify-content-center">
            <h1>Kode Pesanan <b><?= $transaksi['id']; ?></b></h1>
        </div>
		<div class="row justify-content-center">
			<div class="col-xl-4">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							<p class="d-flex">
								<span>Subtotal</span>
                                <span>Rp. <?= number_format($transaksi['subtotal'],2); ?></span>
							</p>
							<p class="d-flex">
								<span>Biaya Kirim</span>
                                <span>Rp. <?= number_format($transaksi['ongkir'],2); ?></span>
							</p>
							<p class="d-flex">
								<span>Diskon</span>
                                <span>Rp. <?= number_format($transaksi['diskon'],2); ?></span>
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
                                <span>Rp.  <?= number_format($transaksi['total'],2); ?></span>
							</p>
						</div>
                    </div>
                    </form>
				</div>
            </div> <!-- .col-md-8 -->
            <div class="col-xl-4">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Pembayaran Melalui</h3>
							<p class="d-flex">
								<span><img src="<?= base_url(); ?>assets/template/images/bca.jpg" alt="" height=20px></span>
                                <span>02322111</span>
							</p>
							<p class="d-flex">
							<span><img src="<?= base_url(); ?>assets/template/images/bni.png" alt="" height=20px></span>
                                <span>02322111</span>
                            </p>
                            <hr>
                            <h5>An <span style="color:blue;">Arrum Furniture</span> </h5>
                            <hr>
							<p class="d-flex">
								<h3>Total Yang Harus Dibayarkan</h3>
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
                                <span><b>Rp.  <?= number_format($transaksi['total'],2); ?></b></span>
							</p>
						</div>
                    </div>
                    </form>
				</div>
			</div> <!-- .col-md-8 -->
			<div class="col-xl-3">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Status</h3>
							<div class="alert alert-primary" role="alert">
							<?php if($transaksi['status'] == 0 && $transaksi['foto'] != NULL ){ ?>
								Menunggu Verifikasi
							<?php } elseif($transaksi['status']==0){ ?> 
								Menunggu Pembayaran
							<?php } elseif($transaksi['status']==1){ ?> 
								Terverifikasi
							<?php } elseif($transaksi['status']==2){ ?> 
								Sedang di proses
							<?php } elseif($transaksi['status']==3){ ?> 
								Dikirim <?= $transaksi['waktu']; ?>
							 <?php } elseif($transaksi['status']==4){ ?> 
								Diterima <?= $transaksi['waktu']; ?>
							 <?php } ?>
							</div>
							<hr>
							<h3 class="billing-heading mb-4">Bukti Pembayaran</h3>
							<?php
								if ($transaksi['pembayaran']=="transfer") {
									if($transaksi['foto'] == NULL ){ ?>
										<img src="<?= base_url('assets/template/images/noimg.png'); ?>" alt="" style="width:200px;height:170px">
									<?php }else{ ?>
										<img src="<?= base_url('uploads/'.$transaksi['foto']); ?>" alt="" style="width:200px;height:170px">
								<?php } 
								if ($transaksi['foto'] == NULL) { ?>
								<form action="<?= base_url('Status/uploadBukti'); ?>"  method="post" enctype="multipart/form-data">
									<input type="file" class="mt-2 " name="foto">
									<input type="hidden" value="<?= $transaksi['id']; ?>" name="id">
									<button type="submit"  class="btn btn-primary mt-2">Upload</button>
								</form>
								<?php } 
							 }else{
								echo $invoice;
							} ?>
							<?php if ($transaksi['status'] == 3) { ?>
								<br><br>
							 	<a href="<?= base_url('Checkout/terima/'.$transaksi['id']); ?>" class="btn btn-success">Konfirmasi pesanan diterima</a>
							<?php } ?>
							 
						</div>
                    </div>
                    </form>
				</div>
			</div> <!-- .col-md-8 -->
        </div>
        <div class="row justify-content-center">
			<div class="col-xl-10">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
                            <h2 class="billing-heading mb-4">Detail pesanan</h2>
                            <?php foreach($detail as $row){ ?>
                                <p class="d-flex">
                                    <span><?= $row->nama; ?></span>
                                    <span><?= $row->jumlah; ?></span>
                                    <span>Rp. <?= number_format($row->harga,2); ?></span>
                                </p>
                            <?php } ?>
							
						</div>
                    </div>
                    </form>
				</div>
            </div> <!-- .col-md-8 -->
		</div>
		
	</div>
</section> <!-- .section -->



