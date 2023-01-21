
<?php $role = $this->session->userdata("role"); ?>
<?php if($role == "Customer") {?>
	<?= $this->session->flashdata('message'); ?>

<div class="row">
	<div class="col-12"></div>
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Transaksi</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<form action="" method="POST">
				<div class="row">
				
					<div class="col-4"><input type="date" name="date_start" class="form-control"></div>
					<div class="col-4"><input type="date" name="date_end" class="form-control"></div>
					<div class="col-4"> <button class="btn btn-success">Submit</button></div>
				
				</div>
				</form>
				<br>
			   
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped" style="font-size:10pt">
					<thead>
                                <tr>
                                    <th>Id Pesanan</th>
                                    <th>Pemesan</th>
                                    <th>Alamat</th>
                                    <th>No Telpon</th>
                                    <th>Total</th>
                                    <?php if($this->session->userdata("role")!="Customer"){ ?>
                                    <th>Total Beli</th>
                                    <th>Laba</th>
                                    <?php } ?>
                                    <th>Jenis Pembayaran</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Pesanan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $row) { 
                                   if ($row->status_bayar==0) {
                                        $bayar='<span class="badge badge-warning">Belum Lunas</span>';
                                   }elseif ($row->status_bayar==1) {
                                        $bayar='<span class="badge badge-success">Lunas</span>';
                                   }

                                   if ($row->status==0 && $row->foto!= NULL) {
                                        $status='<span class="badge badge-danger">Menunggu Verifikasi</span>';
                                    }elseif ($row->status==0) {
                                        $status='<span class="badge badge-warning">Menunggu Pembayaran</span>';
                                    }elseif ($row->status==1) {
                                        $status='<span class="badge badge-info">Diverifikasi</span>';
                                    }elseif ($row->status==2) {
                                        $status='<span class="badge badge-info">Diproses</span>';
                                    }elseif ($row->status==3) {
                                        $status='<span class="badge badge-warning">Dikirim</span>';
                                    }
                                    
                                    
                                ?>

                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->telpon; ?></td>
                                    <td><?= $row->total; ?></td>
                                    <?php if($this->session->userdata("role")!="Customer"){ ?>
                                    <td><?= $row->subtotal_beli; ?></td>
                                    <td><?= $row->total-$row->subtotal_beli; ?></td>
                                    <?php } ?>
                                    <td><?= $row->pembayaran; ?></td>
                                    <td><?= $row->waktu; ?></td>
                                    <td><?= $bayar; ?></td>
                                    <td><?= $status; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/Transaksi/detail/'.$row->id); ?>" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
					   
					</table>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


<?php }else{ ?>

	<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Pesanan Baru</span>
				<span class="info-box-number">
					<?= $pesanan_baru; ?>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bars"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Menunggu Konfirmasi</span>
				<span class="info-box-number"><?= $menunggu_proses; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>

	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-info elevation-1"><i class="fa fa-cog"></i></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Sedang Diproses</span>
				<span class="info-box-number"><?= $menunggu_proses; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Pesanan Selesai</span>
				<span class="info-box-number"><?= $selesai; ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
<div class="row">
	
	<div class="col-12 col-sm-12 col-md-12">
		<figure class="highcharts-figure">
			<div id="container"></div>
			
		</figure>
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


<?php } ?>

<script>

Highcharts.chart('container', {

title: {
  text: 'Grafik Pendapatan',
  align: 'left'
},


yAxis: {
  title: {
	text: 'Pendapatan'
  }
},

xAxis: {
      title: {
        text: "tanggal",
      },
      categories: [<?php foreach($tanggal as $tr){echo "'".$tr->waktu."',";} ?>],
    },

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},



series: [{
  name: 'Grafik pendapatan',
  data: [<?php foreach($tanggal as $tr){echo $tr->total.",";} ?>]
}],

responsive: {
  rules: [{
	condition: {
	  maxWidth: 500
	},
	chartOptions: {
	  legend: {
		layout: 'horizontal',
		align: 'center',
		verticalAlign: 'bottom'
	  }
	}
  }]
}

});
</script>
