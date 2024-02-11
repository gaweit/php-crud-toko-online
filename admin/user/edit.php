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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username='$username', password='$password', role='$role' WHERE id=$id";
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
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <a href="index.php" class="btn btn-warning mb-3">Kembali</a>
        <h2>Edit User</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" value="<?= $row['password'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" class="form-select" required>
                    <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="siswa" <?= $row['role'] == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                    <option value="guru" <?= $row['role'] == 'guru' ? 'selected' : '' ?>>Guru</option>
                    <option value="pimpinan" <?= $row['role'] == 'pimpinan' ? 'selected' : '' ?>>Pimpinan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>