<?= $this->session->flashdata('message'); ?>

<form action="<?= base_url('admin/profile/update_data'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $profile['nama']; ?>" required>
          <input type="hidden" class="form-control" name="id" placeholder="id" value="<?= $profile['id']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="no_telepon" placeholder="No Telepon" value="<?= $profile['no_telepon']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $profile['email']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-at"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?= $profile['alamat']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-location-arrow"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="kota" placeholder="Kota" value="<?= $profile['kota']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-location-arrow"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $profile['username']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">isi password jika hanya ingin mengubah password</span><br>
        <div class="row mt-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>