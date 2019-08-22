<?php
include_once('../_header.php');
// require '../_config/libs/vendor/autoload.php';
// require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Tambah Obat</a></li>
        <li class="active">Obat</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
    </div>
    <section class="content">
    	<div class="container-fluid" style="margin-right: 250px;">
		<div class="box" style="margin-top: 35px;">
			<div class="box-body clearfix">				
				<form id="form-obat">
					<div class="form-group">
						<label for="nama">Nama Obat</label>
						<input type="text" name="nama" id="nama" class="form-control" required autofocus>
					</div>
					<div class="form-group">
						<label for="ket">Keterangan Obat</label>
						<textarea name="ket" id="ket" class="form-control" required></textarea>
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="add" value="Simpan" class="btn btn-success" id="tombol-simpan">
					</div>
				</form>
			</div>
		</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	$('#form-obat').submit(function(e){
		e.preventDefault();
		var name = $("#nama").val();
		var ket = $("#ket").val();
		var data ={
			nama:$("#nama").val(),
			ket:$("#ket").val(),
			add:true
		}
		
			$.ajax({
			 type: "post",
			    url: "proses.php",
			    data: data,  //post data
			    success: function(){
     				Swal.fire({
			     	title:"Tambah data obat berhasil!",
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
</script>

	<?php
		include_once('../_footer.php');
	?>