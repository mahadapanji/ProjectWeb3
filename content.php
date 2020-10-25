<?php
	
	@$halaman=$_GET['halaman'];

	if ($halaman=="departemen") {
		# code...
		include "modul/departemen/departemen.php";
	}
	elseif ($halaman=="data_pengirim") {
		# code...
		include "modul/data_pengirim/data_pengirim.php";
	}
	elseif ($halaman=="arsip"){
		if (@$_GET['hal']=="tambahdata" || @$_GET['hal']=="edit") {
			# code...
			include "modul/arsip/tambah_arsip.php";
		}else{
		# code...
			include "modul/arsip/arsip.php";
		}	
	}else{
		include "modul/home.php";
	}

?>