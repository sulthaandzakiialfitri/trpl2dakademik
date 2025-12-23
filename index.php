<html>
<head>
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php include 'components/navbar.php'; ?>

    <div class="container my-5">
       <?php
       $page = isset($_GET['page']) ? $_GET['page'] : 'home';

       if($page == 'home') include 'home.php';
       // Mahasiswa routes
       if($page == 'mahasiswa') include 'mahasiswa/list.php'; // Mengarah ke list mahasiswa
       if($page == 'mahasiswa-create') include 'mahasiswa/create.php';
       if($page == 'mahasiswa-edit') include 'mahasiswa/edit.php';

       // Prodi routes
       if($page == 'prodi') include 'prodi/list.php'; // Mengarah ke list prodi
       if($page == 'prodi-create') include 'prodi/create.php';
       if($page == 'prodi-edit') include 'prodi/edit.php';
       ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>