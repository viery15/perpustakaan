<?php
	include "koneksi.php";

	$id = $_GET['id'];

	$query = mysql_query("SELECT * FROM anggota WHERE nrp='$id'") or die (mysql_error());

	$data = mysql_fetch_array($query);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_update_anggota").click(function(){
            // alert( $(".form_anggota").serialize() );
            var nrp = $('#nrp2').val();
            var nama = $('#nama2').val();
            var alamat = $('#alamat2').val();
            var jurusan = $('#jurusan2').val();
            $.ajax({
                url: 'proses.php?aksi=update_anggota',
                data : {nrp: nrp, nama: nama, alamat: alamat, jurusan: jurusan},
                type : 'POST',
                success : function(data) {
                	alert("Data Berhasil Diupdate");
                	$('#myModal').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
                	$('#anggota').click();
                }
            });
        });
	});
</script>
        <form class="form_anggota">
		  <div class="form-group">
		    <label for="nrp">NRP:</label>
		    <input readonly value="<?= $data[0] ?>" type="text" class="form-control" name="nrp" id="nrp2">
		  </div>
		  <div class="form-group">
		    <label for="nama">Nama:</label>
		    <input value="<?= $data[1] ?>" type="text" class="form-control" name="nama" id="nama2">
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alamat:</label>
		    <input value="<?= $data[2] ?>" type="text" class="form-control" name="alamat" id="alamat2">
		  </div>
		  <div class="form-group">
			  <label for="sel1">Jurusan:</label>
			  <select class="form-control" id="jurusan2" name="jurusan2">
			    <option disabled selected>--Pilih Jurusan--</option>
			    <option style="display: none" selected value="<?= $data[3] ?>"><?= $data[3] ?></option>
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
  

      <!-- Modal footer -->
      <div class="modal-footer" id="kaki_modal">
        <button type="button" class="btn btn-secondary" id="tutup" data-dismiss="modal">Close</button>
        <button type="submit" id="btn_update_anggota" class="btn btn-info">Update</button>
        
      </div>