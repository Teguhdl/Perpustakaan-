<?php
// Memanggil koneksi database dari folder db
include '../db/koneksi.php';
error_reporting(0);

// Inisialisasi session
session_start();

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['edit'])){
    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_anggota WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $sql = "UPDATE tb_anggota SET nama='$nama',
            username='$username', password='$password',jenis_kelamin='$jenis_kelamin',alamat='$alamat',no_hp='$no_hp' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: dataanggota.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
    
    ?>
