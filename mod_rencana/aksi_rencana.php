<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='rencana' AND $act=='update'){
    mysql_query("UPDATE rencana_kegiatan SET tgl='$_POST[tgl]', nama_kegiatan='$_POST[nama_kegiatan]', jumlah_hari='$_POST[jumlah_hari]', tujuan_kegiatan='$_POST[tujuan_kegiatan]', besar_anggaran='$_POST[besar_anggaran]'
								 WHERE  id_rencana = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='rencana' AND $act=='hapus') {
	mysql_query("DELETE FROM rencana_kegiatan WHERE id_rencana='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='rencana' AND $act=='input'){
	  mysql_query("INSERT INTO rencana_kegiatan SET tgl='$_POST[tgl]', nama_kegiatan='$_POST[nama_kegiatan]', jumlah_hari='$_POST[jumlah_hari]', tujuan_kegiatan='$_POST[tujuan_kegiatan]', besar_anggaran='$_POST[besar_anggaran]'");
  header('location:../../media.php?module='.$module);
}

?>

