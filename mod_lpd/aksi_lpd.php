<?php
session_start();
include "../../config/koneksi.php";
include "../../config/library.php";
$module=$_GET[module];
$act=$_GET[act];

if ($module=='lpd' AND $act=='hapus') {
	mysql_query("DELETE FROM lpd WHERE id_lpd='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}
elseif ($module=='lpd' AND $act=='input'){
	$file_name = ($_FILES['f1']['name']);
	move_uploaded_file($_FILES['f1']['tmp_name'], "../../assets/".$file_name);
		
	mysql_query("INSERT INTO lpd(id_spt,id_pegawai,hasil,file,hari,tanggal) 
		VALUES('$_POST[id_spt]','$_POST[id_pegawai]','$_POST[hasil]', '$file_name','$hari_ini','$tgl_sekarang')");
	header('location:../../media.php?module='.$module);
}
elseif ($module=='lpd' AND $act=='update'){
	$file_name = ($_FILES['f1']['name']);
	move_uploaded_file($_FILES['f1']['tmp_name'], "../../assets/".$file_name);

	mysql_query("UPDATE lpd SET hasil = '$_POST[hasil]',
		file = '$file_name',
		hari = '$hari_ini',
		tanggal = '$tgl_sekarang'
		WHERE id_lpd = '$_POST[id]'");
	header('location:../../media.php?module='.$module);
}
