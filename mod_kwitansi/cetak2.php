
<body onLoad="javascript:print()">
  <div align="center">
    <?php
    include "../../config/koneksi.php";
    $tampil = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan ");
    ?>    
    <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
    <h2>DATA KWITANSI</h2><br/>
    <table border='1' cellpadding='5'>
            <thead class="bg-warning text-white">
              <tr align="center">
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Tujuan</th>
                <th>Lama</th>
                <th>Lumpsum</th>
                <th>Penginapan</th>
                <th>Transportasi</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              $tampil = mysql_query("SELECT * FROM kwitansi,pegawai WHERE kwitansi.id_pegawai=pegawai.id_pegawai");
              while ($t = mysql_fetch_array($tampil)) {
                $lumpsum = $t['lama'] * $t['lumpsum'];
                $penginapan = $t['lama'] * $t['penginapan'];
                $transportasi = $t['lama'] * $t['transportasi'];
                $tot = $lumpsum + $penginapan + $transportasi;
                $total = number_format($tot, 0, '', '.');
                $no++;
              ?>
                <tr align="center">
                  <td><?php echo $no ?></td>
                  <td><?php echo $t['nama'] ?></td>
                  <td><?php echo $t['tujuan'] ?></td>
                  <td><?php echo $t['lama'] ?></td>
                  <td><?php echo $lumpsum ?></td>
                  <td><?php echo $penginapan ?></td>
                  <td><?php echo $transportasi ?></td>
                  <td>Rp. <?php echo $total ?></td>
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