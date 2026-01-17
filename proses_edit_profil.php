
<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
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
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET nama='$nama', password='$password_hash' WHERE id_user='$id_user'";
} else {
    $sql = "UPDATE user SET nama='$nama' WHERE id_user='$id_user'";
}

if (mysqli_query($koneksi, $sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal update profil";
}
