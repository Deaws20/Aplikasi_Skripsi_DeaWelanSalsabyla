<?php
$aksi = "modul/mod_hasil_kegiatan/aksi_hasil_kegiatan.php";
$aksi2 = "modul/mod_hasil_kegiatan/cetak.php";
switch ($_GET[act]) {
	default:
	$tampil = mysql_query("SELECT * FROM hasil_kegiatan JOIN pegawai USING(id_pegawai) JOIN golongan USING(id_golongan)");
	?>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar"></i> Data Hasil Kegiatan</h1>

		<div>
			<a href="?module=hasil_kegiatan&act=tambahhasil_kegiatan" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
		</div>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Data Hasil Kegiatan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-warning text-white">
						<tr align="center">
							<th width="5%">No</th>
							<th>Tanggal Kegiatan</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Nama Kegiatan</th>
							<th>Jumlah Hari</th>
							<th>Tujuan Kegiatan</th>
							<th>Besar Anggaran</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while ($r = mysql_fetch_array($tampil)) {
							?>
							<tr align="center">
								<td><?php echo $no ?></td>
								<td><?php echo $r['tgl'] ?></td>
								<td><?php echo $r['nip'] ?></td>
								<td><?php echo $r['nama'] ?></td>
								<td><?php echo $r['nama_kegiatan'] ?></td>
								<td><?php echo $r['jumlah_hari'] ?></td>
								<td><?php echo $r['tujuan_kegiatan'] ?></td>
								<td><?php echo $r['besar_anggaran'] ?></td>
								<td><?php echo $r['status'] ?></td>
								<td>
									<div class="btn-group" role="group">
										<?php if ($r['status'] == "selesai"): ?>
												<button data-toggle="tooltip" data-placement="bottom" title="Status Berhasil Dikonfirmasi" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
											<?php else: ?>
												<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=hasil_kegiatan&act=edithasil_kegiatan&id=<?php echo $r['id_hasil_kegiatan'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
												<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= $aksi ?>?module=hasil_kegiatan&act=hapus&id=<?php echo $r['id_hasil_kegiatan'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
												<a data-toggle="tooltip" data-placement="bottom" title="Ubah Status Data" href="<?= $aksi ?>?module=hasil_kegiatan&act=selesai&id=<?php echo $r['id_hasil_kegiatan'] ?>" onclick="return confirm ('Apakah anda yakin untuk menyelesaikan kegiatan?')" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
											<?php endif ?>
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
	$tampil = mysql_query("SELECT * FROM hasil_kegiatan JOIN pegawai USING(id_pegawai) JOIN golongan USING(id_golongan)");
		?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Hasil Kegiatan</h1>

		<div>
			<a href="<?= $aksi2 ?>" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
		</div>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Data Hasil Kegiatan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-warning text-white">
						<tr align="center">
							<th width="5%">No</th>
							<th>Tanggal Kegiatan</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Nama Kegiatan</th>
							<th>Jumlah Hari</th>
							<th>Tujuan Kegiatan</th>
							<th>Besar Anggaran</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while ($r = mysql_fetch_array($tampil)) {
							?>
							<tr align="center">
								<td><?php echo $no ?></td>
								<td><?php echo $r['tgl'] ?></td>
								<td><?php echo $r['nip'] ?></td>
								<td><?php echo $r['nama'] ?></td>
								<td><?php echo $r['nama_kegiatan'] ?></td>
								<td><?php echo $r['jumlah_hari'] ?></td>
								<td><?php echo $r['tujuan_kegiatan'] ?></td>
								<td><?php echo $r['besar_anggaran'] ?></td>
								<td><?php echo $r['status'] ?></td>
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
		case "tambahhasil_kegiatan":
		?>
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Hasil Kegiatan</h1>

			<a href="?module=hasil_kegiatan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span>
			</a>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-plus"></i> Tambah Data Hasil Kegiatan</h6>
			</div>

			<form method="POST" action='<?= $aksi ?>?module=hasil_kegiatan&act=input'>
				<div class="card-body">
					<div class="row">

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nama Pegawai</label>
							<select name="id_pegawai" class="form-control" required>
								<option value="">--Pilih pegawai--</option>
								<?php
								$tampil = mysql_query("SELECT * FROM pegawai");
								while ($r = mysql_fetch_array($tampil)) {
									echo "<option value=$r[id_pegawai]>$r[nama]</option></p>";
								}
								?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Tanggal</label>
							<input autocomplete="off" type="date" name="tgl" required class="form-control" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nama Kegiatan</label>
							<input autocomplete="off" type="text" name="nama_kegiatan" required class="form-control" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Jumlah Hari</label>
							<input autocomplete="off" type="text" name="jumlah_hari" required class="form-control" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Tujuan Kegiatan</label>
							<input autocomplete="off" type="text" name="tujuan_kegiatan" required class="form-control" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Besar Anggaran</label>
							<input autocomplete="off" type="text" name="besar_anggaran" required class="form-control" />
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
		case "edithasil_kegiatan":
		$edit = mysql_query("SELECT * FROM hasil_kegiatan WHERE id_hasil_kegiatan='$_GET[id]'");
		$r = mysql_fetch_array($edit);
		?>

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Hasil Kegiatan</h1>

			<a href="?module=hasil_kegiatan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span>
			</a>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-edit"></i> Edit Data Hasil Kegiatan</h6>
			</div>

			<form method="POST" action='<?= $aksi ?>?module=hasil_kegiatan&act=update'>
				<div class="card-body">
					<div class="row">
						<input type="hidden" name="id" value="<?= $r['id_hasil_kegiatan'] ?>">
						
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nama Pegawai</label>
							<select name="id_pegawai" class="form-control" required>
								<option value="">--Pilih pegawai--</option>
								<?php
								$tampil = mysql_query("SELECT * FROM pegawai");
								while ($d = mysql_fetch_array($tampil)) {
									echo "<option value='".$d[id_pegawai]."'>".$d[nama]."</option></p>";
								}
								?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Tanggal</label>
							<input autocomplete="off" type="date" name="tgl" required class="form-control" value="<?=$r[tgl];?>" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nama Kegiatan</label>
							<input autocomplete="off" type="text" name="nama_kegiatan" required class="form-control" value="<?=$r[nama_kegiatan];?>" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Jumlah Hari</label>
							<input autocomplete="off" type="text" name="jumlah_hari" required class="form-control" value="<?=$r[jumlah_hari];?>" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Tujuan Kegiatan</label>
							<input autocomplete="off" type="text" name="tujuan_kegiatan" required class="form-control" value="<?=$r[tujuan_kegiatan];?>" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Besar Anggaran</label>
							<input autocomplete="off" type="text" name="besar_anggaran" required class="form-control" value="<?=$r[besar_anggaran];?>" />
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

