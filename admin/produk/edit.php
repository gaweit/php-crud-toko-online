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

// Proses form jika ada data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $kategori_id = $_POST['kategori_id'];
    $deskripsi = $_POST['deskripsi'];

    // Cek apakah file foto diupload
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        // Proses upload foto baru
        $foto = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($temp, "uploads/$foto");

        // Hapus foto lama jika ada
        if ($row['foto']) {
            unlink("uploads/" . $row['foto']);
        }
    } else {
        // Gunakan foto yang sudah ada jika tidak ada upload baru
        $foto = $row['foto'];
    }

    // Update data produk ke database
    $update_query = "UPDATE produk SET nama = '$nama', kategori_id = $kategori_id, deskripsi = '$deskripsi', foto = '$foto' WHERE id = $id_produk";

    if ($koneksi->query($update_query)) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Gagal mengupdate data produk: ' . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit produk</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama produk</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori produk</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    <?php
                    $kategori = $koneksi->query("SELECT * FROM kategori ORDER BY id DESC");
                    foreach ($kategori as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $row['kategori_id'] == $item['id'] ? 'selected' : '' ?>>
                            <?= $item['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi produk</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $row['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto produk</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <?php if ($row['foto']) : ?>
                    <img src="uploads/<?= $row['foto'] ?>" alt="foto produk" class="mt-2" style="max-width: 300px;">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <div class=" mt-5"></div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>