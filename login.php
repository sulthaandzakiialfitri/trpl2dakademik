<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'koneksi.php';

$error = '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="max-width:400px">

        <h3 class="mb-3">Login</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            $email = trim($_POST['email']);
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM pengguna 
                WHERE email='$email' 
                AND password='$password'
                LIMIT 1";

            $result = mysqli_query($koneksi, $sql);

            if (!$result) {
                die("Query error: " . mysqli_error($koneksi));
            }

            if (mysqli_num_rows($result) === 1) {
                $user = mysqli_fetch_assoc($result);

                $_SESSION['login'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

                header("Location: index.php");
                exit;
            } else {
                echo "<div class='alert alert-danger mt-3'>Email atau password salah</div>";
            }
        }
        ?>

    </div>
</body>

</html>