	

	<?php


		if (isset($_POST['bsimpan'])) {
			# code...
			if (@$_GET['hal']=="edit") {
				# code...
				$ubah = mysqli_query($koneksi, "UPDATE tbl_departemen SET nama_departemen='$_POST[nama_departemen]' where id_departemen='$_GET[id]' ");
				if ($ubah) {
					# code...
					echo "<script>
					alert('data berhasil diubah');
					document.location='?halaman=departemen';
					</script>";
				}
			}else{
				$simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen VALUES ('','$_POST[nama_departemen]')");
				if ($simpan) {
					# code...
					echo "<script>
					alert('data berhasil disimpan');
					document.location='?halaman=departemen';
					</script>";
				}
			}

		}
			
		

		

		if (isset($_GET['hal'])) {
			if ($_GET['hal']=="edit") {
				# code...
			$tampil=mysqli_query($koneksi, "SELECT * FROM tbl_departemen where id_departemen='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if ($data) {
				# code...
				$vnama_departemen = $data['nama_departemen'];
			}
			}else{
			# code...
			$hapus=mysqli_query($koneksi, "DELETE FROM tbl_departemen where id_departemen='$_GET[id]'");
			if ($hapus) {
				# code...
				echo "<script>
				alert('Data berhasil dihapus');
				document.location='?halaman=departemen';
				</script>";
			}
		}

		}



	?>



	<div class="container">
	  	<div class="card">
		  <h5 class="card-header bg-info text-white mt-3">Form Departemen</h5>
		  <div class="card-body">
			<form method="post" action="">
			  <div class="form-group">
			    <label for="nama_departemen">Nama Departemen</label>
			    <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" value="<?=@$vnama_departemen?>">
			  </div>
			  <button type="submit" name="bsimpan" class="btn btn-primary mt-2">Simpan</button>
			  <button type="reset" name="bbatal" class="btn btn-danger mt-2">Batal</button>
			</form>
		  </div>
		</div>
  	</div>
  	<div class="container">
	  	<div class="card">
		  <h5 class="card-header bg-info text-white mt-3">Data Departemen</h5>
		  <div class="card-body">
		  	<table class="table table-borderd table-hovered table-striped">
			  	<tr>
					<th>No</th>
					<th>Nama Departemen</th>
					<th>Aksi</th>
				</tr>

				<?php 
				$tampil=mysqli_query($koneksi, "SELECT * from tbl_departemen order by id_departemen desc");
					$nomor = 1;
					while ($data=mysqli_fetch_array($tampil)) :
				?>
				<tr>
					<td><?=$nomor++?></td>
					<td><?=$data['nama_departemen']?></td>
					<td>
						<a href="?halaman=departemen&hal=edit&id=<?=$data['id_departemen']?>" class="btn btn-success">Edit</a>
						<a href="?halaman=departemen&hal=hapus&id=<?=$data['id_departemen']?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php endwhile?>
		  	</table>
		   </div>
		</div>
  	</div>
