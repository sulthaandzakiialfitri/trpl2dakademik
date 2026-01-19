<?php
require 'koneksi.php';

$id = $_SESSION['id'];

if (isset($_POST['update'])) {

    $nama = trim($_POST['nama_lengkap']);
    $password = trim($_POST['password']);

    if ($nama === '') {
        echo "<div class='alert alert-danger'>Nama tidak boleh kosong</div>";
        exit;
    }

    if ($password !== '') {
        if (strlen($password) < 5) {
            echo "<div class='alert alert-danger'>Password minimal 5 karakter</div>";
            exit;
        }

        $pass = md5($password);

        $stmt = $koneksi->prepare(
            "UPDATE pengguna SET nama_lengkap = ?, password = ? WHERE id = ?"
        );
        $stmt->bind_param("ssi", $nama, $pass, $id);

    } else {
        $stmt = $koneksi->prepare(
            "UPDATE pengguna SET nama_lengkap = ? WHERE id = ?"
        );
        $stmt->bind_param("si", $nama, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['nama_lengkap'] = $nama;

        echo "<div class='alert alert-success'>Profil berhasil diperbarui</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui profil</div>";
    }
}
?>