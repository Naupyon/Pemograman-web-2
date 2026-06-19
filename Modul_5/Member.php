<?php 
require_once 'Model.php';
if (isset($_GET['hapus'])) {
    hapusData('member', 'id_member', $_GET['hapus']);
    header('Location: Member.php'); exit;
}
$members = getAllData('member');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Member</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="TableStyle.css">
</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>
        <h2>Daftar Member</h2>
        <a href="FormMember.php" class="btn btn-primary btn-add">Tambah Member Baru</a>
        <table>
            <tr><th>Nama</th><th>Nomor Member</th><th>Alamat</th><th>Tgl Mendaftar</th><th>Aksi</th></tr>
            <?php foreach ($members as $m) : ?>
            <tr>
                <td><?= htmlspecialchars($m['nama_member']); ?></td>
                <td><?= htmlspecialchars($m['nomor_member']); ?></td>
                <td><?= htmlspecialchars($m['alamat']); ?></td>
                <td><?= htmlspecialchars($m['tgl_mendaftar']); ?></td>
                <td>
                    <a href="FormMember.php?id=<?= $m['id_member']; ?>" class="btn btn-warning">Edit</a>
                    <a href="Member.php?hapus=<?= $m['id_member']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>