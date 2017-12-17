<?php
	require "koneksi.php";

	$aksi = $_GET['aksi'];

	if ($aksi == "tambah_anggota") {
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jurusan = $_POST['jurusan'];

		$query = mysql_query("INSERT INTO anggota VALUES('$nrp','$nama','$alamat','$jurusan')") or die(mysql_error());
	}

	if ($aksi == "hapus_anggota") {
		$nrp = $_POST['id'];

		$query = mysql_query("DELETE FROM anggota WHERE nrp='$nrp'") or die (mysql_error());
	}

	if ($aksi == "update_anggota") {
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jurusan = $_POST['jurusan'];

		$query = mysql_query("UPDATE anggota SET nama='$nama', alamat='$alamat', jurusan='$jurusan' WHERE nrp = '$nrp'") or die(mysql_error());
	}
?>