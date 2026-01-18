<?php
require 'koneksi.php';
?>

<h4>Tambah Mahasiswa</h4>

<form action="Mahasiswa/proses.php" method="post">
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" required>
    </div>


    <div class="mb-3">
        <label>Program Studi</label>
        <select name="prodi_id" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>
            <?php
            $prodi = mysqli_query($koneksi, "SELECT * FROM prodi");
            while ($p = mysqli_fetch_assoc($prodi)) {
                echo "<option value='{$p['id']}'>{$p['nama_prodi']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>
    <a href="index.php?page=mahasiswa" class="btn btn-secondary">
        Kembali
    </a>
</form>