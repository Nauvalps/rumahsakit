<?php include_once('../_header.php'); ?>
<div class="content-wrapper">
	<section class="content-header">
	      <h1>
	        Tambah Data Poliklinik
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
	        <li><a href="#">Tambah Data Poliklinik</a></li>
	        <li class="active">Poliklinik</li>
	      </ol>
	</section>
		<div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
		    	<a href="data.php" class="btn btn-info btn-xs">Lihat Data</a>&nbsp;
		    	<!-- <a href="generate.php" class="btn btn-primary btn-xs">Tambah Data</a>&nbsp; -->
		</div>
		<div class="container-fluid" style="margin-right: 250px;">
		<div class="box" style="margin-top: 70px;">
			<div class="box-body clearfix">				
				<form action="proses.php" method="post" id="form-poli">
					<input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
					<table class="table">
						<tr>
							<th>#</th>
							<th>Nama Poliklinik</th>
							<th>Gedung</th>
						</tr>
						<?php
							for ($i=1; $i<=$_POST['count_add']; $i++) {?> 

								<tr>
									<td><?=$i?></td>
									<td>
										<input type="text" name="nama-<?=$i?>" id="nama" class="form-control" required>
									</td>
									<td>
										<input type="text" name="gedung-<?=$i?>" id="gedung" class="form-control" required>
									</td>
								</tr>
								<?php
							}
						?>
					</table>
					<div class="form-group pull-right">
						<input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include_once('../_footer.php'); ?>