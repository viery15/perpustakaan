<?php
	require "koneksi.php";
?>


<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_tambah_anggota").click(function(){
            // alert( $(".form_anggota").serialize() );
            var nrp = $('#nrp').val();
            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var jurusan = $('#jurusan').val();
            $.ajax({
                url: 'proses.php?aksi=tambah_anggota',
                data : {nrp: nrp, nama: nama, alamat: alamat, jurusan: jurusan},
                type : 'POST',
                success : function(data) {
                	alert("Data Berhasil Ditambah");
                	$('#myModal').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
                	$('#anggota').click();
                	
                }
            });
        });

        $(".hapus").click(function(){
            var id = $(this).attr('id');
            if (confirm("Anda yakin ingin menghapus ?")) {
                $.ajax({
                    type : 'POST',
                    url : 'proses.php?aksi=hapus_anggota',
                    data : {id:id},
                    success : function(){
                    	alert("Data Berhasil Dihapus");
                        $('#myModal').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
	                	$('#anggota').click();
                    }

                });
            }
        });

        $(".ubah").click(function(){
            var id = $(this).attr('id');
            $("#kaki_modal2").hide();
            $("#isimodal2").load("update.php?id="+id);
        });
	});
</script>

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">Data Anggota</h4> </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<button data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah</button><br><br>
			<table class="table table-hover">
				<tr>
					<th>NRP</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
			<?php 
				$query = mysql_query("SELECT * FROM anggota") or die(mysql_error());

				while ($baris = mysql_fetch_array($query)) {
			?>	
			<tr>
				<td><?= $baris[0] ?></td>
				<td><?= $baris[1] ?></td>
				<td><?= $baris[2] ?></td>
				<td><?= $baris[3] ?></td>
				<td><a href="#" class="btn btn-danger hapus" id="<?= $baris[0] ?>">Hapus</a> <a data-toggle="modal" data-target="#myModal2" href="#" class="btn btn-info ubah" id="<?= $baris[0] ?>">Update</a></td>
			</tr>
			<?php } ?>
		</div>
		
	</div>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Anggota</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal">
        <form class="form_anggota">
		  <div class="form-group">
		    <label for="nrp">NRP:</label>
		    <input type="text" class="form-control" name="nrp" id="nrp">
		  </div>
		  <div class="form-group">
		    <label for="nama">Nama:</label>
		    <input type="text" class="form-control" name="nama" id="nama">
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alamat:</label>
		    <input type="text" class="form-control" name="alamat" id="alamat">
		  </div>
		  <div class="form-group">
			  <label for="sel1">Jurusan:</label>
			  <select class="form-control" id="jurusan" name="jurusan">
			    <option disabled selected>--Pilih Jurusan--</option>
			    <option value="Informatika">Informatika</option>
			    <option value="Elektronika">Elektronika</option>
			    <option value="Elektro Industri">Elektro Industri</option>
			    <option value="Multimedia Broadcasting">Multimedia Broadcasting</option>
			    <option value="Sistem Pembangkit Energi">Sistem Pembangkit Energi</option>
			    <option value="Teknik Komputer">Teknik Komputer</option>
			    <option value="Telekomunikasi">Telekomunikasi</option>
			  </select>
		  </div>
		  </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_anggota" class="btn btn-info">Tambah</button>
        
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Anggota</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="isimodal2">
        <form class="form_anggota">
		  <div class="form-group">
		    <label for="nrp">NRP:</label>
		    <input type="text" class="form-control" name="nrp" id="nrp">
		  </div>
		  <div class="form-group">
		    <label for="nama">Nama:</label>
		    <input type="text" class="form-control" name="nama" id="nama">
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alamat:</label>
		    <input type="text" class="form-control" name="alamat" id="alamat">
		  </div>
		  <div class="form-group">
			  <label for="sel1">Jurusan:</label>
			  <select class="form-control" id="jurusan" name="jurusan">
			    <option disabled selected>--Pilih Jurusan--</option>
			    <option value="Informatika">Informatika</option>
			    <option value="Elektronika">Elektronika</option>
			    <option value="Elektro Industri">Elektro Industri</option>
			    <option value="Multimedia Broadcasting">Multimedia Broadcasting</option>
			    <option value="Sistem Pembangkit Energi">Sistem Pembangkit Energi</option>
			    <option value="Teknik Komputer">Teknik Komputer</option>
			    <option value="Telekomunikasi">Telekomunikasi</option>
			  </select>
		  </div>
		  </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal2">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_tambah_anggota" class="btn btn-info">Tambah</button>
        
      </div>

    </div>
  </div>
</div>

