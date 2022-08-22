<?php
include '../db/koneksi.php';

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

// ambil data dari formulir
$tgl_pinjam = $_POST['tgl_pinjam'];
$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$id_petugas = $_POST['id_petugas'];



    // buat query
    $sql = "INSERT INTO tb_peminjaman (tgl_pinjam, id_buku, id_anggota, id_petugas ) VALUES ('$tgl_pinjam','$id_buku','$id_anggota','$id_petugas')";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: datapeminjam.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header ('Gagal menyimpan');

    }
}


// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['edit'])){
// ambil data dari formulir
$id = $_POST['id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$id_buku = $_POST['id_buku'];
$id_anggota = $_POST['id_anggota'];
$id_petugas = $_POST['id_petugas'];

// buat query update
$sql = "UPDATE tb_peminjaman SET tgl_pinjam='$tgl_pinjam',
id_buku='$id_buku', id_anggota='$id_anggota', id_petugas='$id_petugas' WHERE id=$id";
$query = mysqli_query($conn, $sql);
// apakah query update berhasil?
if( $query ) {
// kalau berhasil alihkan ke halaman list-siswa.php
header('Location: datapeminjam.php');
} else {
// kalau gagal tampilkan pesan
die("Gagal menyimpan perubahan...");
}
} else {
die("Akses gagal...");
}

?>
