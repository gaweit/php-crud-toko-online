<?php
include '../koneksi.php';

// Ambil ID kategori dari parameter URL
$id_kategori = isset($_GET['id']) ? $_GET['id'] : die('ID kategori tidak valid.');

// Ambil data kategori berdasarkan ID dari database
$query = "SELECT * FROM kategori WHERE id = $id_kategori";
$result = $koneksi->query($query);

// Cek apakah data kategori ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die('Data kategori tidak ditemukan.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h2>Detail kategori</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td><?= $row['nama'] ?></td>
                </tr>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>