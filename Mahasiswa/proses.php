<?php
require __DIR__ . '/../koneksi.php';

function redirect($url){ header('Location: ' . $url); exit(); }

// INSERT MAHASISWA
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = (int) $_POST['prodi_id'];

    $stmt = $koneksi->prepare("INSERT INTO mahasiswa (nim, nama_mahasiswa, tgl_lahir, alamat, prodi_id) VALUES (?, ?, ?, ?, ?)");
    // nim is now varchar (string)
    $stmt->bind_param('ssssi', $nim, $nama, $tgl, $alamat, $prodi_id);
    if ($stmt->execute()) {
        redirect('../index.php?page=mahasiswa');
    } else {
        echo 'Gagal simpan data mahasiswa: ' . $stmt->error;
    }
    $stmt->close();
}

// DELETE MAHASISWA
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $stmt = $koneksi->prepare("DELETE FROM mahasiswa WHERE nim = ?");
    $stmt->bind_param('s', $nim);
    if ($stmt->execute()) {
        redirect('../index.php?page=mahasiswa');
    } else {
        echo 'Gagal menghapus data mahasiswa: ' . $stmt->error;
    }
    $stmt->close();
}

// UPDATE MAHASISWA
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = (int) $_POST['prodi_id'];

    $stmt = $koneksi->prepare("UPDATE mahasiswa SET nama_mahasiswa=?, tgl_lahir=?, alamat=?, prodi_id=? WHERE nim=?");
    // nim is varchar now, last param should be string
    $stmt->bind_param('sssis', $nama, $tgl, $alamat, $prodi_id, $nim);
    if ($stmt->execute()) {
        redirect('../index.php?page=mahasiswa');
    } else {
        echo 'Gagal update data mahasiswa: ' . $stmt->error;
    }
    $stmt->close();
}
?>