<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah Data Kupon</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="<?= base_url('admin/Kupon/actionAdd'); ?>" method="POST">
				<div class="card-body">
					<div class="form-group">
						<label for="kodekupon">Kode Kupon</label>
						<input type="text" class="form-control" id="kodekupon" name="kodekupon"
							placeholder="Masukkan kode kupon" required>
					</div>
					<div class="form-group">
						<label for="jumlah">jumlah</label>
						<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Rp." required>
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
