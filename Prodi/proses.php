<?php
require __DIR__ . '/../koneksi.php';

function redirect($url){ header('Location: ' . $url); exit(); }

// INSERT PRODI
if (isset($_POST['submit_prodi'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $stmt = $koneksi->prepare("INSERT INTO prodi (nama_prodi, jenjang, keterangan) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $nama_prodi, $jenjang, $keterangan);
    if ($stmt->execute()) {
        redirect('../index.php?page=prodi');
    } else {
        echo 'Gagal simpan data prodi: ' . $stmt->error;
    }
    $stmt->close();
}

// DELETE PRODI
if (isset($_GET['id_prodi'])) {
    $id = (int) $_GET['id_prodi'];

    // Cek relasi
    $check = $koneksi->prepare("SELECT COUNT(*) as cnt FROM mahasiswa WHERE prodi_id = ?");
    $check->bind_param('i', $id);
    $check->execute();
    $res = $check->get_result();
    $row = $res->fetch_assoc();
    $check->close();

    if ($row['cnt'] > 0) {
        echo 'Tidak dapat menghapus prodi karena masih ada mahasiswa yang terkait.';
        exit();
    }

    $stmt = $koneksi->prepare("DELETE FROM prodi WHERE id = ?");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        redirect('../index.php?page=prodi');
    } else {
        echo 'Gagal menghapus data prodi: ' . $stmt->error;
    }
    $stmt->close();
}

// UPDATE PRODI
if (isset($_POST['update_prodi'])) {
    $id = (int) $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $stmt = $koneksi->prepare("UPDATE prodi SET nama_prodi=?, jenjang=?, keterangan=? WHERE id=?");
    $stmt->bind_param('sssi', $nama_prodi, $jenjang, $keterangan, $id);
    if ($stmt->execute()) {
        redirect('../index.php?page=prodi');
    } else {
        echo 'Gagal update data prodi: ' . $stmt->error;
    }
    $stmt->close();
}
?>