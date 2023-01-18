<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">DataTable with default features</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<a href="<?= base_url('admin/Kupon/add'); ?>" class="btn btn-primary mb-2">Tambah Data</a>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Kode Voucher</th>
								<th>Jumlah</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($kupon as $row) { ?>
							<tr>
								<td><?= $row->kode; ?></td>
								<td>Rp.<?= number_format($row->jumlah,0,",","."); ?></td>
								<td>
									<a href="<?= base_url('admin/Kupon/edit/'.$row->id); ?>" class="btn btn-info">Edit</a>
									<a href="<?= base_url('admin/Kupon/delete/'.$row->id); ?>" onclick="return confirm('apakah anda yakin akan menghapus?')" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
							<?php } ?>

						</tbody>
						<tfoot>
							<tr>
								<th>Kode Voucher</th>
								<th>Jumlah</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
