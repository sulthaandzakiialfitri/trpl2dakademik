<h1>Data Mahasiswa</h1>
<a href="index.php?page=mahasiswa-create" class="btn btn-primary my-1">Input Mahasiswa Baru</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Prodi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require __DIR__ . '/../koneksi.php';
        // Mengambil data dari tabel mahasiswa dengan nama prodi
        $tampil = $koneksi->query("SELECT m.*, p.nama_prodi FROM mahasiswa m LEFT JOIN prodi p ON m.prodi_id = p.id");
        $i = 1;

        while ($data = mysqli_fetch_assoc($tampil)) {
            ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data['nim']; ?></td>
                <td><?= $data['nama_mahasiswa']; ?></td>
                <td><?= $data['tgl_lahir']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= !empty($data['nama_prodi']) ? $data['nama_prodi'] : '-'; ?></td>
                <td>
                    <a href="index.php?nim=<?= $data['nim'] ?>&page=mahasiswa-edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="mahasiswa/proses.php?nim=<?= $data['nim'] ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin menghapus data mahasiswa ini?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>