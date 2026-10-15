<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "../config/koneksi.php";

$nama  = $_POST['nama'];
$jk    = $_POST['jk'];
$kelas = $_POST['kelas'];
$kamar = $_POST['kamar'];
$wali  = $_POST['wali'];
$no_hp = $_POST['no_hp'];

$query = mysqli_query($conn, "
INSERT INTO santri
(nama,jk,kelas,kamar,wali,no_hp)
VALUES
('$nama','$jk','$kelas','$kamar','$wali','$no_hp')
");

if($query){

    $_SESSION['pesan'] = "Data berhasil disimpan.";

    header("Location: index.php");
    exit;


}else{

    die(mysqli_error($conn));

}
?>