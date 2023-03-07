
<body onLoad="javascript:print()">
  <div align="center">
    <?php
    include "../../config/koneksi.php";
  $tampil = mysql_query("SELECT * FROM hasil_kegiatan JOIN pegawai USING(id_pegawai) JOIN golongan USING(id_golongan)");
    ?>    
    <h4>PEMERINTAH PROVINSI KALIMANTAN SELATAN</br> DINAS PENANAMAN MODAL DAN</br> PELAYANAN TERPADU SATU PINTU </br> Jl. Bangun Praja Kawasan Perkantoran Pemerintah Provinsi Kalimantan Selatan</br> Banjarbaru Kode Pos 70733 Telpon/Fax (0511)6749344 </br> Email : dinaspmptsp@kalselprov.go.id  Website : https://dpmptsp.kalselprov.go.id </br>________________________________________________________________________________________
    <h2>DATA HASIL KEGIATAN</h2><br/>
    <table border='1' cellpadding='5'>
          <thead class="bg-warning text-white">
            <tr align="center">
              <th width="5%">No</th>
              <th>Tanggal Kegiatan</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Nama Kegiatan</th>
              <th>Jumlah Hari</th>
              <th>Tujuan Kegiatan</th>
              <th>Besar Anggaran</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            while ($r = mysql_fetch_array($tampil)) {
              ?>
              <tr align="center">
                <td><?php echo $no ?></td>
                <td><?php echo $r['tgl'] ?></td>
                <td><?php echo $r['nip'] ?></td>
                <td><?php echo $r['nama'] ?></td>
                <td><?php echo $r['nama_kegiatan'] ?></td>
                <td><?php echo $r['jumlah_hari'] ?></td>
                <td><?php echo $r['tujuan_kegiatan'] ?></td>
                <td><?php echo $r['besar_anggaran'] ?></td>
                <td><?php echo $r['status'] ?></td>
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