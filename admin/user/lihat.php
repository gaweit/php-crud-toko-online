<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include '../../koneksi.php';

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-warning mb-3">Kembali</a>
        <h2>Detail User</h2>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Username: <?= $row['username'] ?></h5>
                <p class="card-text">Password: <?= $row['password'] ?></p>
                <p class="card-text">Role: <?= $row['role'] ?></p>
            </div>
        </div>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>