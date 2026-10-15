<?php

include "../config/koneksi.php";

$id     = $_POST['id_santri'];
$nama   = $_POST['nama'];
$jk     = $_POST['jk'];
$kelas  = $_POST['kelas'];
$kamar  = $_POST['kamar'];
$wali   = $_POST['wali'];
$no_hp  = $_POST['no_hp'];

$query = mysqli_query($conn,"UPDATE santri SET

nama='$nama',
jk='$jk',
kelas='$kelas',
kamar='$kamar',
wali='$wali',
no_hp='$no_hp'

WHERE id_santri='$id'");

if($query){

   echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

<script>

Swal.fire({

icon:'success',

title:'Berhasil',

text:'Data berhasil diperbarui.',

confirmButtonColor:'#198754'

}).then(()=>{

window.location='index.php';

});

</script>";

}else{

    echo "
    <script>
        alert('Data gagal diubah');
        history.back();
    </script>";

}

?>