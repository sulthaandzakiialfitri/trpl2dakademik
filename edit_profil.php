<?php
require 'koneksi.php';

$id = $_SESSION['id'] ?? 0;

if ($id == 0) {
    echo "<div class='alert alert-danger'>Session user tidak ditemukan</div>";
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id='$id'");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$user = mysqli_fetch_assoc($query);

if (!$user) {
    echo "<div class='alert alert-danger'>Data user tidak ditemukan</div>";
    exit;
}
?>

<h4>Edit Profil</h4>

<form method="post">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" value="<?= $user['email']; ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control"
               value="<?= $user['nama_lengkap']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Password Baru (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button name="update" class="btn btn-primary">Simpan</button>
</form>

<?php
if (isset($_POST['update'])) {

    $nama = trim($_POST['nama_lengkap']);
    $password = $_POST['password'];

    if ($password != '') {
        $password = md5($password);
        $sql = "UPDATE pengguna 
                SET nama_lengkap='$nama', password='$password' 
                WHERE id='$id'";
    } else {
        $sql = "UPDATE pengguna 
                SET nama_lengkap='$nama' 
                WHERE id='$id'";
    }

    if (mysqli_query($koneksi, $sql)) {

        $_SESSION['nama_lengkap'] = $nama;

        echo "<script>
                alert('Profil berhasil diperbarui');
                location.href='index.php';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal update</div>";
    }
}
?>
