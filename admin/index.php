<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include '../koneksi.php';

// $result = $koneksi->query("SELECT * FROM siswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Dashboard <span><a href="logout.php" class="btn btn-danger">Logout</a></span></h2>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data kategori</h5>
                        <p class="card-text">Lihat dan kelola data kategori.</p>
                        <a href="kategori/index.php" class="btn btn-primary">Lihat Data kategori</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data produk</h5>
                        <p class="card-text">Lihat dan kelola data produk.</p>
                        <a href="produk/index.php" class="btn btn-primary">Lihat Data produk</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data user</h5>
                        <p class="card-text">Lihat dan kelola data user.</p>
                        <a href="user/index.php" class="btn btn-primary">Lihat Data user</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>