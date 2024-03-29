<?php
$aksi="modul/mod_golongan/aksi_golongan.php";

switch($_GET[act]){
default:
$tampil = mysql_query("SELECT * FROM golongan");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Golongan</h1>

	<a href="?module=golongan&act=tambahgolongan" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Data Golongan</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-warning text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Golongan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1;
				while ($r=mysql_fetch_array($tampil)){
				$biaya = number_format($r['biaya'],0,'','.');
				?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $r['golongan'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=golongan&act=editgolongan&id=<?php echo $r['id_golongan'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=golongan&act=hapus&id=<?php echo $r['id_golongan'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "tambahgolongan":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Golongan</h1>

	<a href="?module=golongan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-plus"></i> Tambah Data Golongan</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=golongan&act=input'>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Golongan</label>
					<input autocomplete="off" type="text" name="golongan" required class="form-control"/>
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
case "editgolongan":
$edit=mysql_query("SELECT * FROM golongan WHERE id_golongan='$_GET[id]'");
$r=mysql_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Golongan</h1>

	<a href="?module=golongan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-edit"></i> Edit Data Golongan</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=golongan&act=update'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id_golongan']?>">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Golongan</label>
					<input autocomplete="off" type="text" name="golongan" value="<?=$r['golongan']?>" required class="form-control"/>
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
