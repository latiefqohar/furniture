<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah Data Menu</h3>
            </div>
            <form role="form" action="<?= base_url('admin/Menu/actionEdit'); ?>" method="POST" enctype="multipart/form-data">

            <img src="<?= base_url('uploads/'.$menu['foto']); ?>" alt="gambar" width="300px">
            <br>
            <input type="file" name="foto">
            <small style="color:red;">*Pilih foto jika ungin mengganti foto</small>

				<div class="card-body">
					<div class="form-group">
						<label for="nama">Nama Menu</label>
						<input type="text" class="form-control" value="<?= $menu['nama']; ?>" name="nama"
                            placeholder="Masukkan Nama Menu" required>
                            <input type="hidden" name="id" value="<?= $menu['id']; ?>">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<input type="text" class="form-control" value="<?= $menu['deskripsi']; ?>" name="deskripsi" placeholder="Masukkan deskripsi" required>
                    </div>
                    <div class="form-group">
						<label for="harga">Harga Jual</label>
						<input type="number" class="form-control" value="<?= $menu['harga']; ?>" name="harga" placeholder="Rp." required>
                    </div>
					<div class="form-group">
						<label for="harga">Harga Beli</label>
						<input type="number" class="form-control" value="<?= $menu['harga_beli']; ?>" name="harga_beli" placeholder="Rp." required>
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
