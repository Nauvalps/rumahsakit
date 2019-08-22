<?php include_once('../_header.php'); ?>
<div class="content-wrapper">
	<section class="content-header">
	      <h1>
	        Generate Data Poliklinik
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
	        <li><a href="#">Generate Data Poliklinik</a></li>
	        <li class="active">Poliklinik</li>
	      </ol>
	</section>
		<div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
		    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
		</div>
		<div class="container-fluid" style="margin-right: 250px;">
		<div class="box" style="margin-top: 35px;">
			<div class="box-body clearfix">				
				<form action="add.php" method="post">
					<div class="form-group">
						<label for="count_add">Banyak data yang ingin ditambah</label>
						<input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control" required="">
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="generate" value="Generate" class="btn btn-success" id="generate">
					</div>
				</form>
			</div>
		</div>
		</div>
</div>

<?php include_once('../_footer.php'); ?>