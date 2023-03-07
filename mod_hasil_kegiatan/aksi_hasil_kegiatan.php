<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='hasil_kegiatan' AND $act=='update'){
    mysql_query("UPDATE hasil_kegiatan SET 
    							 tgl  = '$_POST[tgl]',
								 id_pegawai = '$_POST[id_pegawai]',
								 nama_kegiatan = '$_POST[nama_kegiatan]',
								 jumlah_hari = '$_POST[jumlah_hari]',
								 tujuan_kegiatan = '$_POST[tujuan_kegiatan]',
								 besar_anggaran = '$_POST[besar_anggaran]',
								 status = 'lanjut'
								 WHERE  id_hasil_kegiatan = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='hasil_kegiatan' AND $act=='hapus') {
	mysql_query("DELETE FROM hasil_kegiatan WHERE id_hasil_kegiatan='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='hasil_kegiatan' AND $act=='selesai') {
	 mysql_query("UPDATE hasil_kegiatan SET 
								 status = 'selesai'
								 WHERE  id_hasil_kegiatan = '$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='hasil_kegiatan' AND $act=='input'){
	  mysql_query("INSERT INTO hasil_kegiatan SET 
    							 tgl  = '$_POST[tgl]',
								 id_pegawai = '$_POST[id_pegawai]',
								 nama_kegiatan = '$_POST[nama_kegiatan]',
								 jumlah_hari = '$_POST[jumlah_hari]',
								 tujuan_kegiatan = '$_POST[tujuan_kegiatan]',
								 besar_anggaran = '$_POST[besar_anggaran]',
								 status = 'lanjut'");
  header('location:../../media.php?module='.$module);
}

?>

