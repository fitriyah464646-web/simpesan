<?php

session_start();

include "../config/koneksi.php";


if(!isset($_SESSION['login'])){

    header("Location: ../login.php");

    exit;

}


$query=mysqli_query($conn,"
SELECT * FROM santri
ORDER BY id_santri DESC
");



include "../layout/header.php";

include "../layout/sidebar.php";

?>


<div class="container-fluid">


<div class="d-flex justify-content-between mb-3">


<h2>

<i class="fa fa-users"></i>

Data Santri

</h2>



<a href="tambah.php" class="btn btn-primary">

<i class="fa fa-plus"></i>

Tambah Santri

</a>


</div>




<div class="card shadow border-0">


<div class="card-body">

<table class="table table-bordered datatable">


<thead class="table-primary">


<tr>

<th>No</th>

<th>Nama</th>

<th>JK</th>

<th>Kelas</th>

<th>Kamar</th>

<th>Wali</th>

<th>No HP</th>

<th>Aksi</th>

</tr>


</thead>



<tbody>


<?php


$no=1;


while($data=mysqli_fetch_assoc($query)){


?>


<tr>


<td>

<?= $no++ ?>

</td>


<td>

<?= $data['nama']; ?>

</td>


<td>

<?= $data['jk']; ?>

</td>


<td>

<?= $data['kelas']; ?>

</td>


<td>

<?= $data['kamar']; ?>

</td>


<td>

<?= $data['wali']; ?>

</td>


<td>

<?= $data['no_hp']; ?>

</td>


<td>


<a href="edit.php?id=<?= $data['id_santri']; ?>"

class="btn btn-warning btn-sm">

<i class="fa fa-edit"></i>

</a>


<a href="hapus.php?id=<?= $data['id_santri']; ?>"
onclick="hapusData('hapus.php?id=<?= $data['id_santri']; ?>')"
class="btn btn-danger btn-sm">

<i class="fa fa-trash"></i>

</a>

</td>


</tr>


<?php

}

?>


</tbody>


</table>


</div>

</div>


</div>

<script>

function hapusData(url){

    Swal.fire({

        title:'Apakah Anda yakin?',

        text:'Data yang dihapus tidak dapat dikembalikan.',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#d33',

        cancelButtonColor:'#6c757d',

        confirmButtonText:'Ya, Hapus',

        cancelButtonText:'Batal'

    }).then((result)=>{

        if(result.isConfirmed){

            window.location=url;

        }

    });

}

</script>

<?php

include "../layout/footer.php";

?>