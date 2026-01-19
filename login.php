<?php
session_start();
require 'koneksi.php';

if (isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === '' || $password === '') {
        echo "<div class='alert alert-danger'>Email dan password wajib diisi</div>";
        exit;
    }

    $pass = md5($password);

    $stmt = $koneksi->prepare(
        "SELECT id, nama_lengkap, email FROM pengguna 
         WHERE email = ? AND password = ?"
    );
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        $_SESSION['login'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Email atau password salah</div>";
    }
}
?>