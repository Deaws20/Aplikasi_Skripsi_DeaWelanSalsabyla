
<body onLoad="javascript:print()">
  <div align="center">
    <?php
    include "../../config/koneksi.php";
    $tampil = mysql_query("SELECT * FROM sppd,nppt,pegawai,tujuan WHERE sppd.id_nppt=nppt.id_nppt AND pegawai.id_pegawai=sppd.id_pegawai AND nppt.id_tujuan=tujuan.id_tujuan");    ?>    
    <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
    <h2>DATA SPPD</h2><br/>
    <table border='1' cellpadding='5'>
              <thead class="bg-warning text-white">
              <tr align="center">
                <th width="5%">No</th>
                <th>Nama</th>
                <th>No SPPD</th>
                <th>Tugas</th>
                <th>Tujuan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($r = mysql_fetch_array($tampil)) {
              ?>
                <tr align="center">
                  <td class="align-middle"><?php echo $no ?></td>
                  <td class="align-middle"><?php echo $r['nama'] ?></td>
                  <td class="align-middle"><?php echo $r['no_sppd'] ?></td>
                  <td class="align-middle text-justify"><?php echo $r['maksud'] ?></td>
                  <td class="align-middle"><?php echo $r['tujuan'] ?></td>
                </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
    </table>

    <h4 style='text-align:right'>Mengetahui, </br> Kepala Dinas </br> PMPTSP Prov Kalsel</h4></br>
            <h4 style='text-align:right'>Hanifah Dwi Nirwana, ST, MT</br> NIP. 19710321 199803 2 006</h4>
  </div>
</body>