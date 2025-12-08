<?php
//include , require
require 'koneksi.php';

if(isset($_POST['submit']));
{
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    
    $query = "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat)
                VALUES('$nim','$nama_mhs','$tgl_lahir','$alamat')";
    
    $sql = $koneksi->query($query);
    if ($sql) {
        echo "Berhasil menyimpan data";
    } else {
        echo "Gagal menyimpan data";
    }
}


?>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<br><br>
<a href="list.php" class="btn btn-primary">Lihat data mahasiswa</a>
