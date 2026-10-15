<?php
session_start();
include "../config/koneksi.php";

header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Monitoring.xls");

$status = $_GET['status'] ?? '';
$dari = $_GET['dari'] ?? '';
$sampai = $_GET['sampai'] ?? '';

$where = "";

if($status != ""){
    $where .= " AND monitoring.status='$status'";
}

if($dari != "" && $sampai != ""){
    $where .= " AND monitoring.tanggal BETWEEN '$dari' AND '$sampai'";
}

$query = mysqli_query($conn,"
SELECT
monitoring.*,
santri.nama,
pelanggaran.nama_pelanggaran,
pelanggaran.poin,
sanksi.nama_sanksi

FROM monitoring

INNER JOIN santri
ON monitoring.id_santri=santri.id_santri

INNER JOIN pelanggaran
ON monitoring.id_pelanggaran=pelanggaran.id_pelanggaran

INNER JOIN sanksi
ON monitoring.id_sanksi=sanksi.id_sanksi

WHERE 1=1
$where

ORDER BY monitoring.tanggal DESC
");
?>

<h3>Laporan Monitoring Pelanggaran Santri</h3>

<table border="1">

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