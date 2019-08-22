<?php include_once('../_header.php'); 

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Dokter
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Data Dokter</a></li>
        <li class="active">Dokter</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>&nbsp;
    	<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Dokter</a>
    </div>
    <div style="margin-top: 20px; margin-left: 20px;">
    </div>
    <!-- Main content -->
    <section class="content">
    	<div class="box" style="margin-top: 15px;">
    	<div class="box-body clearfix">
	   		<form method="post" name="proses" id="proses">
		      <div class="table-responsive">
		      	<table class="table table-striped table-bordered table-hover" id="dokter">
		      		<thead>
		      			<tr>
                            <th>
		      					<center>
		      						<input type="checkbox" id="select_all" value="">
		      					</center>
		      				</th>
		      				<th>No.</th>
		      				<th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th><i class="glyphicon glyphicon-cog"></i></th>
		      			</tr>
		      		</thead>
		      		<tbody>
		      			<?php
						  $no = 1;
		      				$sql_dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter ORDER BY nama_dokter ASC") or die(mysqli_error($sql_dokter));
		      					while($data = mysqli_fetch_array($sql_dokter)){?>
		      						<tr>
                                        <td align="center">
		      								<input type="checkbox" name="checked[]" id="checked" class="check" value="<?=$data['id_dokter'];?>">	
		      							</td>
		      							<td><?=$no++?>.</td>
		      							<td><?=$data['nama_dokter'];?></td>
		      							<td><?=$data['spesialis'];?></td>
                                        <td><?=$data['alamat'];?></td>
                                        <td><?=$data['telp'];?></td>
                                        <td align="center">
                                            <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
		      						</tr>
		      					<?php
		      					}
		      			    ?>
		      		</tbody>
		      	</table>
		      </div>
		    </form>
            <div class="box-body pull-left">
		    	<button class="btn btn-danger btn-xs" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
		    </div>
       </div> 
	</div>
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">

    $(document).ready(function(){
        $('#dokter').DataTable({
            columnDefs:[
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6]
                }
            ],
            "order": [1, "asc"]
        });
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
<?php 
include_once('../_footer.php'); 

?>