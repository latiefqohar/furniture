<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah Data Kupon</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="<?= base_url('admin/Perusahaan/actionEdit'); ?>" method="POST">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_perusahaan">Nama Perusahaan</label>
						<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                            placeholder="Masukkan Nama Perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>" required>
                            <input type="hidden"    name="id" value="<?= $perusahaan['id']; ?>">
                    </div>
                    <div class="form-group">
						<label for="alamat">Alamat Perusahaan</label>
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $perusahaan['alamat']; ?>"
							placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group">
						<label for="kota">kota</label>
						<input type="text" class="form-control" id="kota" name="kota"
							placeholder="kota" value="<?= $perusahaan['kota']; ?>" required>
                    </div>
                    <div class="form-group">
						<label for="kode_pos">Kode Pos</label>
						<input type="number" class="form-control" id="kode_pos" name="kode_pos"
							placeholder="kode pos" value="<?= $perusahaan['kode_pos']; ?>" required>
                    </div>
                    <div class="form-group">
						<label for="telpon">Telpon</label>
						<input type="number" class="form-control" id="telpon" name="telpon"
							placeholder="no telpon" value="<?= $perusahaan['telpon']; ?>" required>
					</div>
					<div class="form-group">
						<label for="email">email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="<?= $perusahaan['email']; ?>" required>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
		<!-- /.card -->
	</div>
</div>
