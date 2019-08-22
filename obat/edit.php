<?php
include_once('../_header.php');
// require '../_config/libs/vendor/autoload.php';
// require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Edit Obat</a></li>
        <li class="active">Obat</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
    </div>
    <section class="content">
    	<?php
    		$id = @$_GET['id'];
    		$sql_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat WHERE id_obat = '$id'") or die(mysqli_error($sql_obat));
    		$dataobat = mysqli_fetch_array($sql_obat);
    	?>
    	<div class="container-fluid" style="margin-right: 250px;">
		<div class="box" style="margin-top: 35px;">
			<div class="box-body clearfix">				
				<form id="form-obat">
					<div class="form-group">
						<label for="nama">Nama Obat</label>
						<input type="hidden" name="id" value="<?=$dataobat['id_obat']?>" id="id_obat">
						<input type="text" name="nama" id="nama" value="<?=$dataobat['nama_obat']?>" class="form-control" required autofocus>
					</div>
					<div class="form-group">
						<label for="ket">Keterangan Obat</label>
						<textarea name="ket" id="ket" class="form-control" required><?=$dataobat['ket_obat']?></textarea>
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="edit" value="Simpan" class="btn btn-success">
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
</script>
	<?php
		include_once('../_footer.php');
	?>