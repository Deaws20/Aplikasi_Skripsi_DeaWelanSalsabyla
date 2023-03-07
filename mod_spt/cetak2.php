
<body onLoad="javascript:print()">
  <div align="center">
    <?php
    include "../../config/koneksi.php";
      $tampil = mysql_query("SELECT * FROM spt,nppt");
    ?>    
    <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
    <h2>DATA SPT</h2><br/>
    <table border='1' cellpadding='5'>
      <thead class="bg-warning text-white">
                <tr align="center">
                  <th width="5%">No</th>
                  <th>No SPT</th>
                  <th>Tugas</th>
                  <th>Tgl Pergi</th>
                  <th>Tgl Kembali</th>
                  <th>Lama</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no =1;
                while ($r = mysql_fetch_array($tampil)) {
                  $no++;
                ?>
                  <tr align="center">
                    <td><?php echo $no ?></td>
                    <td><?php echo $r['no_spt'] ?></td>
                    <td><?php echo $r['tugas'] ?></td>
                    <td><?php echo $r['tgl_pergi'] ?></td>
                    <td><?php echo $r['tgl_kembali'] ?></td>
                    <td><?php echo $r['lama'] ?> Hari</td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
    </table>

    <h4 style='text-align:right'>Mengetahui, </br> Kepala Dinas </br> PMPTSP Prov Kalsel</h4></br>
            <h4 style='text-align:right'>Hanifah Dwi Nirwana, ST, MT</br> NIP. 19710321 199803 2 006</h4>"
  </div>
</body>