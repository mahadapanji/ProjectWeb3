 <?php
 if (isset($_GET['hal'])=="hapus") {
 	# code...
	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_arsip where id_arsip = '$_GET[id]' ");
		if ($hapus) {
			# code...
			echo "<script>
			alert('Data Berhasil di Hapus');
			document.location='?halaman=arsip';
			</script>";
		}
 }
 ?>
  	<div class="container">
	  	<div class="card">
		  <h5 class="card-header bg-info text-white mt-3">Departemen</h5>
		  <div class="card-body">
		  	<a href="?halaman=arsip&hal=tambahdata" class="btn btn-success mb-3">Tambah Data</a>
		  	<table class="table table-borderd table-hovered table-striped">
			  	<tr>
					<th>No</th>
					<th>No Surat</th>
					<th>Tanggal Surat</th>
					<th>Tanggal Diterima</th>
					<th>Perihal</th>
					<th>Departemen / Tujuan</th>
					<th>Pengirim / No.HP</th>
					<th>File</th>
					<th>Aksi</th>
				</tr>
				
					<?php
					$tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*,
															tbl_departemen.nama_departemen,
															tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
															from tbl_arsip,tbl_departemen,tbl_pengirim_surat
															where tbl_arsip.id_departemen=tbl_departemen.id_departemen AND tbl_arsip.id_pengirim=tbl_pengirim_surat.id_pengirim " );
					$no=1;
					while ($data=mysqli_fetch_array($tampil)) :
					?>
				<tr>
					<td><?=$no++?></td>
					<td><?=$data['no_surat']?></td>
					<td><?=$data['tanggal_surat']?></td>
					<td><?=$data['tanggal_diterima']?></td>
					<td><?=$data['perihal']?></td>
					<td><?=$data['nama_departemen']?></td>
					<td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
					<td>
						<?php 
						if (empty($data['file'])) {
							# code...
							echo " - ";
						}else{
						?>
							<a href="file/<?=$data['file']?>" target="?_blank">link</a>
						<?php
						}
						?>	
					</td>
					<td><a href="?halaman=arsip&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-success">Edit</a>
						<a href="?halaman=arsip&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger" >Hapus</a>
					</td>
				</tr>
			<?php endwhile?>

		  	</table>
		   </div>
		</div>
  	</div>