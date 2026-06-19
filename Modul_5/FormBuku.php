<?php
require_once 'Model.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = ['judul_buku'=>'', 'penulis'=>'', 'penerbit'=>'', 'tahun_terbit'=>''];
if ($id) $data = getDataById('buku', 'id_buku', $id);

if (isset($_POST['submit'])) {
    if ($id) editBuku($id, $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    else tambahBuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    header('Location: Buku.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="FormStyle.css">
</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>
        <h2><?= $id ? 'Edit' : 'Tambah'; ?> Buku</h2>
        <form action="" method="post">
            <div class="form-group"><label>Judul Buku</label><input type="text" name="judul" value="<?= htmlspecialchars($data['judul_buku']); ?>" required></div>
            <div class="form-group"><label>Penulis</label><input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']); ?>" required></div>
            <div class="form-group"><label>Penerbit</label><input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']); ?>" required></div>
            <div class="form-group"><label>Tahun Terbit</label><input type="number" name="tahun" value="<?= htmlspecialchars($data['tahun_terbit']); ?>" required></div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="Buku.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>
</html>