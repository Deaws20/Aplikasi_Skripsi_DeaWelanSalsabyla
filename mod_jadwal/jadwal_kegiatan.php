<?php
$aksi = "modul/mod_jadwal_kegiatan/aksi_pegawai.php";
$aksi2 = "modul/mod_pegawai/cetak.php";
switch ($_GET[act]) {
	default:
		$tampil = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan ");
?>

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Pegawai</h1>

			<div>
				<a href="?module=pegawai&act=tambahPegawai" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>

			</div>
		</div>

		<div class="card shadow mb-4">
			<!-- /.card-header -->
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Data Pegawai</h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead class="bg-warning text-white">
							<tr align="center">
								<th width="5%">No</th>
								<th>NIP</th>
								<th>Nama</th>
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
									<td><?php echo $r['nip'] ?></td>
									<td><?php echo $r['nama'] ?></td>
									<td>
										<div class="btn-group" role="group">
											<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="?module=pegawai&act=detailPegawai&id=<?php echo $r['id_pegawai'] ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
											<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=pegawai&act=editPegawai&id=<?php echo $r['id_pegawai'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
											<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= $aksi ?>?module=pegawai&act=hapus&id=<?php echo $r['id_pegawai'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
	case "tambahPegawai":
	?>

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Pegawai</h1>

			<a href="?module=pegawai" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span>
			</a>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-plus"></i> Tambah Data Pegawai</h6>
			</div>

			<form method="POST" action='<?= $aksi ?>?module=pegawai&act=input'>
				<div class="card-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="font-weight-bold">NIP</label>
							<input autocomplete="off" type="text" name="nip" required class="form-control" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nama</label>
							<input autocomplete="off" type="text" name="nama" required class="form-control" />
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
	case "editPegawai":
		$edit = mysql_query("SELECT * FROM Pegawai WHERE id_Pegawai='$_GET[id]'");
		$r = mysql_fetch_array($edit);
	?>

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Jadwal Kegiatan</h1>

			<a href="?module=pegawai" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span>
			</a>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-edit"></i> Edit Data Pegawai</h6>
			</div>

			<form method="POST" action='<?= $aksi ?>?module=pegawai&act=update'>
				<div class="card-body">
					<div class="row">
						<input type="hidden" name="id" value="<?= $r['id_pegawai'] ?>">
						<div class="form-group col-md-6">
							<label class="font-weight-bold">NIP</label>
							<input autocomplete="off" type="text" name="nip" required value="<?= $r['nip'] ?>" class="form-control" />
						</div>

						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nama</label>
							<input autocomplete="off" type="text" name="nama" required value="<?= $r['nama'] ?>" class="form-control" />
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
	case "detailPegawai":
		$detail = mysql_query("SELECT * FROM Pegawai WHERE id_Pegawai='$_GET[id]'");
		$r = mysql_fetch_array($detail);
	?>

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Pegawai</h1>

			<a href="?module=pegawai" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Kembali</span>
			</a>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-eye"></i> Detail Data Pegawai</h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">
				<li class="nav-item <?php $p = $_GET['module'];
                              if ($p == 'jadwal') {
                                echo "active";
                              } ?>">
				</li>

				</div>
			</div>
		</div>

<?php
		break;
}
?>

