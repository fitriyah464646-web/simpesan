<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM santri WHERE id_santri='$id'");
$data = mysqli_fetch_assoc($query);

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4><i class="fa fa-edit"></i> Edit Data Santri</h4>
        </div>

        <div class="card-body">

            <form action="update.php" method="POST">

                <input type="hidden" name="id_santri" value="<?= $data['id_santri']; ?>">

                <div class="mb-3">
                    <label>Nama Santri</label>
                    <input type="text" name="nama" class="form-control"
                        value="<?= $data['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>

                    <select name="jk" class="form-control">

                        <option value="Laki-laki"
                        <?= ($data['jk']=="Laki-laki") ? "selected" : ""; ?>>
                        Laki-laki
                        </option>

                        <option value="Perempuan"
                        <?= ($data['jk']=="Perempuan") ? "selected" : ""; ?>>
                        Perempuan
                        </option>

                    </select>

                </div>

                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control"
                        value="<?= $data['kelas']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kamar</label>
                    <input type="text" name="kamar" class="form-control"
                        value="<?= $data['kamar']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Nama Wali</label>
                    <input type="text" name="wali" class="form-control"
                        value="<?= $data['wali']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>No HP Wali</label>
                    <input type="text" name="no_hp" class="form-control"
                        value="<?= $data['no_hp']; ?>" required>
                </div>

                <button class="btn btn-success">
                    <i class="fa fa-save"></i> Update
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

<?php
include "../layout/footer.php";
?>