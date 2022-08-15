<?php 
// Memanggil koneksi database dari folder db
include './db/koneksi.php';

error_reporting(0);

// Inisialisasi session
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tb_petugas WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>
