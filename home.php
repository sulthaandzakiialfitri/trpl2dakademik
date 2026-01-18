<?php

require 'koneksi.php';

$qMahasiswa = $koneksi->query("SELECT COUNT(*) AS total FROM mahasiswa");
$jumlahMahasiswa = $qMahasiswa->fetch_assoc()['total'] ?? 0;

$qProdi = $koneksi->query("SELECT COUNT(*) AS total FROM prodi");
$jumlahProdi = $qProdi->fetch_assoc()['total'] ?? 0;

$qUser = $koneksi->query("SELECT COUNT(*) AS total FROM pengguna");
$jumlahUser = $qUser->fetch_assoc()['total'] ?? 0;
?>

<h2 class="mb-4">
    Selamat Datang,
    <?= htmlspecialchars($_SESSION['nama_lengkap'] ?? 'User'); ?> 👋
</h2>

<p class="text-muted mb-4">
    Selamat datang di Sistem Informasi Akademik. Gunakan menu di bawah untuk mengelola data.
</p>

<div class="row">

    <!-- MAHASISWA -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary h-100">
            <div class="card-body text-center">
                <h5 class="card-title">Mahasiswa</h5>
                <h2><?= $jumlahMahasiswa; ?></h2>
                <p class="card-text">Total mahasiswa terdaftar</p>
                <a href="index.php?page=mahasiswa" class="stretched-link"></a>
            </div>
        </div>
    </div>

    <!-- PRODI -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success h-100">
            <div class="card-body text-center">
                <h5 class="card-title">Program Studi</h5>
                <h2><?= $jumlahProdi; ?></h2>
                <p class="card-text">Total program studi</p>
                <a href="index.php?page=prodi" class="stretched-link"></a>
            </div>
        </div>
    </div>

    <!-- PENGGUNA -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-danger h-100">
            <div class="card-body text-center">
                <h5 class="card-title">Pengguna</h5>
                <h2><?= $jumlahUser; ?></h2>
                <p class="card-text">User terdaftar</p>
                <a href="index.php?page=profile-edit" class="stretched-link"></a>
            </div>
        </div>
    </div>

</div>