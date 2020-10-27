<?php 
include 'config/koneksi.php';

session_start();
if(isset($_SESSION["login"])){
    header("location:admin.php");
    exit;
}

@$pass = md5($_POST['password']);
@$username=mysqli_escape_string($koneksi, $_POST['username']);
@$password=mysqli_escape_string($koneksi, $pass);



$login = mysqli_query($koneksi, "SELECT * FROM tbl_user where username = '$username' AND password = '$password' ");
$data = mysqli_fetch_array($login);
if($data){

    $_SESSION["login"] = true;
    $_SESSION['id_user']= $data['id_user'];
    $_SESSION['username'] = $data['username'];
    header('location:admin.php');
 
}else{
    echo "<script>
    alert('Username atau Password anda salah');
    document.location='index.php';
    </script>";
}


?>