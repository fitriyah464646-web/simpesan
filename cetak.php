<?php

include "../config/koneksi.php";

$tgl1=$_GET['tgl1'];
$tgl2=$_GET['tgl2'];

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

if($tgl1!="" && $tgl2!=""){

$sql.="

WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'

";

}

$query=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Laporan Monitoring</title>

<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body onload="window.print()">

<h3 align="center">

LAPORAN MONITORING PELANGGARAN SANTRI

</h3>

<hr>

<table class="table table-bordered">

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

</body>

</html>