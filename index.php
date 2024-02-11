<?php
include 'koneksi.php';

$result_produk = $koneksi->query("SELECT * FROM produk");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Tentang produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        padding-top: 56px;
        /* Menyesuaikan dengan tinggi navbar */
    }

    footer {
        background-color: #f8f9fa;
        padding: 20px 0;
    }

    .kategori-section {
        display: none;
    }

    /* Tambahkan CSS berikut di dalam tag <style> pada bagian head atau dalam file CSS terpisah */

    /* Menyesuaikan warna background dan teks item dropdown */
    .dropdown-item {
        background-color: #007bff;
        color: #ffffff;
    }

    /* Menyesuaikan warna background item dropdown saat dihover */
    .dropdown-item:hover {
        background-color: #0056b3;
    }

    /* Menyesuaikan warna background dropdown */
    .dropdown-menu {
        background-color: #007bff;
    }

    /* Menyesuaikan warna border dropdown */
    .dropdown-menu::before {
        border-bottom: 10px solid #007bff;
    }

    /* Menyesuaikan warna border bottom dropdown item saat dihover */
    .dropdown-item:hover::before {
        border-bottom: 8px solid #0056b3;
    }

    /* Menyesuaikan warna dropdown toggle */
    .navbar-dark .navbar-toggler-icon {
        background-color: #ffffff;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">BukaWarung</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Data produk
                        </a>
                        <div class="dropdown-menu" id="kategoriDropdown" aria-labelledby="navbarDropdown">
                            <?php
                            // Ambil daftar kategori produk
                            $result_kategori = $koneksi->query("SELECT * FROM kategori");
                            while ($kategori = $result_kategori->fetch_assoc()) {
                                echo '<a class="dropdown-item" href="#" data-kategori-id="' . $kategori['id'] . '">' . $kategori['nama'] . '</a>';
                            }
                            ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Slide Section -->
    <section class="container mt-1">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/sampul.png" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="img/sampul.png" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="img/sampul.png" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="container mt-1" id="tentang">
        <center>
            <h1>Produk BukaWarung </h1>

        </center>

    </section>

    <hr>

    <!-- Data produk Section -->
    <?php
    // Ambil daftar kategori produk
    $result_kategori = $koneksi->query("SELECT * FROM kategori");

    while ($kategori = $result_kategori->fetch_assoc()) {
        $kategori_id = $kategori['id'];
        $result_produk = $koneksi->query("SELECT * FROM produk WHERE kategori_id = $kategori_id");
    ?>
    <section class="container mt-4 kategori-section produk-section" id="produk-<?= $kategori_id ?>">

        <center>
            <h2>List produk - <?= $kategori['nama'] ?></h2>
        </center>
        <div class="row">
            <?php while ($produk = $result_produk->fetch_assoc()) : ?>
            <div class="col-md-4 mb-4">
                <!-- ... (bagian card tetap sama) ... -->
            </div>
            <!-- ... (bagian modal tetap sama) ... -->
            <?php endwhile; ?>
        </div>
    </section>
    <?php
    }
    ?>

    <!-- Kontak Section (dipindahkan ke footer) -->
    <footer class="container-fluid bg-dark text-white mt-4" id="kontak">
        <div class="container">
            <h2>Kontak Kami</h2>
            <p>Hubungi kami jika Anda memiliki pertanyaan atau membutuhkan bantuan.</p>

            <div class="row">
                <div class="col-md-4">
                    <h4>Info Kontak</h4>
                    <p><strong>Telepon:</strong> +62 123 456 789</p>
                    <p><strong>Email:</strong> info@websiteproduk.com</p>
                    <p><strong>Alamat:</strong> Jl. Contoh No. 123, Kota Contoh, Provinsi Contoh</p>
                    <p><strong>Kode Pos:</strong> 12345</p>
                </div>

                <div class="col-md-4">
                    <h4>Alamat Lengkap</h4>
                    <p>Jl. Contoh No. 123</p>
                    <p>Kota Contoh, Provinsi Contoh</p>
                    <p>Kode Pos: 12345</p>
                </div>

                <div class="col-md-4">
                    <h4>Temukan Kami</h4>
                    <p>Kunjungi kami di peta:</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.127208736788!2d106.79978081476902!3d-6.202759195514605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDIwJzI5LjAiUyAxAjEwNsKwNDInNTcuMCJF!5e0!3m2!1sen!2sid!4v1641294170103!5m2!1sen!2sid"
                        width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </footer>

    <!-- Menghilangkan atribut integrity pada tag script -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Aktifkan dropdown -->
    <script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
    </script>

    <!-- Script untuk menangani klik pada kategori -->
    <script>
    function hideAllprodukSections() {
        $('.produk-section').hide();
    }

    function showprodukSection(kategoriId) {
        hideAllprodukSections();
        $('#produk-' + kategoriId).show();
    }

    $(document).ready(function() {
        hideAllprodukSections(); // Sembunyikan semua section saat halaman dimuat

        $('#kategoriDropdown .dropdown-item').click(function(e) {
            e.preventDefault();
            var kategoriId = $(this).data('kategori-id');
            loadprodukByKategori(kategoriId);
        });
    });

    function loadprodukByKategori(kategoriId) {
        // Gunakan AJAX untuk memuat data produk sesuai dengan kategoriId
        $.ajax({
            type: 'GET',
            url: 'load_produk_by_kategori.php', // Ganti dengan URL sesuai dengan struktur proyek Anda
            data: {
                kategori_id: kategoriId
            },
            success: function(data) {
                // Gantilah kontennya dengan data produk yang baru
                $('#produk-' + kategoriId + ' .row').html(data);

                // Tampilkan section setelah memuat data
                showprodukSection(kategoriId);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    </script>


</body>

</html>