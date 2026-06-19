<?php 
require_once 'Model.php';
if (isset($_GET['hapus'])) {
    hapusData('peminjaman', 'id_peminjaman', $_GET['hapus']);
    header('Location: Peminjaman.php'); exit;
}
$peminjaman = getAllPeminjaman();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="TableStyle.css">
</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>
        <h2>Daftar Peminjaman</h2>
        <a href="FormPeminjaman.php" class="btn btn-primary btn-add">Tambah Peminjaman</a>
        <table>
            <tr><th>ID</th><th>Nama Peminjam</th><th>Buku yang Dipinjam</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Aksi</th></tr>
            <?php foreach ($peminjaman as $p) : ?>
            <tr>
                <td><?= htmlspecialchars($p['id_peminjaman']); ?></td>
                <td><?= htmlspecialchars($p['nama_member']); ?></td>
                <td><?= htmlspecialchars($p['judul_buku']); ?></td>
                <td><?= htmlspecialchars($p['tgl_pinjam']); ?></td>
                <td><?= htmlspecialchars($p['tgl_kembali']); ?></td>
                <td>
                    <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                    <a href="Peminjaman.php?hapus=<?= $p['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>