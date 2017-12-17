<?php
	require "koneksi.php";
?>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Data Buku</h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah</button><br><br>
			<table class="table table-hover">
				<tr>
					<th>Kode</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun</th>
					<th>Jumlah</th>
				</tr>
			<?php 
				$query = mysql_query("SELECT * FROM buku") or die(mysql_error());

				while ($baris = mysql_fetch_array($query)) {
			?>	
			<tr>
				<td><?= $baris[0] ?></td>
				<td><?= $baris[1] ?></td>
				<td><?= $baris[2] ?></td>
				<td><?= $baris[3] ?></td>
				<td><?= $baris[4] ?></td>
				<td><?= $baris[5] ?></td>
			</tr>
			<?php } ?>
		</div>
		
	</div>
</div>