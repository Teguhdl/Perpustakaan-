<?php
include './db/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="template/assets/img/favicon.png" rel="icon">
  <link href="template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="template/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="template/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="template/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="template/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="template/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/images/logo.jpg" alt="">
        <span class="d-none d-lg-block">Perpustakaan</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="template/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Teguh</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kel Biru</h6>
              <span>Teguh</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Perpustakaan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="databuku.php">
              <i class="bi bi-circle"></i><span>Data Buku</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Data Petugas</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Data Anggota</span>
            </a>
          </li>
        </ul>
      </li>


          <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Peminjaman</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Peminjaman</span>
            </a>
          </li>
          <li>
          <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Pengembalian</span>
            </a>
          </li>
        </ul>

          <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-grid"></i>
          <span>Data Denda</span>
        </a>
      </li>
          </li>
          


     <!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->
                                <!-- Form input data buku -->
                                <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Data Buku</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ubah Data Buku</h5>

                    <?php

                   
                    $query = mysqli_query($conn, 
                    "SELECT * FROM tb_buku WHERE id =
                    '".$_GET["id"]."'");
                    if ($data = mysqli_fetch_array($query))
                    { 
                        ?>
                        
              <!-- General Form Elements -->
              <form action="databukuproses.php" method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Id Buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="id" value="<?php echo $data['id']; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="judul_buku" value="<?php echo $data['judul_buku']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">jenis buku</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="jenis_buku" value="<?php echo $data['jenis_buku']; ?>" >
                                            <option selected>Pilih</option>
                                            <option>Novel</option>
                                            <option>Komik</option>
                                            <option>Dongeng</option>
                                            <option>Majalah</option>
                                        </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pengarang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="pengarang" value="<?php echo $data['pengarang']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">penerbit</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="penerbit" value="<?php echo $data['penerbit']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tahun Terbit</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name ="thn" value="<?php echo $data['tahun_penerbit']; ?>" >
                  </div>
                </div>


                     <button type="submit" class="btn btn-primary" name="edit">Ubah Data</button>
                  </div>
                </div>
        
              </form><!-- End General Form Elements -->
                    <?php
                    }
                    ?>
              </div>
          </div>

        </div>
        </div>
        
      </div>
    </section>
      <!-- Boostrap 5 -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>