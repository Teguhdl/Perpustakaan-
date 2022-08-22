<?php
// Memanggil koneksi database dari folder db
include '../db/koneksi.php';
error_reporting(0);

// Inisialisasi session
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_petugas WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_petugas VALUES ('', '$nama','$username','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: datapetugas.php");
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

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['edit'])){
    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM tb_petugas WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $sql = "UPDATE tb_petugas SET nama='$nama',
            username='$username', password='$password' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: datapetugas.php");
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
