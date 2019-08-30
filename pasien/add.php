<?php
include_once('../_header.php');
// require '../_config/libs/vendor/autoload.php';
// require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Pasien
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Tambah Pasien</a></li>
        <li class="active">Pasien</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
    </div>
    <section class="content">
    	<div class="container-fluid" style="margin-right: 250px;">
            <div class="box" style="margin-top: 35px;">
                <div class="box-body clearfix">				
                    <form id="form-pasien">
                        <div class="form-group">
                            <label for="no_identitas">No Identitas</label>
                            <input type="number" name="no_identitas" id="no_identitas" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="jk" value="laki-laki" required>Laki-laki
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="jk" value="perempuan" required>Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="number" name="telepon" id="telepon" class="form-control" required autofocus>
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
	$('#form-pasien').submit(function(e){
		e.preventDefault();
        var no_identitas = $("#no_identitas").val();
        var nama_pasien = $("#nama_pasien").val();
        var jk = $('input:radio[name=jk]:checked').val();
        var alamat = $("#alamat").val();
        var telepon = $("#telepon").val();
		var data ={
            no_identitas:$("#no_identitas").val(),
			nama_pasien:$("#nama_pasien").val(),
            jk:$('input:radio[name=jk]:checked').val(),
            alamat:$("#alamat").val(),
            telepon:$("#telepon").val(),
			add:true
		}
		console.log(data);
			$.ajax({
			 type: "post",
			    url: "proses.php",
			    data: data,  //post data
			    success: function(){
     				Swal.fire({
			     	title:"Tambah data pasien berhasil!",
			     	type:"success",
					confirmButtonText: 'OK'
			     }).then((result) =>{
			     		// console.log(result)
			     		if(result.value){
                            //  window.location="proses.php"
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