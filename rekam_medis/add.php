<?php
include_once('../_header.php');
// require '../_config/libs/vendor/autoload.php';
// require '../_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Rekam Medis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Tambah Rekam Medis</a></li>
        <li class="active">Rekam Medis</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>&nbsp;
    </div>
    <section class="content">
    	<div class="container-fluid" style="margin-right: 250px;">
            <div class="box" style="margin-top: 35px;">
                <div class="box-body clearfix">				
                    <form id="form-rekammedis" action="proses.php" method="post">
                        <div class="form-group">
                            <label for="pasien">Pasien</label>
                            <select name="pasien" id="pasien" class="form-control" required>
                                <option value="">-Pilih -</option>
                                <?php
                                    $sql_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pasien") or die (mysqli_error($sql_pasien));
                                    while ($data_pasien = mysqli_fetch_array($sql_pasien)) {
                                        echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keluhan">Keluhan</label>
                            <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dokter">Dokter</label>
                            <select name="dokter" id="dokter" class="form-control" required>
                                <option value="">-Pilih -</option>
                                <?php
                                    $sql_dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter") or die (mysqli_error($sql_dokter));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="diagnosa">Diagnosa</label>
                            <textarea name="diagnosa" id="diagnosa" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="poli">Poliklinik</label>
                            <select name="poli" id="poli" class="form-control" required>
                                <option value="">-Pilih -</option>
                                <?php
                                    $sql_poli = mysqli_query($koneksi, "SELECT * FROM tb_poli ORDER BY nama_poli ASC") or die (mysqli_error($sql_poli));
                                    while ($data_poli = mysqli_fetch_array($sql_poli)) {
                                        echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="obat">Obat</label>
                            <select multiple name="obat[]" id="obat[]" class="form-control" size="7" required>
                                <?php
                                    $sql_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat") or die (mysqli_error($sql_obat));
                                    while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                        echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Periksa</label>
                            <input type="date" name="tgl" id="tgl" value="<?=date('Y-m-d')?>" class="form-control" required autofocus>
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
	// $('#form-dokter').submit(function(e){
	// 	e.preventDefault();
	// 	var nama_dokter = $("#nama_dokter").val();
    //     var spesialis = $("#spesialis").val();
    //     var alamat = $("#alamat").val();
    //     var telepon = $("#telepon").val();
	// 	var data ={
	// 		nama_dokter:$("#nama_dokter").val(),
    //         spesialis:$("#spesialis").val(),
    //         alamat:$("#alamat").val(),
    //         telepon:$("#telepon").val(),
	// 		add:true
	// 	}
	// 	console.log(data);
	// 		$.ajax({
	// 		 type: "post",
	// 		    url: "proses.php",
	// 		    data: data,  //post data
	// 		    success: function(){
    //  				Swal.fire({
	// 		     	title:"Tambah data dokter berhasil!",
	// 		     	type:"success",
	// 				confirmButtonText: 'OK'
	// 		     }).then((result) =>{
	// 		     		// console.log(result)
	// 		     		if(result.value){
	// 		     			window.location="data.php"
	// 		     		}
	// 		     	}
	// 		    )
	// 		 }
	// 	})
	// });
</script>

	<?php
		include_once('../_footer.php');
	?>