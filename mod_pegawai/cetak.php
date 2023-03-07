
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
      $tampil = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan ");
  echo  
  
            "<h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
            
            <h2>DATA PEGAWAI</h2><br/>
    		<table border='1' cellpadding='5'>
          <thead><tr><th>No</th><th>NIP</th><th>Nama</th><th>Pangkat</th><th>Golongan</th><th>Jabatan</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr align='center'><td>$no</td>
             <td>$r[nip]</td>
             <td>$r[nama]</td>
		     <td>$r[pangkat]</td>
		     <td>$r[golongan]</td>
			 <td>$r[jabatan]</td>
			 </tr>";
      $no++;
    }

    
    echo "</tbody></table>";

    echo  "<h4 style='text-align:right'>Mengetahui, </br> Kepala Dinas </br> PMPTSP Prov Kalsel</h4></br>
            <h4 style='text-align:right'>Hanifah Dwi Nirwana, ST, MT</br> NIP. 19710321 199803 2 006</h4>"

    
?>
</div>
</body>