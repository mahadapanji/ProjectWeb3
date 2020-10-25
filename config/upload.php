<?php
    function upload(){
        //deklarasi variabel yang dibutuhkan
        $namafile= $_FILES['file']['name'];
        $ukuranfile = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $tmpname =$_FILES['file']['tmp_name'];

        //cek ekstensi file yang diupload
        $eksfilevalid = ['jpg','jpeg','png','pdf'];
        $eksfile = explode('.',$namafile);
        $eksfile = strtolower(end($eksfile));

        if (!in_array($eksfile,$eksfilevalid)) {
            echo"<script>
            alert('File yang anda masukkan bukan Gambar/PDF');
            </script>";
            return false;
        }

        if($ukuranfile > 1000000){
            echo"<script>
            alert('Ukuran File Terlalu Besar');
            </script>";
            return false;
        }

        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksfile;

        move_uploaded_file($tmpname,'file/'.$namafilebaru);
        return $namafilebaru;

    }



?>