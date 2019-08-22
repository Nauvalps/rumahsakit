<?php

$chk = $_POST['checked'];
if (!isset($chk)) {
	echo "<script>alert('tidak ada data yg dipilih !'); window.location='data.php';</script>";
}else{
	include_once('../_header.php');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Poliklinik
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Edit Poliklinik</a></li>
        <li class="active">Poliklinik</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
    </div>
    <section class="content">
    	
    <div class="container-fluid" style="margin-right: 250px;">
		<div class="box" style="margin-top: 35px;">
			<div class="box-body clearfix">				
				<form action="proses.php" method="post">
					<div class="form-group">
						<label for="nama">Nama Obat</label>
						<input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
						<table class="table">
							<tr>
								<th>#</th>
								<th>Nama Poliklinik</th>
								<th>Gedung</th>
							</tr>
							<?php
							$no = 1;
							foreach ($chk as $id) {
								$sql_poli = mysqli_query($koneksi, "SELECT * FROM tb_poli WHERE id_poli = '$id'") or die (mysqli_error($sql_poli));
								while ($data = mysqli_fetch_array($sql_poli)) {?>	
								<tr>
									<td><?=$no++?></td>
									<td>
										<input type="hidden" name="id[]" value="<?=$data['id_poli']?>">
										<input type="text" name="nama[]" value="<?=$data['nama_poli']?>" class="form-control" required>
									</td>
									<td>
									<input type="text" name="gedung[]" value="<?=$data['gedung']?>" class="form-control" required>
									</td>
								</tr>
							<?php 
								}
							}
							?>
						</table>
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="edit" value="Edit" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
		</div>
	</section>
</div>
<!-- <script type="text/javascript">
	$('#form-obat').submit(function(e){
		e.preventDefault();
		// console.log("test")
		// console.log($( this ).serializeArray())
		// var id = $("#id").val();
		var name = $("#nama").val();
		var ket = $("#ket").val();
		var data ={
			id:$("#id_obat").val(),
			nama:$("#nama").val(),
			ket:$("#ket").val(),
			edit:true
		}
		console.log(data)
			$.ajax({
			 type: "post",
			    url: "proses.php",
			    data: data,  //post data
			    success: function(){
     				Swal.fire({
			     	title:"Edit data obat berhasil!",
			     	type:"success",
					confirmButtonText: 'OK'
			     }).then((result) =>{
			     		// console.log(result)
			     		if(result.value){
			     			window.location="data.php"
			     		}
			     	}
			    )
			 }
		})
	});
</script> -->
	<?php
		include_once('../_footer.php');
		}
	?>