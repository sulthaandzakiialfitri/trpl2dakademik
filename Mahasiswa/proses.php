<?php
require '../koneksi.php';

$nim = trim($_POST['nim']);
$nama = trim($_POST['nama_mhs']);
$tgl_lahir = $_POST['tgl_lahir'];
$prodi = $_POST['prodi_id'];
$alamat = trim($_POST['alamat']);

if ($nim === '' || $nama === '' || $tgl_lahir === '' || $prodi === '' || $alamat === '') {
    die("Semua field wajib diisi");
}

$cek = $koneksi->prepare("SELECT id FROM prodi WHERE id = ?");
$cek->bind_param("i", $prodi);
$cek->execute();
$cek->store_result();

if ($cek->num_rows === 0) {
    die("Program studi tidak valid");
}

$stmt = $koneksi->prepare(
    "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, prodi_id, alamat)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("sssis", $nim, $nama, $tgl_lahir, $prodi, $alamat);
$stmt->execute();

header("Location: ../index.php?page=mahasiswa");
exit;
