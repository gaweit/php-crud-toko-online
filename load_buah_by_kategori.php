<?php
include 'koneksi.php';

if (isset($_GET['kategori_id'])) {
    $kategoriId = $_GET['kategori_id'];
    $result_buah = $koneksi->query("SELECT * FROM buah WHERE kategori_id = $kategoriId");

    ob_start();

    while ($buah = $result_buah->fetch_assoc()) {
?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="admin/buah/uploads/<?= $buah['foto'] ?>" class="card-img-top" alt="<?= $buah['nama'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $buah['nama'] ?></h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $buah['id'] ?>">
                        Detail
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalDetail<?= $buah['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel"><?= $buah['nama'] ?></h5>
                    </div>
                    <div class="modal-body">
                        <p><?= $buah['deskripsi'] ?></p>
                    </div>
                    <div class="modal-footer">
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