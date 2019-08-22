<?php include_once('../_header.php'); 

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pasien
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-medkit"></i>Rumah Sakit</a></li>
        <li><a href="#">Data Pasien</a></li>
        <li class="active">Pasien</li>
      </ol>
    </section>
    <div class="pull-right" style="margin-right: 20px; margin-top: 15px;">
    	<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>&nbsp;
    	<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Pasien</a>
    </div>
    <div style="margin-top: 20px; margin-left: 20px;">
    </div>
    <!-- Main content -->
    <section class="content">
    	<div class="box" style="margin-top: 15px;">
    	<div class="box-body clearfix">
		      <div class="table-responsive">
		      	<table class="table table-striped table-bordered table-hover" id="pasien">
		      		<thead>
		      			<tr>
		      				<th>Nomor Identitas</th>
                  <th>Nama Pasien</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No Telepon</th>
                  <th><i class="glyphicon glyphicon-cog"></i></th>
		      			</tr>
		      		</thead>
		      		
		      	</table>
		      </div>
       </div> 
	</div>
    </section>
    <!-- /.content -->
  </div>
  <script>
    $(document).ready(function() {
    $('#pasien').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "pasien_data.php",
        columnDefs : [
          {
            "searchable" : false,
            "orderable" : false,
            "targets": 5,
            "render": function(data, type, row){
                var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> &nbsp;<a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin ingin menghapus data')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                return btn;
            } 
          }
        ]
    });
} );
  </script>
<?php 
include_once('../_footer.php'); 

?>