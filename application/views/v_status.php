<div class="hero-wrap hero-bread" style="background-image: url('<?=base_url('assets/template/')?>images/bg_4.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Status</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
        <div class="row justify-content-center">
            <h1>Kode Pesanan</h1>
        </div>
        <form action="<?= base_url('Status'); ?>" method="post">
        <div class="row justify-content-center">
                <div class="col-xl-6">
                    <input type="text" name="kode" class="form-control" placeholder="Masukkan kode pesanan">
                </div>
                <div class="col-xl-1">
                    <input type="submit" value="Cari" name="Cari" class="btn btn-primary float-right mt-1">
                </div>
            </form>
			<div class="col-xl-12">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
                            <h2 class="billing-heading mb-4">Detail pesanan</h2>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Pemesan</th>
                                        <th>Alamat</th>
                                        <th>Total</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Tanggal Update</th>
                                        <th>Status Pesanan</th>
                                        <th>Tanggal Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pesanan!= null) { ?>
                                    <tr>
                                        <td><?= $pesanan['nama']; ?></td>
                                        <td><?= $pesanan['alamat']; ?></td>
                                        <td><?= $pesanan['total']; ?></td>
                                        <td><?= $pesanan['pembayaran']; ?></td>
                                        <td><?= $status_pembayaran; ?></td>
                                        <td><?= $status_pesanan; ?></td>
                                        <td><?= $pesanan['waktu']; ?></td>
                                        <td><a href="<?= base_url('Checkout/detail/'.$pesanan['id']); ?>" class="btn btn-success">Detail</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
				</div>
            </div> <!-- .col-md-8 -->
		</div>
		
	</div>
</section> <!-- .section -->



