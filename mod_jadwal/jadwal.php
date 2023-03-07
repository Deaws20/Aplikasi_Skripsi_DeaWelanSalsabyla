 <?php
switch ($_GET[act]) {
	default:
	?>
	<link rel="stylesheet" href="6-calendar.css">
	<script src="5-calendar.js"></script>

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-print"></i> Data Jadwal Kegiatan</h1>
	</div>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-table"></i> Daftar Data Jadwal Kegiatan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<!-- (A) PERIOD SELECTOR -->
				<div id="calPeriod">
					<?php
      // (A1) MONTH SELECTOR
      // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
					$months = [
						1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
						5 => "May", 6 => "June", 7 => "July", 8 => "August",
						9 => "September", 10 => "October", 11 => "November", 12 => "December"
					];
					$monthNow = date("m");
					echo "<select id='calmonth'>";
					foreach ($months as $m=>$mth) {
						printf("<option value='%s'%s>%s</option>",
							$m, $m==$monthNow?" selected":"", $mth
						);
					}
					echo "</select>";

      // (A2) YEAR SELECTOR
					echo "<input type='number' id='calyear' value='".date("Y")."'/>";
					?></div>

					<!-- (B) CALENDAR WRAPPER -->
					<div id="calwrap"></div>

					<!-- (C) EVENT FORM -->
					<div id="calblock"><form id="calform">
						<input type="hidden" name="req" value="save"/>
						<input type="hidden" id="evtid" name="eid"/>
						<label for="start">Date Start</label>
						<input type="datetime-local" id="evtstart" name="start" required/>
						<label for="end">Date End</label>
						<input type="datetime-local" id="evtend" name="end" required/>
						<label for="end">Pegawai</label>
						<select name="id_pegawai" id="evtid_pegawai" class="form-control selectpicker" required>
							<option value>-- Pilih Pegawai --</option>
							<?php
							$sql = mysql_query("SELECT * FROM pegawai");
							while ($r = mysql_fetch_array($sql)) {
									echo "<option value='$r[id_pegawai]'>$r[nama]</option>";
							}
							?>
						</select>
						<label for="txt">Event</label>
						<textarea id="evttxt" name="txt" required></textarea>
						<label for="color">Color</label>
						<input type="color" id="evtcolor" name="color" value="#e4edff" required/>
						<input type="submit" id="calformsave" value="Save"/>
						<input type="button" id="calformdel" value="Delete"/>
						<input type="button" id="calformcx" value="Cancel"/>
					</form></div>
				</div>
			</div>
		</div>

		<?php
		break;
	}
	?>




<!--<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?= $print ?>?module=kwitansi<?= $act ?>=print&id=<?php echo $t['id_kwitansi'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>