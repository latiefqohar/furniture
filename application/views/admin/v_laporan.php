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
                <form action="" method="POST">
                    <div class="row">
                    
                        <div class="col-4"><input type="date" name="date_start" class="form-control"></div>
                        <div class="col-4"><input type="date" name="date_end" class="form-control"></div>
                        <div class="col-4"> <button class="btn btn-success">Submit</button></div>
                    
                    </div>
                    </form>
                    <br>
                   
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="font-size:10pt">
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
                                <?php foreach ($transaksi as $row) { ?>

                                <tr>
                                    <td><?= $row->waktu; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->jumlah; ?></td>
                                    <td><?= $row->harga_beli; ?></td>
                                    <td><?= $row->harga_jual; ?></td>
                                    <td><?= $row->untung; ?></td>
                                    <td><?= $row->pembayaran; ?></td>
                                </tr>
                                <?php } ?>

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
