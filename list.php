<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<h1 class="mt-3">Data Mahasiswa</h1>
<a href="index.php?page=create"></a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'koneksi.php';
        $tampil = $koneksi->query('SELECT * FROM mahasiswa');
        while ($data = mysqli_fetch_assoc($tampil)) {
            ?>
            <tr>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama_mhs'] ?></td>
                <td><?= $data['tgl_lahir'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td>
                    <a href="index.php?page=edit&nim=<?= $data['nim'] ?>" class="btn btn-primary">Edit</a>
                    <a href="hapus.php?nim=<?= $data['nim'] ?>" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>