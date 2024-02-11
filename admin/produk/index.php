<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include '../koneksi.php';

// $result = $koneksi->query("SELECT * FROM produk ORDER BY id DESC");

$result = $koneksi->query("SELECT produk.*, kategori.nama AS nama_kategori FROM produk
                            LEFT JOIN kategori ON produk.kategori_id = kategori.id
                            ORDER BY produk.id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <a href="../index.php" class="btn btn-warning mb-3">Beranda</a>
        <h2>Data produk</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah produk</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>WA</th>
                    <!-- <th>Deskripsi</th> -->
                    <th>foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $urutan = 1 ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $urutan++ ?></td>
                        <td><?= $row['nama_kategori'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['wa'] ?></td>
                        <!-- <td><?= $row['deskripsi'] ?></td> -->
                        <td style="width: 200px;"><img style="width: 200px;" src="uploads/<?= $row['foto'] ?>" alt="">
                        </td>
                        <td>
                            <a href="lihat.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">lihat</a>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>