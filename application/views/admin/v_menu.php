<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-12"></div>
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data Menu</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<a href="<?= base_url('admin/Menu/add'); ?>" class="btn btn-primary mb-2">Tambah Data</a>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Produk</th>
								<th>deskripsi</th>
								<th>Harga Beli</th>
								<th>Harga Jual</th>
								<th>Gambar</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($menu as $row) { ?>
							<tr>
								<td><?= $row->nama; ?></td>
								<td><?= $row->deskripsi; ?></td>
                                <td>Rp. <?= number_format($row->harga_beli,0,",","."); ?></td>
                                <td>Rp. <?= number_format($row->harga,0,",","."); ?></td>
                                <td><img src="<?= base_url('uploads/'.$row->foto); ?>" width="50px"> </td>
								<td>
									<a href="<?= base_url('admin/Menu/edit/'.$row->id); ?>" class="btn btn-info">Edit</a>
									<a href="<?= base_url('admin/Menu/delete/'.$row->id); ?>" onclick="return confirm('apakah anda yakin akan menghapus?')" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
