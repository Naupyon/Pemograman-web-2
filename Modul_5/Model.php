<?php
require_once 'Koneksi.php';

function getAllData($tabel) {
    global $koneksi;
    try {
        $stmt = $koneksi->query("SELECT * FROM $tabel");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Gagal mengambil data: " . $e->getMessage());
    }
}

function getDataById($tabel, $id_kolom, $id) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("SELECT * FROM $tabel WHERE $id_kolom = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        die("Gagal mengambil data spesifik: " . $e->getMessage());
    }
}

function getAllPeminjaman() {
    global $koneksi;
    try {
        $query = "SELECT peminjaman.*, member.nama_member, buku.judul_buku 
                  FROM peminjaman
                  INNER JOIN member ON peminjaman.id_member = member.id_member
                  INNER JOIN buku ON peminjaman.id_buku = buku.id_buku";
        $stmt = $koneksi->query($query);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Gagal mengambil data peminjaman: " . $e->getMessage());
    }
}

function tambahMember($nama, $nomor, $alamat, $tgl) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar) VALUES (:nama, :nomor, :alamat, :tgl)");
        return $stmt->execute(['nama' => $nama, 'nomor' => $nomor, 'alamat' => $alamat, 'tgl' => $tgl]);
    } catch (PDOException $e) {
        die("Gagal menambah member: " . $e->getMessage());
    }
}

function tambahBuku($judul, $penulis, $penerbit, $tahun) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (:judul, :penulis, :penerbit, :tahun)");
        return $stmt->execute(['judul' => $judul, 'penulis' => $penulis, 'penerbit' => $penerbit, 'tahun' => $tahun]);
    } catch (PDOException $e) {
        die("Gagal menambah buku: " . $e->getMessage());
    }
}

function tambahPeminjaman($id_member, $id_buku, $tgl_p, $tgl_k) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (:id_member, :id_buku, :tgl_p, :tgl_k)");
        return $stmt->execute(['id_member' => $id_member, 'id_buku' => $id_buku, 'tgl_p' => $tgl_p, 'tgl_k' => $tgl_k]);
    } catch (PDOException $e) {
        die("Gagal menambah peminjaman: " . $e->getMessage());
    }
}

function editMember($id, $nama, $nomor, $alamat, $tgl) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("UPDATE member SET nama_member = :nama, nomor_member = :nomor, alamat = :alamat, tgl_mendaftar = :tgl WHERE id_member = :id");
        return $stmt->execute(['id' => $id, 'nama' => $nama, 'nomor' => $nomor, 'alamat' => $alamat, 'tgl' => $tgl]);
    } catch (PDOException $e) {
        die("Gagal mengedit member: " . $e->getMessage());
    }
}

function editBuku($id, $judul, $penulis, $penerbit, $tahun) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("UPDATE buku SET judul_buku = :judul, penulis = :penulis, penerbit = :penerbit, tahun_terbit = :tahun WHERE id_buku = :id");
        return $stmt->execute(['id' => $id, 'judul' => $judul, 'penulis' => $penulis, 'penerbit' => $penerbit, 'tahun' => $tahun]);
    } catch (PDOException $e) {
        die("Gagal mengedit buku: " . $e->getMessage());
    }
}

function editPeminjaman($id, $id_member, $id_buku, $tgl_p, $tgl_k) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("UPDATE peminjaman SET id_member = :id_member, id_buku = :id_buku, tgl_pinjam = :tgl_p, tgl_kembali = :tgl_k WHERE id_peminjaman = :id");
        return $stmt->execute(['id' => $id, 'id_member' => $id_member, 'id_buku' => $id_buku, 'tgl_p' => $tgl_p, 'tgl_k' => $tgl_k]);
    } catch (PDOException $e) {
        die("Gagal mengedit peminjaman: " . $e->getMessage());
    }
}

function hapusData($tabel, $id_kolom, $id) {
    global $koneksi;
    try {
        $stmt = $koneksi->prepare("DELETE FROM $tabel WHERE $id_kolom = :id");
        return $stmt->execute(['id' => $id]);
    } catch (PDOException $e) {
        die("Gagal menghapus data: " . $e->getMessage());
    }
}
?>