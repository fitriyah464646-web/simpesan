<?php

include "../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"DELETE FROM santri WHERE id_santri='$id'");

if($query){

    header("Location: index.php");
    exit;

}else{

    die(mysqli_error($conn));

}

?>