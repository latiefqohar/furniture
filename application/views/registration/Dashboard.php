<?= $this->session->flashdata('message');
$tumbuhan=$this->M_crud->get_data('tumbuhan')->num_rows();
$hewan=$this->M_crud->get_data('hewan')->num_rows();
$registration=$this->M_crud->get_data('registration')->num_rows();
 ?>
<div class="container">
    <!-- Icon Cards-->

    <div class="row mt-5">
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-tree"></i>
                    </div>
                    <div class="mr-5"><?= $tumbuhan ; ?> Tumbuhan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>Tumbuhan">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-paw"></i>
                    </div>
                    <div class="mr-5"><?= $hewan; ?> Hewan</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>Hewan">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                    <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="mr-5"><?= $registration; ?> User</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?= base_url(); ?>Registration">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        
    </div>

    <center>
        <h1 class="mt-3">Selamat Datang di</h1>
        <img src="<?= base_url(); ?>Aset/logogame.png" alt="">
        <h3>Biologiku</h3>
    </center>
</div>