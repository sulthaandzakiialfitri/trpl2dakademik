<?php
require '../koneksi.php';

$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama_mhs'] ?? '';
$tgl_lahir = $_POST['tgl_lahir'];
$prodi = $_POST['prodi_id'] ?? '';
$alamat = $_POST['alamat'] ?? '';

if ($nim === '' || $nama === '' || $prodi === '' || $alamat === '') {
    die("Semua field wajib diisi");
}

$cek = $koneksi->prepare("SELECT id FROM prodi WHERE id = ?");
$cek->bind_param("i", $prodi);
$cek->execute();
$cek->store_result();

if ($cek->num_rows === 0) {
    die("Prodi tidak valid (foreign key gagal)");
}

$stmt = $koneksi->prepare(
    "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, prodi_id, alamat)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("ssis", $nim, $nama, $tgl_lahir, $prodi, $alamat);

if ($stmt->execute()) {
    header("Location: ../index.php?page=mahasiswa");
    exit;
} else {
    die("Gagal menyimpan mahasiswa");
}
