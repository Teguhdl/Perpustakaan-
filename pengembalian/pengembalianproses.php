<?php
include '../db/koneksi.php';

// cek apakah tombol daftar sudah diklik atau blum?
    if(isset($_POST['kembali'])){
        $id_pinjam = $_POST['id'];
        $id_anggota = $_POST['id_anggota'];
        $id_buku = $_POST['id_buku'];
        $id_petugas = $_POST['id_petugas'];

    // buat query
    $sql = "INSERT INTO tb_pengembalian (id_pinjam, id_anggota, id_buku ,tgl_kembali ,id_petugas ) VALUES ('$id_pinjam','$id_anggota','$id_buku',CURDATE(),'$id_petugas')";
    $query = mysqli_query($conn,$sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        $sql = "DELETE FROM tb_peminjaman WHERE id = '$id_pinjam'";
        $query = mysqli_query($conn, $sql);
        header('Location: ../peminjaman/datapeminjam.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header ('Gagal menyimpan');

    }
}
?>