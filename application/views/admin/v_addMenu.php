<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah Data Menu</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" action="<?= base_url('admin/Menu/actionAdd'); ?>" method="POST" enctype="multipart/form-data">
				<div class="card-body">
					<div class="form-group">
						<label for="nama">Nama Produk</label>
						<input type="text" class="form-control" id="nama" name="nama"
							placeholder="Masukkan Nama Menu" required>
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required>
                    </div>
					<div class="form-group">
						<label for="harga">Harga Beli</label>
						<input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Rp." required>
                    </div>
                    <div class="form-group">
						<label for="harga">Harga Jual</label>
						<input type="number" class="form-control" id="harga" name="harga" placeholder="Rp." required>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
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
