<div class="container mb-2">
    <div class="card">
        <div class="card-header">
            Input Data User
        </div>
        <div class="card-body">
            <form action="<?= base_url(); ?>Registration/actionadd" method="post" enctype="multipart/form-data">
                <table class="table table-bordered ">
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" class="form-control" name="nama"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" class="form-control" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" class="form-control" name="password"></td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>
                            <select class="form-control" name="role" required> 
                                <option  value="">Silahkan Pilih</option>
                                <option  value="Admin">Admin</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary float-right"><i class="fas fa-save"></i> Save </button>
            </form>
        </div>
    </div>
</div>