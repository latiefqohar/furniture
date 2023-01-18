<?= $this->session->flashdata('message'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Buat Invoice</h3>
			</div>
			<!-- /.card-header -->
			<form action="<?= base_url(); ?>admin/Invoice/actionAdd" method="post">
			<div class="card-body">
				<h3>Periode</h3>
				<div class="row">
					<div class="col-3">
						<select name="bulan" class="form-control" id="">
							<option value="">--pilih bulan--</option>
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</div>
					<div class="col-3">
						<select name="tahun" class="form-control" id="">
							<option value="">--pilih tahun--</option>
							<option value="2020">2020</option>
						</select>
					</div>
					<div class="col-4">
						<select name="perusahaan" class="form-control" id="">
							<option value="">--Pilih Perusahaan--</option>
							<?php foreach($perusahaan as $row){ ?>
							<option value="<?= $row->id; ?>"><?= $row->nama_perusahaan; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-2">
						<button type="submit" class="btn btn-primary">Buat</button>
					</div>
				</div>
			</div>
			</form>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
