<?php
include '../koneksi.php';

// Ambil ID produk dari parameter URL
$id_produk = isset($_GET['id']) ? $_GET['id'] : die('ID produk tidak valid.');

// Ambil data produk berdasarkan ID dari database
$query = "SELECT produk.*, kategori.nama AS nama_kategori FROM produk
LEFT JOIN kategori ON produk.kategori_id = kategori.id WHERE produk.id = $id_produk";
$result = $koneksi->query($query);

// Cek apakah data produk ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die('Data produk tidak ditemukan.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Detail produk</h2>
        <table class="table table-bordered">
            <tr>
                <td colspan="2"><img style="width: 300px;" src="uploads/<?= $row['foto'] ?>" alt="foto produk"></td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td><?= $row['nama'] ?></td>
            </tr>
            <tr>
                <td><strong>Kategori</strong></td>
                <td><?= $row['nama_kategori'] ?></td>
            </tr>
            <tr>
                <td><strong>Deskripsi</strong></td>
                <td><?= $row['deskripsi'] ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>