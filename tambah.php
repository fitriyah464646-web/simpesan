<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

include "../layout/header.php";
include "../layout/sidebar.php";
?>

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4><i class="fa fa-user-plus"></i> Tambah Data Santri</h4>
        </div>

        <div class="card-body">

            <form action="simpan.php" method="POST">

                <div class="mb-3">
                    <label>Nama Santri</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Kamar</label>
                    <input type="text" name="kamar" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nama Wali</label>
                    <input type="text" name="wali" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No HP Wali</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
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