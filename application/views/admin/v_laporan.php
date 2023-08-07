<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-12"></div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Laporan Penjualan</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                    
                        <div class="col-4"><input type="date" name="date_start" class="form-control"></div>
                        <div class="col-4"><input type="date" name="date_end" class="form-control"></div>
                        <div class="col-4"> <button class="btn btn-success">Submit</button></div>
                    
                    </div>
                    </form>
                    <br>
                   
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="font-size:10pt">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Nama Menu</th>
                                    <th>Jumlah</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Laba</th>
                                    <th>Jenis Pembayaran</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_jual = 0;
                                $total_beli = 0;
                                $total_untung = 0;
                                $total_diskon = 0;
                                foreach ($transaksi as $row) { ?>

                                <tr>
                                    <td><?= $row->waktu; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->jumlah; ?></td>
                                    <td><?= $row->harga_beli; ?></td>
                                    <td><?= $row->harga_jual; ?></td>
                                    <td><?= $row->untung; ?></td>
                                    <td><?= $row->pembayaran; ?></td>
                                </tr>
                                <?php 
                                $total_beli += $row->harga_beli;
                                $total_jual += $row->harga_jual;
                                $total_untung += $row->untung;
                                $total_diskon += $row->diskon;
                                } ?>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th><?= $total_beli; ?></th>
                                    <th><?= $total_jual; ?></th>
                                    <th><?= $total_untung; ?></th>
                                    <th></th>
                                   
                                </tr>

                            </tbody>
                           
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
