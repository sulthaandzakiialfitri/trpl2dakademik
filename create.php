<html>

<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="proses.php">
        <div class="container">
            <h3 class="mt-3">Data Mahasiswa</h3>
             <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_mhs" id="nama_mhs">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"></textarea>
                <td>&nbsp;</td>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
</body>

</html>