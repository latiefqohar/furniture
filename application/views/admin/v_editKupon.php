<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah Data Kupon</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="<?= base_url('admin/Kupon/actionEdit'); ?>" method="POST">
				<div class="card-body">
					<div class="form-group">
                        <label for="kodekupon">Kode Kupon</label>
                        <input type="hidden" value="<?= $kupon['id']; ?>" name="id">
						<input type="text" class="form-control" name="kodekupon" value="<?= $kupon['kode']; ?>"
							placeholder="Masukkan kode kupon" required>
					</div>
					<div class="form-group">
						<label for="jumlah">jumlah</label>
						<input type="number" class="form-control" name="jumlah" value="<?= $kupon['jumlah']; ?>" placeholder="Rp." required>
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
