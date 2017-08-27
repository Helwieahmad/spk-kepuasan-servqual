<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>



<div class='content-wrapper'>

	<div class="content-header">
	<h1>Status <small>Tambahkan dan kelola Status</small></h1>
	<ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Status</li>
          </ol>
	</div>
	<div class="content">

	<div class="row">
		<div class="col-sm-6">
			<div class="box box-default">
				<div class="box-header with-border">
					<h4>Tambahkan Data Status</h4>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="nama_status">Nama Status</label>
						<input type="text" class="form-control" id="nama_status">
					</div>
					<button class="btn bg-purple tambah-status-btn">Simpan</button>
					</div>

				</div>

			</div>
		<div class="col-sm-6">
			<div class="box box-default">
				<div class="box-header with-border">
					<h4>Semua Data Status</h4>
				</div>
				<div class="box-body">
					<table class="status-table table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50">No</th>
								<th>Nama Status</th>
								<th width="100">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							echo $hasil; 
							?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
 </div>
</div>