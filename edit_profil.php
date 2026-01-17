
<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
</head>
<body>
<h2>Edit Profil</h2>
<form method="POST" action="proses_edit_profil.php">
    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" value="<?= htmlspecialchars($user['email']) ?>" readonly><br><br>

    <label>Password Baru</label><br>
    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah"><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
