<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<div class='content-wrapper'>

	<div class="content-header">
	<h1>Prodi dan Unit <small>Tambahkan dan kelola Data Prodi Dan Unit</small></h1>
	<ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Prodi dan Unit</li>
          </ol>
	</div>
	<div class="content">

	<div class="row">
		<div class="col-sm-5">
			<div class="box box-default">
				<div class="box-header with-border">
					<h4>Tambahkan Data Prodi dan Unit</h4>
				</div>
				<div class="box-body">
					<div class="form-group">
                      <label for="list_fakultas">Fakultas</label>
                        <select name="list_fakultas" id="list_fakultas" class="form-control">
                        <option value="0" selected>Pilih Fakultas</option>
                        <?php
                        if($list_fakultas!=false){
                          echo $list_fakultas;
                        }
                         ?>
                      </select>
                    </div>
					<div class="form-group">
						<label for="nama_prodi">Nama Prodi Atau Unit</label>
						<input type="text" class="form-control" id="nama_prodi">
					</div>
					<button class="btn bg-purple tambah-prodi-btn">Simpan</button>
					</div>

				</div>

			</div>
		<div class="col-sm-7">
			<div class="box box-default">
				<div class="box-header with-border">
					<h4>Semua Data Prodi dan Unit</h4>
				</div>
				<div class="box-body">
					<table class="prodi-table table table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">No</th>
								<th>Nama Fakultas</th>
								<th>Nama Prodi atau Unit</th>
								<th width="50">Aksi</th>
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