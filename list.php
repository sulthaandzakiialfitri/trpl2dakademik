<?php
require 'koneksi.php';

$tampil = $koneksi->query("SELECT * FROM prodi");
$i = 1;
?>

<h2 class="mb-3">List Prodi</h2>

<a class="btn btn-primary mb-3" href="index.php?page=prodi-create" role="button">
    Tambah Program Studi
</a>

<table class="table table-hover table-bordered my-2">
    <thead>
        <tr class="table-primary text-center">
            <th>NO</th>
            <th>KODE PRODI</th>
            <th>NAMA PRODI</th>
            <th>JENJANG</th>
            <th>KETERANGAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($data = mysqli_fetch_assoc($tampil)): ?>
            <tr>
                <td class="text-center"><?= $i++; ?></td>
                <td class="text-center"><?= htmlspecialchars($data['id']); ?></td>
                <td><?= htmlspecialchars($data['nama_prodi']); ?></td>
                <td class="text-center"><?= htmlspecialchars($data['jenjang']); ?></td>
                <td><?= htmlspecialchars($data['keterangan']); ?></td>
                <td class="text-center">
                    <a class="btn btn-warning btn-sm" href="index.php?page=prodi-edit&id=<?= $data['id']; ?>">
                        Edit
                    </a>
                    |
                    <a class="btn btn-danger btn-sm" href="prodi/proses.php?id=<?= $data['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>