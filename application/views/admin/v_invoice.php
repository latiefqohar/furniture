<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-12"></div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data Invoice</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
                    <a href="<?= base_url('admin/Invoice/add'); ?>" class="btn btn-primary mb-2">Buat Invoice</a>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="font-size:10pt">
                            <thead>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Nama Terhutang</th>
                                    <th>Periode</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoice as $row) { 
                                    if ($row->status_invoice==0) {
                                        $status="<span class='badge badge-warning'>Menunggu</span>";
                                    }elseif ($row->status_invoice==1) {
                                        $status="<span class='badge badge-success'>Lunas</span>";
                                    }
                                    ?>

                                <tr>
                                    <td><?= $row->no_invoice; ?></td>
                                    <td><?= $row->nama_perusahaan; ?></td>
                                    <td><?= $row->periode; ?></td>
                                    <td><?= $row->tanggal_invoice; ?></td>
                                    <td>Rp.<?= number_format($row->jumlah); ?></td>
                                    <td><?= $status; ?></td>
                                    <td><?= $row->bayar_invoice; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/Invoice/detail/'.$row->id); ?>" class="btn btn-info">Detail</a>
                                        <?php  if ($row->status_invoice==0) { ?>
                                            <a href="<?= base_url('admin/Invoice/konfirmasi/'.$row->id); ?>" class="btn btn-success" onclick="return confirm('apakah anda yakin akan konfirmasi pembayaran?')">Konfirmasi</a>
                                        <?php } ?>
                                        
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Nama Terhutang</th>
                                    <th>Periode</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
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
