<?php
include '../koneksi.php';

// Ambil ID buah dari parameter URL
$id_buah = isset($_GET['id']) ? $_GET['id'] : die('ID buah tidak valid.');

// Ambil data buah berdasarkan ID dari database
$query = "SELECT buah.*, kategori.nama AS nama_kategori FROM buah
LEFT JOIN kategori ON buah.kategori_id = kategori.id WHERE buah.id = $id_buah";
$result = $koneksi->query($query);

// Cek apakah data buah ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die('Data buah tidak ditemukan.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail buah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Detail buah</h2>
        <table class="table table-bordered">
            <tr>
                <td colspan="2"><img style="width: 300px;" src="uploads/<?= $row['foto'] ?>" alt="foto buah"></td>
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