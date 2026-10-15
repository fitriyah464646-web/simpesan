<?php

session_start();

include "../config/koneksi.php";

include "../layout/header.php";
include "../layout/sidebar.php";


$tgl1="";
$tgl2="";


$sql="SELECT

monitoring.*,
santri.nama,
pelanggaran.nama_pelanggaran,
pelanggaran.poin,
sanksi.nama_sanksi

FROM monitoring

JOIN santri
ON monitoring.id_santri=santri.id_santri

JOIN pelanggaran
ON monitoring.id_pelanggaran=pelanggaran.id_pelanggaran

JOIN sanksi
ON monitoring.id_sanksi=sanksi.id_sanksi";


if(isset($_GET['filter'])){

$tgl1=$_GET['tgl1'];

$tgl2=$_GET['tgl2'];

$sql.="

WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'

";

}

$sql.=" ORDER BY tanggal DESC";

$query=mysqli_query($conn,$sql);

?>

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>

<i class="fa fa-print"></i>

Laporan Monitoring

</h4>

</div>

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-4">

<label>Dari Tanggal</label>

<input
type="date"
name="tgl1"
class="form-control"
value="<?= $tgl1 ?>">

</div>

<div class="col-md-4">

<label>Sampai</label>

<input
type="date"
name="tgl2"
class="form-control"
value="<?= $tgl2 ?>">

</div>

<div class="col-md-4">

<br>

<button
name="filter"
class="btn btn-primary">

Filter

</button>

<a
href="laporan.php"
class="btn btn-secondary">

Reset

</a>

<a
href="cetak.php?tgl1=<?= $tgl1 ?>&tgl2=<?= $tgl2 ?>"
target="_blank"
class="btn btn-success">

Cetak

</a>

</div>

</div>

</form>

<hr>

<table class="table table-bordered datatable">

<tr>

<th>No</th>

<th>Santri</th>

<th>Pelanggaran</th>

<th>Poin</th>

<th>Sanksi</th>

<th>Tanggal</th>

<th>Status</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama'] ?></td>

<td><?= $d['nama_pelanggaran'] ?></td>

<td><?= $d['poin'] ?></td>

<td><?= $d['nama_sanksi'] ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= $d['status'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

<?php include "../layout/footer.php"; ?>