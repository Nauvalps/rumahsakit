<?php include_once('../_header.php'); 

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Data Obat</a></li>
        <li class="active">Obat</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>&nbsp;
    	<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah obat</a>
    </div>
    <div style="margin-top: 20px; margin-left: 20px;">
    <form class="form-inline" action="" method="post">  
    	<div class="form-group">
    		<input type="text" name="pencarian" class="form-control" placeholder="Pencarian">&nbsp;
    	</div>
    	<div class="form-group">
    		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
    	</div>
    </form>
    </div>
    <!-- Main content -->
    <section class="content">
    	<div class="box" style="margin-top: 15px;">
    	<div class="box-body clearfix">
    		
   
	      <div class="table-responsive">
	      	<table class="table table-striped table-bordered table-hover">
	      		<thead>
	      			<tr>
	      				<th>No.</th>
	      				<th>Nama Obat</th>
	      				<th>Keterangan Obat</th>
	      				<th><i class="glyphicon glyphicon-cog"></i></th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			<?php
					  $batas = 5;
	      			$hal = @$_GET['hal'];
	      			if (empty($hal)) {
	      				$posisi = 0;
	      				$hal = 1;
	      			}else{
	      				$posisi = ($hal - 1)* $batas;
	      			}
	      			$no = 1;
	      			if ($_SERVER['REQUEST_METHOD'] == "POST") {
	      				$pencarian = trim(mysqli_real_escape_string($koneksi, $_POST['pencarian']));
	      				if ($pencarian != '') {
	      					$sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%'";
	      					$query=$sql;
	      					$queryjml=$sql;
	      				}else{
	      					$query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
	      					$queryjml = "SELECT * FROM tb_obat";
	      					$no = $posisi + 1;
	      				}
	      			}else{
	      				$query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
	      					$queryjml = "SELECT * FROM tb_obat";
	      					$no = $posisi + 1;
	      			}
					  $sql_obat = mysqli_query($koneksi, "SELECT * FROM tb_obat ORDER BY nama_obat ASC")or die(mysqli_error($sql_obat));
	      				if (mysqli_num_rows($sql_obat)>0) {
	      					while ($data = mysqli_fetch_array($sql_obat)) {?>
	      						<tr>
	      							<td><?=$no++."."?></td>
	      							<td><?=$data['nama_obat']?></td>
	      							<td><?=$data['ket_obat']?></td>
	      							<td class="text-center">
	      								<a href="edit.php?id=<?=$data['id_obat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
	      								<a href="del.php?id=<?=$data['id_obat']?>"  class="btn btn-danger btn-xs tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
	      							</td>
	      						</tr>
	      						<?php
	      					}
	      				}else{
	      					echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ada</td></tr>";
	      				}
	      			?>

	      		</tbody>
	      	</table>
	      </div>
	      <?php
	      	if(isset($_POST['pencarian']) != '') {
	      		echo "<div style=\"float:left;\">";
	      		$jml = mysqli_num_rows(mysqli_query($koneksi, $queryjml));
	      		echo "Data Hasil Pencarian : <b>$jml</b>";
	      		echo "</div>";
	      	}else{?>
	      		<div style="float: left;">
	      			<?php
	      				$jml = mysqli_num_rows(mysqli_query($koneksi,$queryjml));
	      				echo "Jumlah Data : <b>$jml</b>";
	      			?>
	      		</div>
	      		<div style="float: right;">
	      			<ul class="pagination pagination-sm" style="margin: 0;">
	      				<?php
	      				$jml_hal = ceil($jml / $batas);
	      				for ($i=1; $i <=$jml_hal ; $i++) { 
	      					if ($i != $hal) {
	      						echo "<li><a href=\"?hal=$i\">$i</a></li>";
	      					}else{
	      						echo "<li class=\"active\"><a>$i</a></li>";
	      					}
	      				}
	      				?>
	      			</ul>
	      		</div>
	      		<?php
	      	}
	      ?>
       </div> 
	</div>
    </section>
    <!-- /.content -->
    <script type="text/javascript">
		$('.tombol-hapus').on('click', function(e){
			e.preventDefault();
			const href = $(this).attr('href');
			Swal.fire({
		  title: 'Yakin ingin menghapus data?',
		  text: "Data ini akan dihapus!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Iya, hapus aja!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
				 type: "GET",
				    url: href,//post data
				    success: function()
				    {
				     Swal.fire({
				     	title:"Data sudah dihapus!",
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
		  }
		})
		});
	</script>
  </div>
<?php 
include_once('../_footer.php'); 

?>