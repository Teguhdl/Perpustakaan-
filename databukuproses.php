<?php
include './db/koneksi.php';

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

// ambil data dari formulir
$judul_buku = $_POST['judul_buku'];
$jenis_buku = $_POST['jenis_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_penerbit = $_POST['thn'];


    // buat query
    $sql = "INSERT INTO tb_buku (judul_buku, jenis_buku, pengarang, penerbit, tahun_penerbit) VALUES ('$judul_buku','$jenis_buku','$pengarang','$penerbit','$tahun_penerbit')";
    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location:../databuku.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location:../databuku.php?status=gagal');
    }
}


// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['edit'])){
// ambil data dari formulir
$id = $_POST['id'];
$judul_buku = $_POST['judul_buku'];
$jenis_buku = $_POST['jenis_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_penerbit = $_POST['thn'];

// buat query update
$sql = "UPDATE tb_buku SET judul_buku='$judul_buku',
jenis_buku='$jenis_buku', pengarang='$pengarang', penerbit='$penerbit', tahun_penerbit='$tahun_penerbit' WHERE id=$id";
$query = mysqli_query($conn, $sql);
// apakah query update berhasil?
if( $query ) {
// kalau berhasil alihkan ke halaman list-siswa.php
header('Location: databuku.php');
} else {
// kalau gagal tampilkan pesan
die("Gagal menyimpan perubahan...");
}
} else {
die("Akses gagal...");
}

?>
