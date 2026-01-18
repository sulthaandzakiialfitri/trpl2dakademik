<?php
require 'koneksi.php';

$id = $_GET['id'] ?? 0;
if ($id == 0) {
    echo "<div class='alert alert-danger'>ID tidak valid</div>";
    exit;
}

// Ambil data mahasiswa
$q = $koneksi->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$q->bind_param("i", $id);
$q->execute();
$res = $q->get_result();
$mhs = $res->fetch_assoc();

if (!$mhs) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
    exit;
}

// Update data
if (isset($_POST['update'])) {

    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $prodi = $_POST['prodi_id'];
    $alamat = $_POST['alamat'];

    // Validasi FK
    $cek = $koneksi->prepare("SELECT id FROM prodi WHERE id = ?");
    $cek->bind_param("i", $prodi);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows === 0) {
        die("Prodi tidak valid");
    }

    $up = $koneksi->prepare(
        "UPDATE mahasiswa 
         SET nim=?, nama_mhs=?, tgl_lahir = ?, prodi_id = ?, alamat = ?
         WHERE id=?"
    );
    $up->bind_param("ssisi", $nim, $nama, $tgl_lahir, $prodi_id, $alamat, $id);

    if ($up->execute()) {
        echo "<script>
                alert('Data mahasiswa berhasil diperbarui');
                location.href='index.php?page=mahasiswa';
              </script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal update</div>";
    }
}
?>

<h4>Edit Mahasiswa</h4>

<form method="post">
    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($mhs['nim']); ?>" required>
    </div>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_mhs" class="form-control" value="<?= htmlspecialchars($mhs['nama_mhs']); ?>"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" class="form-control" required>
    </div>


    <div class="mb-3">
        <label>Program Studi</label>
        <select name="prodi_id" class="form-control" required>
            <?php
            $prodi = mysqli_query($koneksi, "SELECT * FROM prodi");
            while ($p = mysqli_fetch_assoc($prodi)) {
                $selected = ($p['id'] == $mhs['prodi_id']) ? 'selected' : '';
                echo "<option value='{$p['id']}' $selected>{$p['nama_prodi']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required><?= htmlspecialchars($mhs['alamat']); ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">
        Simpan Perubahan
    </button>
    <a href="index.php?page=mahasiswa" class="btn btn-secondary">
        Kembali
    </a>
</form>