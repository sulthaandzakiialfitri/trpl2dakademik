<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login']) || !isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$nama = trim($_POST['nama'] ?? '');
$password = $_POST['password'] ?? '';

if ($nama === '') {
    die("Nama tidak boleh kosong");
}

if ($password !== '') {
    $password_md5 = md5($password);

    $sql = "UPDATE pengguna 
            SET nama = '$nama', password = '$password_md5'
            WHERE id_user = '$id_user'";
} else {
    $sql = "UPDATE pengguna 
            SET nama = '$nama'
            WHERE id_user = '$id_user'";
}

$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal update profil: " . mysqli_error($koneksi);
}
