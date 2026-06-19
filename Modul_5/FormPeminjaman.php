<?php
require_once 'Model.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = ['id_member'=>'', 'id_buku'=>'', 'tgl_pinjam'=>'', 'tgl_kembali'=>''];

$all_member = getAllData('member');
$all_buku = getAllData('buku');

if ($id) $data = getDataById('peminjaman', 'id_peminjaman', $id);

if (isset($_POST['submit'])) {
    if ($id) editPeminjaman($id, $_POST['id_member'], $_POST['id_buku'], $_POST['tgl_p'], $_POST['tgl_k']);
    else tambahPeminjaman($_POST['id_member'], $_POST['id_buku'], $_POST['tgl_p'], $_POST['tgl_k']);
    header('Location: Peminjaman.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="FormStyle.css">
</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>
        <h2><?= $id ? 'Edit' : 'Tambah'; ?> Peminjaman</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Nama Peminjam</label>
                <select name="id_member" required>
                    <option value="">-- Pilih Member --</option>
                    <?php foreach ($all_member as $m) : ?>
                        <option value="<?= $m['id_member']; ?>" <?= $m['id_member'] == $data['id_member'] ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($m['nama_member']); ?> (<?= htmlspecialchars($m['nomor_member']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Buku yang Dipinjam</label>
                <select name="id_buku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php foreach ($all_buku as $b) : ?>
                        <option value="<?= $b['id_buku']; ?>" <?= $b['id_buku'] == $data['id_buku'] ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($b['judul_buku']); ?> - <?= htmlspecialchars($b['penulis']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group"><label>Tanggal Pinjam</label><input type="date" name="tgl_p" value="<?= htmlspecialchars($data['tgl_pinjam']); ?>" required></div>
            <div class="form-group"><label>Tanggal Kembali</label><input type="date" name="tgl_k" value="<?= htmlspecialchars($data['tgl_kembali']); ?>" required></div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="Peminjaman.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>
</html>