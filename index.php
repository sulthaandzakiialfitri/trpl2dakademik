<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="index.php">Akademik</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=mahasiswa">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=prodi">Program Studi</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user-circle"></i>
                            <?= htmlspecialchars($_SESSION['nama_lengkap']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="index.php?page=profile-edit">
                                    <i class="fa-solid fa-user-pen me-2"></i> Edit Profil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="logout.php"
                                    onclick="return confirm('Yakin ingin keluar?')">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Keluar
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php
        $page = $_GET['page'] ?? 'home';

        switch ($page) {

            case 'home':
                include "home.php";
                break;

            // ===== MAHASISWA =====
            case 'mahasiswa':
                include "mahasiswa/list.php";
                break;

            case 'mahasiswa-create':
                include "mahasiswa/create.php";
                break;

            case 'mahasiswa-edit':
                include "mahasiswa/edit.php";
                break;

            // ===== PRODI =====
            case 'prodi':
                include "prodi/list.php";
                break;

            case 'prodi-create':
                include "prodi/create.php";
                break;

            case 'prodi-edit':
                include "prodi/edit.php";
                break;

            // ===== PROFILE =====
            case 'profile-edit':
                include "edit_profil.php";
                break;

            default:
                echo "<div class='alert alert-danger'>Halaman tidak ditemukan</div>";
        }
        ?>
    </div>

</body>

</html>