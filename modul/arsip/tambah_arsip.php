	<?php 
	include 'config/upload.php';

	if (isset($_GET['hal'])) {
		# code...
		if ($_GET['hal']=="edit") {
			# code...
			$tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*,
													 tbl_departemen.nama_departemen,
													 tbl_pengirim_surat.nama_pengirim
											  From tbl_arsip,tbl_departemen,tbl_pengirim_surat
														 where tbl_arsip.id_departemen = tbl_departemen.id_departemen AND tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim AND id_arsip = '$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if ($data) {
				# code...
				$vno_surat = $data['no_surat'];
				$vtanggal_surat = $data['tanggal_surat'];
				$vtanggal_terima = $data['tanggal_diterima'];
				$vperihal = $data['perihal'];
				$vnama_departemen = $data['nama_departemen'];
				$vnama_pengirim = $data['nama_pengirim'];
				$vid_departemen = $data['id_departemen'];
				$vid_pengirim = $data['id_pengirim'];
				$vfile = $data['file'];			
			}
		
	}
}

	if (isset($_POST['bsimpan'])) {
		# code...
		if ($_GET['hal']=="edit") {
			# code...
			if ($_FILES['file']['error']===4) {
				# code...
				$file = $vfile;
			}else {
				# code...
				$file = upload();
			}


			$ubah = mysqli_query($koneksi, "UPDATE tbl_arsip set no_surat = '$_POST[no_surat]',
															tanggal_surat = '$_POST[tanggal_surat]',
															tanggal_diterima = '$_POST[tanggal_diterima]',
															perihal = '$_POST[perihal]',
															id_departemen = '$_POST[id_departemen]',
															id_pengirim = '$_POST[id_pengirim]',
															file = '$file'
															where 
															id_arsip = '$_GET[id]' ");
			if ($ubah) {
			# code...
			echo "<script>
			alert('Data Berhasil di Ubah');
			document.location='?halaman=arsip';
			</script>";
		}
		}else{
		$file=upload();
		$simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip VALUES ('',
																'$_POST[no_surat]',
																'$_POST[tanggal_surat]',
																'$_POST[tanggal_diterima]',
																'$_POST[perihal]',
																'$_POST[id_departemen]',
																'$_POST[id_pengirim]',
																'$file') ");
		if ($simpan) {
			# code...
			echo "<script>
			alert('Data Berhasil di Simpan');
			document.location='?halaman=arsip';
			</script>";
		}
		}
	}


	?>
	

	<div class="container">
	  	<div class="card">
		  <h5 class="card-header bg-info text-white mt-3">Form Tambah Arsip</h5>
		  <div class="card-body">
			<form method="post" action="" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="nama_pengirim">No Surat</label>
			    <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?=@$vno_surat?>">
			  </div>
			  	<div class="form-group">
			    <label for="alamat">Tanggal Surat</label>
			    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="<?=@$vtanggal_surat?>">
			  </div>
			  <div class="form-group">
			    <label for="no_hp">Tanggal Diterima</label>
			    <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" value="<?=@$vtanggal_terima?>">
			  </div>
			  <div class="form-group">
			    <label for="email">Perihal</label>
			    <input type="text" class="form-control" id="perihal" name="perihal" value="<?=@$vperihal?>">
			  </div>		
			  <div class="form-group">
			    <label for="email">Departemen / Tujuan</label>
				    <select class="form-control" name="id_departemen">
				    <option value="<?=@$vid_departemen?>"><?=@$vnama_departemen?></option>
				    <?php 
				    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen order by id_departemen desc");
				    while ($data = mysqli_fetch_array($tampil)) {
				    	echo "<option value='$data[id_departemen]'>$data[nama_departemen]</option>";
				    }
				    ?>
				</select>
			  </div>	
			  <div class="form-group">
			    <label for="email">Pengirim</label>
				    <select class="form-control" name="id_pengirim">
				    	<option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
				    <?php 
				    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat order by id_pengirim desc");
				    while ($data = mysqli_fetch_array($tampil)){
				    	echo "<option value='$data[id_pengirim]'>$data[nama_pengirim]</option>";
				    }
				    ?>    
				</select>
			  </div>		
			  <div class="form-group">
			    <label for="email">File</label>
			    <input type="file" class="form-control" id="file" name="file" value="<?=@$vfile?>">
			  </div>	  			  
			  <button type="submit" name="bsimpan" class="btn btn-primary mt-2">Simpan</button>
			  <button type="reset" name="bbatal" class="btn btn-danger mt-2">Batal</button>
			</form>
		  </div>
		</div>
  	</div>