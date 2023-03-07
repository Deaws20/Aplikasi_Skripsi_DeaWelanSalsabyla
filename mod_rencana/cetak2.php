
<body onLoad="javascript:print()">
  <div align="center">
    <?php
    include "../../config/koneksi.php";
  $tampil = mysql_query("SELECT * FROM rencana_kegiatan");
    ?>   
    <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
    <h2>DATA RENCANA KEGIATAN</h2><br/>
    <table border='1' cellpadding='5'>
      <thead class="bg-warning text-white">
        <tr align="center">
          <th width="5%">No</th>
          <th>Penugasan Kepada</th>
          <th>Golongan</th>
          <th>Tujuan</th>
          <th>Maksud Perjalan Dinas</th>
          <th>Tgl Pergi s/d Tgl Kembali</th>
          <th>Lama</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $tampil = mysql_query("SELECT * FROM nppt,tujuan WHERE nppt.id_tujuan=tujuan.id_tujuan ORDER BY id_nppt DESC");
        while ($r = mysql_fetch_array($tampil)) {
          $value = explode('-', $r['id_pegawai']);
          ?>
          <tr align="center">
            <td class="align-middle"><?php echo $no; ?></td>
            <td class="align-middle" align="left">
              <?php
              $nomer = 0;
              for ($i = 0; $i < count($value); $i++) {
                $data = $value[$i];
                $nomer++;
                $sql = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
                $t = mysql_fetch_array($sql);
                echo "$nomer. $t[nama]";
                echo "<br/>";
              }
              ?>
            </td>
            <td class="align-middle">
              <?php
              $value = explode('-', $r['id_pegawai']);
              $nomer = 0;
              for ($i = 0; $i < count($value); $i++) {
                $data = $value[$i];
                $nomer++;
                $sql = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
                $t = mysql_fetch_array($sql);
                echo "$t[golongan] ";
                echo "<br/>";
              }
              ?>
            </td>
            <td class="align-middle"><?php echo $r['tujuan'] ?></td>
            <td class="align-middle"><?php echo $r['maksud'] ?></td>
            <td class="align-middle"><?php echo $r['tgl_pergi'] ?> s/d <?php echo $r['tgl_kembali'] ?></td>
            <td class="align-middle"><?php echo $r['lama'] ?> hari</td>
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