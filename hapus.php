<?php
include "koneksi.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    $sql = $koneksi->query($query);
    if ($sql) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php?page=datamhs';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
} else {
    echo "NIM tidak ditemukan. Pastikan link hapus benar.";
}
?>