<?php
include_once('../_header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Data Pasien
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Edit Pasien</a></li>
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
                    <?php
                        $id = @$_GET['id'];
                        $sql_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_pasien ='$id'" ) or die (mysqli_error($sql_pasien));
                        $data = mysqli_fetch_array($sql_pasien);
                    ?>
                    <form id="form-pasien">
                        <div class="form-group">
                            <label for="no_identitas">No Identitas</label>
                            <input type="hidden" name="id" id="id" value="<?=$data['id_pasien']?>">
                            <input type="number" name="no_identitas" id="no_identitas"  class="form-control" value="<?=$data['no_identitas']?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien" value="<?=$data['nama_pasien']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="jk" value="laki-laki" required <?=$data['jns_kelamin'] == "laki-laki" ? "checked" : null ?>>Laki-laki
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="jk" value="perempuan" required <?=$data['jns_kelamin'] == "perempuan" ? "checked" : null ?>>Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="number" name="telepon" id="telepon" value="<?=$data['no_telp']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success" id="tombol-simpan">
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
        var id = $("#id").val();
        var no_identitas = $("#no_identitas").val();
        var nama_pasien = $("#nama_pasien").val();
        var jk = $('input:radio[name=jk]:checked').val();
        var alamat = $("#alamat").val();
        var telepon = $("#telepon").val();
		var data ={
            id:$("#id").val(),
            no_identitas:$("#no_identitas").val(),
			nama_pasien:$("#nama_pasien").val(),
            jk:$('input:radio[name=jk]:checked').val(),
            alamat:$("#alamat").val(),
            telepon:$("#telepon").val(),
			edit:true
		}
			$.ajax({
			 type: "post",
			    url: "proses.php",
			    data: data,  //post data
			    success: function(){
     				Swal.fire({
			     	title:"Edit data pasien berhasil!",
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