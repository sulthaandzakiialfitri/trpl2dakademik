<html>
<head>
    <title>Edit Prodi</title>
</head>
<body>
    <div class="container-sm py-4 px-5">
        <?php
        require __DIR__ . '/../koneksi.php';
        // Mengambil data berdasarkan parameter id dari URL (prepared statement)
        $id_target = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $stmt = $koneksi->prepare("SELECT * FROM prodi WHERE id = ?");
        $stmt->bind_param('i', $id_target);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_assoc();
        $stmt->close();

        if (!$data) {
            header('Location: ../index.php?page=prodi');
            exit();
        }
        ?>
 
        <h3>Edit Data Prodi</h3>
        <form action="prodi/proses.php" method="post">
            
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input name="id" type="number" class="form-control" value="<?php echo $data['id']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Prodi</label>
                <input name="nama_prodi" type="text" class="form-control" value="<?php echo $data['nama_prodi']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select name="jenjang" class="form-select" required>
                    <option value="D4" <?php if($data['jenjang'] == 'D4') echo 'selected'; ?>>D4</option>
                    <option value="D3" <?php if($data['jenjang'] == 'D3') echo 'selected'; ?>>D3</option>
                    <option value="D2" <?php if($data['jenjang'] == 'D2') echo 'selected'; ?>>D2</option>
                    <option value="S2" <?php if($data['jenjang'] == 'S2') echo 'selected'; ?>>S2</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" required><?php echo $data['keterangan']; ?></textarea>
            </div>

            <input type="submit" value="Update Data" name="update_prodi" class="btn btn-primary">
            <a href="../index.php?page=prodi" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>
</html>