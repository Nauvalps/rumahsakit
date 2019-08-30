<?php include_once('../_header.php'); 

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Rekam Medis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Data Rekam Medis</a></li>
        <li class="active">Rekam Medis</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>&nbsp;
    	<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Rekam Medis</a>
    </div>
    <div style="margin-top: 20px; margin-left: 20px;">
    </div>
    <!-- Main content -->
    <section class="content">
    	<div class="box" style="margin-top: 15px;">
    	<div class="box-body clearfix">
	   		<form method="post" name="proses" id="proses">
		      <div class="table-responsive">
		      	<table class="table table-striped table-bordered table-hover" id="rekammedis">
		      		<thead>
		      			<tr>
		      				<th>No.</th>
		      				<th>Tanggal Periksa</th>
                            <th>Nama Pasien</th>
                            <th>Keluhan</th>
                            <th>Nama Dokter</th>
                            <th>Diagnosa</th>
                            <th>Poliklinik</th>
                            <th>Data Obat</th>
                            <th><i class="glyphicon glyphicon-cog"></i></th>
		      			</tr>
		      		</thead>
		      		<tbody>
                        <?php
                            $no = 1;
                            $query = "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien 
                            INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
                            INNER JOIN tb_poli ON tb_rekammedis.id_poli = tb_poli.id_poli";
                            $sql_rm = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
                            while ($data = mysqli_fetch_array($sql_rm)) {?>
                                <tr>
                                    <td><?=$no++?>.</td>
                                    <td><?=tgl_indo($data['tgl_periksa'])?></td>
                                    <td><?=$data['nama_pasien']?></td>
                                    <td><?=$data['keluhan']?></td>
                                    <td><?=$data['nama_dokter']?></td>
                                    <td><?=$data['diagnosa']?></td>
                                    <td><?=$data['nama_poli']?></td>
                                    <td>
                                        <?php
                                        $sql_obat = mysqli_query($koneksi, "SELECT * FROM tb_rm_obat INNER JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") 
                                        or die (mysqli_error($sql_obat));
                                        while ($dataobat = mysqli_fetch_array($sql_obat)) {
                                            echo $dataobat['nama_obat']."<br>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <a href="del.php?id=<?=$data['id_rm']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data?');"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                        ?>
		      		</tbody>
		      	</table>
		      </div>
		    </form>
       </div> 
	</div>
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">

    $(document).ready(function(){
        $('#rekammedis').DataTable({
            columnDefs:[
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 8
                }
            ]
        })
    	// function hapus(){
		// 	Swal.fire({
		// 	  title: 'Yakin ingin menghapus data?',
		// 	  text: "Data ini akan dihapus!",
		// 	  type: 'warning',
		// 	  showCancelButton: true,
		// 	  confirmButtonColor: '#3085d6',
		// 	  cancelButtonColor: '#d33',
		// 	  confirmButtonText: 'Iya, hapus aja!'
		// 	}).then((result) => {
		// 		if (result.value) {
				
		// 		     Swal.fire({
		// 		     	title:"Data sudah dihapus!",
		// 		     	type:"success",
		// 				confirmButtonText: 'OK'
		// 		     }).then((result) =>{
		// 		     		// console.log(result)
		// 		     		if(result.value){
		// 		     			document.proses.action = 'del.php';
		// 						document.proses.submit();
		// 		     			// window.location="data.php"
		// 		     		}
		// 		     	}
		// 		    )
		// 	  	}
		// 	})
    	})
		
	</script>
<?php 
include_once('../_footer.php'); 

?>