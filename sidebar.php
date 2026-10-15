<div class="sidebar">


<h3 class="text-white text-center mb-4">

<i class="fa-solid fa-school"></i>

SIMPESAN

</h3>



<a href="../dashboard/index.php">

<i class="fa fa-home"></i>

Dashboard

</a>


<a href="../santri/index.php">

<i class="fa fa-users"></i>

Data Santri

</a>



<a href="../pelanggaran/index.php">

<i class="fa fa-triangle-exclamation"></i>

Pelanggaran

</a>



<a href="../sanksi/index.php">

<i class="fa fa-gavel"></i>

Sanksi

</a>



<a href="../monitoring/index.php">

<i class="fa fa-chart-line"></i>

Monitoring

</a>



<a href="../laporan/index.php">

<i class="fa fa-file"></i>

Laporan

</a>



<a href="../logout.php"
onclick="return confirm('Apakah Anda yakin ingin logout?')">
    <i class="fa fa-sign-out-alt"></i>
    Logout
</a>

</div>



<div class="main">

<nav class="navbar bg-white shadow-sm mb-4">


<div class="container-fluid">


<h5>
Sistem Monitoring Pelanggaran Santri
</h5>


<div>

<?= $_SESSION['nama']; ?>

</div>

</div>

</nav>