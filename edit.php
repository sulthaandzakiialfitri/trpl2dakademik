<?php
include("koneksi.php");

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $edit = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    if (mysqli_num_rows($edit) > 0) {
        $data = mysqli_fetch_array($edit);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?page=datamhs';</script>";
        exit;
    }
} else {
    echo "<script>window.location='index.php';</script>";
    exit;
}
?>

<head>
    <title>Ubah Data Mahasiswa</title>
</head>

<body>
    <h2 class="mt-3">Ubah Data Mahasiswa</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input name="nim" type="text" class="form-control" value="<?= $data['nim']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input name="nama_mhs" type="text" class="form-control" value="<?= $data['nama_mhs']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input name="tgl_lahir" type="date" class="form-control" value="<?= $data['tgl_lahir']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required><?= $data['alamat']; ?></textarea>
        </div>

        <input type="submit" value="Simpan Perubahan" name="submit" class="btn btn-primary">
        <a href="index.php?page=datamhs" class="btn btn-secondary">Batal</a>
    </form>
</body>

<?php
if (isset($_POST['submit'])) {
    $nim_lama = $_GET['nim']; 
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mhs='$nama', tgl_lahir='$tgl', alamat='$alamat' WHERE nim='$nim_lama'");

    if ($update) {
        echo "<script>alert('Data berhasil diubah!'); window.location='index.php?page=datamhs';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}
?>