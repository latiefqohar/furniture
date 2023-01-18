<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">DataTable with default features</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<a href="<?= base_url('admin/Perusahaan/add'); ?>" class="btn btn-primary mb-2">Tambah Data</a>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nama Perusahaan</th>
								<th>Alamat</th>
								<th>kota</th>
								<th>Kode Pos</th>
								<th>Telpon</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($perusahaan as $row) { ?>
							<tr>
								<td><?= $row->nama_perusahaan; ?></td>
								<td><?= $row->alamat; ?></td>
								<td><?= $row->kota; ?></td>
								<td><?= $row->kode_pos; ?></td>
								<td><?= $row->telpon; ?></td>
								<td><?= $row->email; ?></td>
								<td>
									<a href="<?= base_url('admin/Perusahaan/edit/'.$row->id); ?>" class="btn btn-info">Edit</a>
									<a href="<?= base_url('admin/Perusahaan/delete/'.$row->id); ?>" onclick="return confirm('apakah anda yakin akan menghapus?')" class="btn btn-danger">Hapus</a>
								</td>
							</tr>
							<?php } ?>

						</tbody>
						<tfoot>
							<tr>
							    <th>Nama Perusahaan</th>
								<th>Alamat</th>
								<th>kota</th>
								<th>Kode Pos</th>
								<th>Telpon</th>
								<th>Email</th>
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
