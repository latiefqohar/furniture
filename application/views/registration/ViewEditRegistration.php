<div class="container mb-2">
    <div class="card">
        <div class="card-header">
            Edit Data User
        </div>
        <div class="card-body">
            <form action="<?= base_url(); ?>Registration/actionedit" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $registration['id']; ?>">
                <table class="table table-bordered ">
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" class="form-control" name="nama" value="<?= $registration['nama']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama ilmiah</td>
                        <td><input type="text" class="form-control" name="username"
                                value="<?= $registration['username']; ?>"></td>
                    </tr> <tr>
                        <td>Role</td>
                        <td>
                            <select class="form-control" name="role" required> 
                                <option  value="">Silahkan Pilih</option>
                                <option <?php if($registration['role']=="Admin"){echo 'selected';} ?> value="Admin">Admin</option>
                                <option value="Manager" <?php if($registration['role']=="Manager"){echo 'selected';} ?>>Manager</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" class="form-control" name="password">
                            <small class="text-danger">isi password baru jika ingin merubah password</small>
                        </td>
                    </tr>
                   

                </table>
                <button class="btn btn-primary float-right"><i class="fas fa-save"></i> Save </button>
            </form>
        </div>
    </div>
</div>