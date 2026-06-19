<?php
require_once 'Model.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = ['nama_member'=>'', 'nomor_member'=>'', 'alamat'=>'', 'tgl_mendaftar'=>''];
if ($id) $data = getDataById('member', 'id_member', $id);

if (isset($_POST['submit'])) {
    if ($id) editMember($id, $_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['tgl']);
    else tambahMember($_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['tgl']);
    header('Location: Member.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Member</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="stylesheet" href="FormStyle.css">
</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>
        <h2><?= $id ? 'Edit' : 'Tambah'; ?> Member</h2>
        <form action="" method="post">
            <div class="form-group"><label>Nama Member</label><input type="text" name="nama" value="<?= htmlspecialchars($data['nama_member']); ?>" required></div>
            <div class="form-group"><label>Nomor Member</label><input type="text" name="nomor" value="<?= htmlspecialchars($data['nomor_member']); ?>" required></div>
            <div class="form-group"><label>Alamat</label><textarea name="alamat" required><?= htmlspecialchars($data['alamat']); ?></textarea></div>
            <div class="form-group"><label>Tanggal Mendaftar</label><input type="date" name="tgl" value="<?= htmlspecialchars($data['tgl_mendaftar']); ?>" required></div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="Member.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>
</html>