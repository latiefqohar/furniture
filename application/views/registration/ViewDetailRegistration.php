<div class="container mb-2">
    <div class="card">
        <div class="card-header">
            Input Data registration
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <tr>
                    <td>Nama</td>
                    <td><?= $registration['nama']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?= $registration['username']; ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><?= $registration['role']; ?></td>
                </tr>
                
            </table>
            <a href="<?= base_url(); ?>Registration" class="btn btn-primary float-right"><i class="fas fa-undo-alt"></i>
                Kembali
            </a>
        </div>
    </div>
</div>