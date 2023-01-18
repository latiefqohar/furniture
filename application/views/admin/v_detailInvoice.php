
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/plgins/') ?>fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/dist/') ?>css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
    <section class="content">
      <div class="container-fluid  mt-3">
        <div class="row ">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Invoice
                    <small class="float-right">Date: <?= $invoice['tanggal_invoice']; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= $invoice['nama_perusahaan']; ?></strong><br>
                    <?= $invoice['alamat']; ?><br>
                    <?= $invoice['kota']; ?><br>
                    <?= $invoice['kode_pos']; ?><br>
                    Phone:<?= $invoice['telpon']; ?><br>
                    Email: <?= $invoice['email']; ?><br>

                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <h3>Invoice <Strong>: <?= $invoice['no_invoice']; ?></Strong></h3><br>
                  <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal Pesanan</th>
                      <th>Total</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $total_keseluruhan=1;
                    foreach($transaksi as $row){ ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->waktu; ?></td>
                            <td>Rp. <?= number_format($row->total,2,",","."); ?></td>
                        </tr>
                    <?php 
                    $total_keseluruhan+=$row->total;
                    } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="<?= base_url('assets/admin/dist/') ?>img/credit/visa.png" alt="Visa">
                  <img src="<?= base_url('assets/admin/dist/') ?>img/credit/mastercard.png" alt="Mastercard">
                  <img src="<?= base_url('assets/admin/dist/') ?>img/credit/american-express.png" alt="American Express">
                  <img src="<?= base_url('assets/admin/dist/') ?>img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Silahkan konfirmasi pembayaran melalui email denga subject Confirm-no_invoice ke paymen@cateringmamadina.com. konfirmasi dilakukan 1x24 jam 
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
              

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td>Rp. <?= number_format($total_keseluruhan,2,",","."); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= base_url('admin/Invoice/print/'.$this->uri->segment(4)); ?>"target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Print
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/admin/plgins/') ?>jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/admin/plgins/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/dist/') ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/dist/') ?>js/demo.js"></script>
</body>
</html>
