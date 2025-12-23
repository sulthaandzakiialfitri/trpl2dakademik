<html>

<head>
    <title>Input Mahasiswa</title>
</head>

<body>
    <div class="container-sm py-4 px-5">
        <h3>Form Input Data Mahasiswa</h3>
        <form action="mahasiswa/proses.php" method="post" class="my-5">

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input name="nim" type="text" class="form-control" placeholder="Masukkan NIM (Nomor Induk Mahasiswa)"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input name="nama_mahasiswa" type="text" class="form-control" placeholder="Masukkan nama lengkap"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input name="tgl_lahir" type="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prodi</label>
                <?php
                require __DIR__ . '/../koneksi.php';
                $prodi_list = $koneksi->query("SELECT * FROM prodi ORDER BY nama_prodi");
                ?>
                <select name="prodi_id" class="form-select" required>
                    <option value="">-- Pilih Prodi --</option>
                    <?php while ($row = mysqli_fetch_assoc($prodi_list)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama_prodi'] ?> (<?= $row['jenjang'] ?>)</option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap..."
                    required></textarea>
            </div>

            <input type="submit" value="Simpan Data" name="submit" class="btn btn-primary">
            <input type="reset" value="Reset" name="reset" class="btn btn-danger">
        </form>
    </div>
</body>

</html>