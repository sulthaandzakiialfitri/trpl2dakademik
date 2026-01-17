<html>

<head>
    <title>Edit Mahasiswa</title>
</head>

<body>
    <div class="container-sm py-4 px-5">
        <?php
        require __DIR__ . '/../koneksi.php';
        $nim_target = isset($_GET['nim']) ? $_GET['nim'] : '';
        $stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param('s', $nim_target);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_assoc();
        $stmt->close();

        if (!$data) {
            header('Location: ../index.php?page=mahasiswa');
            exit();
        }
        ?>

        <h3>Edit Data Mahasiswa</h3>
        <form action="mahasiswa/proses.php" method="post">

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input name="nim" type="text" class="form-control" value="<?php echo $data['nim']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input name="nama_mahasiswa" type="text" class="form-control"
                    value="<?php echo $data['nama_mahasiswa']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input name="tgl_lahir" type="date" class="form-control" value="<?php echo $data['tgl_lahir']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prodi</label>
                <?php
                $prodi_list = $koneksi->query("SELECT * FROM prodi ORDER BY nama_prodi");
                ?>
                <select name="prodi_id" class="form-select" required>
                    <option value="">-- Pilih Prodi --</option>
                    <?php while ($row = mysqli_fetch_assoc($prodi_list)) { ?>
                        <option value="<?= $row['id'] ?>" <?php if ($data['prodi_id'] == $row['id'])
                              echo 'selected'; ?>>
                            <?= $row['nama_prodi'] ?> (<?= $row['jenjang'] ?>)</option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
            </div>

            <input type="submit" value="Update Data" name="update" class="btn btn-primary">
            <a href="../index.php?page=mahasiswa" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>

</html>