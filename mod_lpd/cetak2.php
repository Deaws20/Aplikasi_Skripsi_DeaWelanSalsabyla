
<body onLoad="javascript:print()">
  <div align="center">
    <?php
    include "../../config/koneksi.php";
    $tampil = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan ");
    ?>   
    <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
    <h2>DATA LPJ</h2><br/>
    <table border='1' cellpadding='5'>
 <thead class="bg-warning text-white">
              <tr align="center">
                <th width="5%">No</th>
                <th>Nama</th>
                <th>No SPT</th>
                <th>Hasil</th>
                <th>File</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              $tampil = mysql_query("SELECT * FROM lpd,pegawai,spt WHERE lpd.id_pegawai=pegawai.id_pegawai AND lpd.id_spt=spt.id_spt");
              while ($t = mysql_fetch_array($tampil)) {
                $tanggal = $t['tanggal'];
                $no++;
              ?>
                <tr align="center">
                  <td><?php echo $no ?></td>
                  <td><?php echo $t['nama'] ?></td>
                  <td><?php echo $t['no_spt'] ?></td>
                  <td class="text-justify"><?php echo $t['hasil'] ?></td>
                  <td><a href="assets/<?php echo $t['file'] ?>" target="_blank">Lihat File</a></td>
                  <td><?php echo $tanggal ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
    </table>

    <h4 style='text-align:right'>Mengetahui, </br> Kepala Dinas </br> PMPTSP Prov Kalsel</h4></br>
            <h4 style='text-align:right'>Hanifah Dwi Nirwana, ST, MT</br> NIP. 19710321 199803 2 006</h4>
  </div>
</body>