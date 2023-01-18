
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
