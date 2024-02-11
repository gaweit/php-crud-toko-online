<?php
include 'koneksi.php';

if (isset($_GET['kategori_id'])) {
    $kategoriId = $_GET['kategori_id'];
    $result_produk = $koneksi->query("SELECT * FROM produk WHERE kategori_id = $kategoriId");

    ob_start();

    while ($produk = $result_produk->fetch_assoc()) {
?>
<div class="col-md-4 mb-4">
    <div class="card">
        <a data-bs-toggle="modal" data-bs-target="#modalDetail<?= $produk['id'] ?>" href="#">
            <img src="admin/produk/uploads/<?= $produk['foto'] ?>" class="card-img-top" alt="<?= $produk['nama'] ?>">
        </a>
        <div class="card-body">
            <h5 class="card-title"><?= $produk['nama'] ?></h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modalDetail<?= $produk['id'] ?>">
                Detail
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail<?= $produk['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="admin/produk/uploads/<?= $produk['foto'] ?>" class="card-img-top"
                    alt="<?= $produk['nama'] ?>">
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel"><?= $produk['nama'] ?></h5>
            </div>
            <div class="modal-body">
                <p><?= $produk['deskripsi'] ?></p>
            </div>
            <div class="modal-footer">
                <a href="https://wa.me/<?= $produk['wa'] ?>" target="_blank" rel="noopener noreferrer"
                    class="btn btn-primary">
                    Pesan Sekarang</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php
    }

    $resultHtml = ob_get_clean();
    echo $resultHtml;
}
?>