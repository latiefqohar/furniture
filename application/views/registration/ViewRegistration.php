<?= $this->session->flashdata('message');
 ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Data Registration
        </div>
        <div class="card-body">
            <a href="<?= base_url(); ?>Registration/add" class="btn btn-primary mb-3"><i class="fa fa-plus"
                    aria-hidden="true"></i>Add Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Username</td>
                            <td>Role</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($registration as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->username; ?></td>
                            <td><?= $row->role; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>Registration/detail/<?= $row->id; ?>"
                                    class="btn btn-outline-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </a>
                                <a href="<?= base_url(); ?>Registration/edit/<?= $row->id; ?>" class="btn btn-outline-warning">
                                    <i class="fas fa-edit"></i>Edit
                                </a>
                                <a href="<?= base_url(); ?>Registration/delete/<?= $row->id; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')"
                                    class="btn btn-outline-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>