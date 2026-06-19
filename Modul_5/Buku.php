<?php 
require_once 'Model.php';
if (isset($_GET['hapus'])) {
    hapusData('buku', 'id_buku', $_GET['hapus']);
    header('Location: Buku.php'); exit;
}
$buku = getAllData('buku');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="TableStyle.css">
</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>
        <h2>Daftar Buku</h2>
        <a href="FormBuku.php" class="btn btn-primary btn-add">Tambah Buku Baru</a>
        <table>
            <tr><th>Judul Buku</th><th>Penulis</th><th>Penerbit</th><th>Tahun Terbit</th><th>Aksi</th></tr>
            <?php foreach ($buku as $b) : ?>
            <tr>
                <td><?= htmlspecialchars($b['judul_buku']); ?></td>
                <td><?= htmlspecialchars($b['penulis']); ?></td>
                <td><?= htmlspecialchars($b['penerbit']); ?></td>
                <td><?= htmlspecialchars($b['tahun_terbit']); ?></td>
                <td>
                    <a href="FormBuku.php?id=<?= $b['id_buku']; ?>" class="btn btn-warning">Edit</a>
                    <a href="Buku.php?hapus=<?= $b['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>