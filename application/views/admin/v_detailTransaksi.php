<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-12"></div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data Transaksi</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>ID TRANSAKSI : <strong><?= $transaksi['id']; ?></strong></h2>
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $transaksi['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?= $transaksi['alamat']; ?> , <?= $transaksi['kota']; ?> , <?= $transaksi['kode_pos']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kontak</td>
                                    <td><?= $transaksi['telpon']; ?> ,Email :  <?= $transaksi['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Pembayaran</td>
                                    <td><?= $transaksi['pembayaran']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <h3>Bukti Pembayaran</h3>
                            <img src="<?= base_url('uploads/'.$transaksi['foto']); ?>" alt="" width="400px">
                            <?php if($this->session->userdata("Customer")){ ?>
                                <form action=""  method="post" enctype="multipart/form-data">
									<input type="file" class="mt-2 " name="foto">
									<input type="hidden" value="<?= $transaksi['id']; ?>" name="id">
									<button type="submit"  class="btn btn-primary mt-2">Upload</button>
								</form>
                           <?php } ?>
                           
                        </div>
                    </div>
                    <div class="table-responsive">
                        
                    
                    <br>
                        <table class="table table-bordered table-striped" style="font-size:10pt">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <?php if($this->session->userdata("role")!="Customer"){ ?>
                                    <th>Harga Beli</th>
                                    <?php } ?>
                                    <th>Subtotal Belanja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($detail as $row) { 
                                   $total = $row->jumlah * $row->harga;
                                ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->jumlah; ?></td>
                                    <td>Rp. <?= number_format($row->harga,0,',','.'); ?></td>
                                    <?php if($this->session->userdata("role")!="Customer"){ ?>
                                    <td>Rp. <?= number_format($row->harga_beli,0,',','.'); ?></td>
                                    <?php } ?>
                                    <td>Rp. <?= number_format($total,0,',','.'); ?></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                           
                        </table><br>
                        <table class="table table-striped">
                        <tr>
                            <td>Subtotal</td>
                            <td>Rp. <?= number_format($transaksi['subtotal']); ?></td>
                        </tr>
                        <tr>
                            <td>Biaya Kirim</td>
                            <td>Rp. <?= number_format($transaksi['ongkir']); ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><b>Rp. <?= number_format($transaksi['total']); ?></b></td>
                        </tr>
                        
                    </table>
                    </div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
