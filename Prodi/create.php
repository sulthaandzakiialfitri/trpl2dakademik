<html>
<head>
    <title>Input Prodi</title>
</head>
<body>
    <div class="container-sm py-4 px-5">
        <h3>Form Input Data Prodi</h3>
        <form action="prodi/proses.php" method="post" class="my-5">
            
            <div class="mb-3">
                <label class="form-label">Nama Prodi</label>
                <input name="nama_prodi" type="text" class="form-control" placeholder="Masukkan nama prodi" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select name="jenjang" class="form-select" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D4">D4</option>
                    <option value="D3">D3</option>
                    <option value="D2">D2</option>
                    <option value="S2">S2</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan..." required></textarea>
            </div>

            <input type="submit" value="Simpan Data" name="submit_prodi" class="btn btn-primary">
            <input type="reset" value="Reset" name="reset" class="btn btn-danger">
        </form>
    </div>
</body>
</html>