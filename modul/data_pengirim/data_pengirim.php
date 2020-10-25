	<?php
	if (isset($_POST["bsimpan"])) {
		if (@$_GET['hal']=="edit") {
			# code...
			$ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
				nama_pengirim='$_POST[nama_pengirim]',
				alamat='$_POST[alamat]',
				no_hp = '$_POST[no_hp]',
				email = '$_POST[email]' where id_pengirim='$_GET[id]' ");
			if ($ubah) {
				# code...
				echo "<script>
				alert('Data Berhasil Diubah');
				document.location='?halaman=data_pengirim';
				</script>";
			}
		}else{
		# code...
		$simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat VALUES ('','$_POST[nama_pengirim]','$_POST[alamat]','$_POST[no_hp]','$_POST[email]')");
		if ($simpan) {
			# code...
		echo "<script>
		alert('data berhasil disimpan');
		document.location='?halaman=data_pengirim';
		</script>";
	
		}
		}

	}
	

	
		if (isset($_GET['hal'])) {
			if ($_GET['hal']=="edit") {
			# code...
		$tampil=mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat where id_pengirim='$_GET[id]'");
		$data = mysqli_fetch_array($tampil);
		if ($data) {
			# code...
		$vnama_pengirim = $data['nama_pengirim'];
		$valamat = $data['alamat'];
		$vno_hp = $data['no_hp'];
		$vemail = $data['email'];
		}
	}else{
		$hapus = mysqli_query($koneksi, "DELETE from tbl_pengirim_surat where id_pengirim='$_GET[id]'");
		if ($hapus) {
			# code...
			echo "<script>
			alert('Data berhasil dihapus');
			document.location='?halaman=data_pengirim';
			</script>";
		}
	}

	}
	

	?>
	







	<div class="container">
	  	<div class="card">
		  <h5 class="card-header bg-info text-white mt-3">Form Pengirim Surat</h5>
		  <div class="card-body">
			<form method="post" action="">
			  <div class="form-group">
			    <label for="nama_pengirim">Nama Pengirim</label>
			    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?=@$vnama_pengirim?>">
			  </div>
			  	<div class="form-group">
			    <label for="alamat">Alamat</label>
			    <input type="text" class="form-control" id="alamat" name="alamat" value="<?=@$valamat?>">
			  </div>
			  <div class="form-group">
			    <label for="no_hp">No HP</label>
			    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=@$vno_hp?>">
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="text" class="form-control" id="email" name="email" value="<?=@$vemail?>">
			  </div>			  			  
			  <button type="submit" name="bsimpan" class="btn btn-primary mt-2">Simpan</button>
			  <button type="reset" name="bbatal" class="btn btn-danger mt-2">Batal</button>
			</form>
		  </div>
		</div>
  	</div>

  	<div class="container">
  		<div class="card">
  			<h5 class="card-header bg-info text-white mt-3">Data Pengirim Surat</h5>
  			<div class="card-body">
  				<table class="table table-borderd table-hovered table-stripped">
  					<tr>
  						<th>No</th>
  						<th>Nama Pengirim</th>
  						<th>Alamat</th>
  						<th>No HP</th>
  						<th>Email</th>
  						<th>Aksi</th>
  					</tr>
  					<?php
  					$tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by id_pengirim desc");
  					$no=1;
  					while ($data=mysqli_fetch_array($tampil)) :
  					

  					?>
					<tr>
  						<td><?=$no++?></td>
  						<td><?=$data['nama_pengirim']?></td>
  						<td><?=$data['alamat']?></td>
  						<td><?=$data['no_hp']?></td>
  						<td><?=$data['email']?></td>
  						<td><a href="?halaman=data_pengirim&hal=edit&id=<?=$data['id_pengirim']?>" class="btn btn-primary mt-2">Edit</a>
  							<a href="?halaman=data_pengirim&hal=hapus&id=<?=$data['id_pengirim']?>" class="btn btn-danger mt-2">Delete</a></td>
  					</tr>
  				<?php endwhile?>
  				</table>
  			</div>
  		</div>
  	</div>