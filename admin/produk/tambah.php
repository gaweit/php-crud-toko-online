<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $wa = $_POST['wa'];
    $kategori_id = $_POST['kategori_id'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $path = 'uploads/';

    // Proses upload foto
    move_uploaded_file($tmp_name, $path . $foto);

    // Simpan data produk beserta kolom-kolom baru
    $query = "INSERT INTO produk (nama,wa, kategori_id, deskripsi,  foto) 
              VALUES ('$nama','$wa', '$kategori_id', '$deskripsi',  '$foto')";

    $koneksi->query($query);

    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah produk</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Tambahkan enctype untuk mendukung upload file -->
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori:</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <?php
                    $kategori = $koneksi->query("SELECT * FROM kategori ORDER BY id DESC");
                    foreach ($kategori as $item) { ?>
                    <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">deskripsi:</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="wa" class="form-label">wa:</label>
                <input type="text" name="wa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">foto:</label>
                <input type="file" name="foto" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-danger">Back</a>
        </form>

    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>