<?php
$aksi="modul/mod_rencana/aksi_rencana.php";
$aksi2 = "modul/mod_rencana/cetak2.php";

switch($_GET[act]){
	default:
	$tampil = mysql_query("SELECT * FROM rencana_kegiatan");
	?>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar"></i> Data Rencana Kegiatan</h1>

		<a href="?module=rencana&act=tambahrencana" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Rencana Kegiatan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-warning text-white">
						<tr align="center">
							<th width="5%">No</th>
							<th>Tanggal Pelaksanaan</th>
							<th>Nama Kegiatan</th>
							<th>Jumlah Hari</th>
							<th>Tujuan Kegiatan</th>
							<th>Besar Anggaran</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						while ($r=mysql_fetch_array($tampil)){
							$biaya = number_format($r['id_rencana'],0,'','.');
							?>
							<tr align="center">
								<td><?php echo $no ?></td>
								<td><?php echo $r['tgl'] ?></td>
								<td><?php echo $r['nama_kegiatan'] ?></td>
								<td><?php echo $r['jumlah_hari'] ?></td>
								<td><?php echo $r['tujuan_kegiatan'] ?></td>
								<td><?php echo $r['besar_anggaran'] ?></td>
								<td>
									<div class="btn-group" role="group">
										<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=rencana&act=editrencana&id=<?php echo $r['id_rencana'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
										<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=rencana&act=hapus&id=<?php echo $r['id_rencana'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>
							<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php
	break;
	case "cetak":
	$tampil = mysql_query("SELECT * FROM rencana_kegiatan");
	?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar"></i> Data Rencana Kegiatan</h1>

		<a href="<?= $aksi2 ?>" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Rencana Kegiatan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-warning text-white">
						<tr align="center">
							<th width="5%">No</th>
							<th>Tanggal Pelaksanaan</th>
							<th>Nama Kegiatan</th>
							<th>Jumlah Hari</th>
							<th>Tujuan Kegiatan</th>
							<th>Besar Anggaran</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						while ($r=mysql_fetch_array($tampil)){
							$biaya = number_format($r['id_rencana'],0,'','.');
							?>
							<tr align="center">
								<td><?php echo $no ?></td>
								<td><?php echo $r['tgl'] ?></td>
								<td><?php echo $r['nama_kegiatan'] ?></td>
								<td><?php echo $r['jumlah_hari'] ?> hari</td>
								<td><?php echo $r['tujuan_kegiatan'] ?></td>
								<td><?php echo $r['besar_anggaran'] ?></td>
							</tr>
							<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
	break;
	case "tambahrencana":
	?>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data rencana</h1>

		<a href="?module=rencana" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
			<span class="text">Kembali</span>
		</a>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-plus"></i> Tambah Data rencana</h6>
		</div>
		
		<form method="POST" action='<?=$aksi?>?module=rencana&act=input'>
			<div class="card-body">
				<div class="row">
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Tanggal</label>
						<input autocomplete="off" type="date" name="tgl" required class="form-control"/>
					</div>
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Nama Kegiatan</label>
						<input autocomplete="off" type="text" name="nama_kegiatan" required class="form-control"/>
					</div>
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Jumlah Hari</label>
						<input autocomplete="off" type="number" name="jumlah_hari" required class="form-control"/>
					</div>
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Besar Anggaran</label>
						<input autocomplete="off" type="text" name="besar_anggaran" required class="form-control"/>
					</div>
					<div class="form-group col-md-12">
						<label class="font-weight-bold">Tujuan Kegiatan</label>
						<input autocomplete="off" type="text" name="tujuan_kegiatan" required class="form-control"/>
					</div>
				</div>
			</div>
			<div class="card-footer text-right">
				<button name="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
			</div>
		</form>
	</div>

	<?php
	break;
	case "editrencana":
	$edit=mysql_query("SELECT * FROM rencana_kegiatan WHERE id_rencana='$_GET[id]'");
	$r=mysql_fetch_array($edit);
	?>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Rencana Kegiatan</h1>

		<a href="?module=rencana" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
			<span class="text">Kembali</span>
		</a>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-edit"></i> Edit Data rencana</h6>
		</div>
		
		<form method="POST" action='<?=$aksi?>?module=rencana&act=update'>
			<div class="card-body">
				<div class="row">
					<input type="hidden" name="id" value="<?=$r['id_rencana']?>">
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Tanggal</label>
						<input autocomplete="off" type="date" name="tgl" required class="form-control" value="<?=$r[tgl];?>" />
					</div>
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Nama Kegiatan</label>
						<input autocomplete="off" type="text" name="nama_kegiatan" required class="form-control" value="<?=$r[nama_kegiatan];?>"/>
					</div>
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Jumlah Hari</label>
						<input autocomplete="off" type="number" name="jumlah_hari" required class="form-control" value="<?=$r[jumlah_hari];?>"/>
					</div>
					<div class="form-group col-md-6">
						<label class="font-weight-bold">Besar Anggaran</label>
						<input autocomplete="off" type="text" name="besar_anggaran" required class="form-control" value="<?=$r[besar_anggaran];?>"/>
					</div>
					<div class="form-group col-md-12">
						<label class="font-weight-bold">Tujuan Kegiatan</label>
						<input autocomplete="off" type="text" name="tujuan_kegiatan" required class="form-control" value="<?=$r[tujuan_kegiatan];?>"/>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
			<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
		</div>
	</form>
</div>

<?php
break;  
}
?>
