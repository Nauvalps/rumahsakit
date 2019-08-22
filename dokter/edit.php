<?php
include_once('../_header.php');
// require '../_config/libs/vendor/autoload.php';
// require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Dokter
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Edit Dokter</a></li>
        <li class="active">Dokter</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
    </div>
    <section class="content">
    	<?php
    		$id = @$_GET['id'];
    		$sql_dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die(mysqli_error($sql_dokter));
    		$datadokter = mysqli_fetch_array($sql_dokter);
    	?>
    	<div class="container-fluid" style="margin-right: 250px;">
		<div class="box" style="margin-top: 35px;">
			<div class="box-body clearfix">				
				<form id="form-dokter">
					<div class="form-group">
						<label for="nama">Nama Dokter</label>
						<input type="hidden" name="id" value="<?=$datadokter['id_dokter']?>" id="id_dokter">
						<input type="text" name="nama_dokter" id="nama_dokter" value="<?=$datadokter['nama_dokter']?>" class="form-control" required autofocus>
					</div>
					<div class="form-group">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" name="spesialis" id="spesialis" value="<?=$datadokter['spesialis']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required><?=$datadokter['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="number" name="telepon" id="telepon" value="<?=$datadokter['telp']?>" class="form-control" required autofocus>
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
	$('#form-dokter').submit(function(e){
		e.preventDefault();
		var nama_dokter = $("#nama_dokter").val();
        var spesialis = $("#spesialis").val();
        var alamat = $("#alamat").val();
        var telepon = $("#telepon").val();
		var data ={
            id:$("#id_dokter").val(),
			nama_dokter:$("#nama_dokter").val(),
            spesialis:$("#spesialis").val(),
            alamat:$("#alamat").val(),
            telepon:$("#telepon").val(),
			edit:true
		}
		console.log(data)
			$.ajax({
			 type: "post",
			    url: "proses.php",
			    data: data,  //post data
			    success: function(){
     				Swal.fire({
			     	title:"Edit data dokter berhasil!",
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