<?php include_once('../_header.php'); 

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Poliklinik
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Data Poliklinik</a></li>
        <li class="active">Poliklinik</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>&nbsp;
    	<a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Poliklinik</a>
    </div>
    <div style="margin-top: 20px; margin-left: 20px;">
    </div>
    <!-- Main content -->
    <section class="content">
    	<div class="box" style="margin-top: 15px;">
    	<div class="box-body clearfix">
	   		<form method="post" name="proses" id="proses">
		      <div class="table-responsive">
		      	<table class="table table-striped table-bordered table-hover">
		      		<thead>
		      			<tr>
		      				<th>No.</th>
		      				<th>Nama Poliklinik</th>
		      				<th>Gedung</th>
		      				<th>
		      					<center>
		      						<input type="checkbox" id="select_all" value="">
		      					</center>
		      				</th>
		      			</tr>
		      		</thead>
		      		<tbody>
		      			<?php
						  $no = 1;
		      				$sql_poli = mysqli_query($koneksi, "SELECT * FROM tb_poli ORDER BY nama_poli ASC") or die(mysqli_error($sql_poli));
		      				if (mysqli_num_rows($sql_poli) >0) {
		      					while($data = mysqli_fetch_array($sql_poli)){?>
		      						<tr>
		      							<td><?=$no++?>.</td>
		      							<td><?=$data['nama_poli'];?></td>
		      							<td><?=$data['gedung'];?></td>
		      							<td align="center">
		      								<input type="checkbox" name="checked[]" id="checked" class="check" value="<?=$data['id_poli'];?>">	
		      							</td>
		      						</tr>
		      					<?php
		      					}
		      				}else{
		      					echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
		      				}
		      			?>
		      		</tbody>
		      	</table>
		      </div>
		    </form>
		    <div class="box-body pull-right">
		    	<button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i></button>&nbsp;
		    	<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i></button>
		    </div>  
       </div> 
	</div>
    </section>
    <!-- /.content -->
    <script type="text/javascript">
    	$(document).ready(function(){
	    	$('#select_all').on('click', function(){
	    		if (this.checked) {
	    			$('.check').each(function(){
	    				this.checked = true;
	    			})
	    		}else{
	    				$('.check').each(function(){
	    				this.checked = false;
	    			})
	    		}
	   		 })
	    	$('.check').on('click', function(){
	    		if ($('.check:checked').length == $('.check').length) {
	    			$('#select_all').prop('checked', true)
	    		}else{
	    			$('#select_all').prop('checked', false)
	    		}
	    	})
    	})

    	function edit(){
    		document.proses.action = 'edit.php';
    		document.proses.submit(); 
    	}
    	function hapus(){
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
				
				     Swal.fire({
				     	title:"Data sudah dihapus!",
				     	type:"success",
						confirmButtonText: 'OK'
				     }).then((result) =>{
				     		// console.log(result)
				     		if(result.value){
				     			document.proses.action = 'del.php';
								document.proses.submit();
				     			// window.location="data.php"
				     		}
				     	}
				    )
			  	}
			})
    	}
		
	</script>
  </div>
<?php 
include_once('../_footer.php'); 

?>