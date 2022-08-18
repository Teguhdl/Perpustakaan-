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

                <!-- Modal Box -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- Form input data buku -->
                                <form class="row g-3" action="databukuproses.php" method="POST">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Judul Buku</label>
                                        <input type="text" name="judul_buku" class="form-control" placeholder="Masukkan judul buku" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Jenis Buku</label>
                                        <select class="form-select" name="jenis_buku">
                                            <option selected>Pilih</option>
                                            <option>Novel</option>
                                            <option>Komik</option>
                                            <option>Dongeng</option>
                                            <option>Majalah</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label label-form">Pengarang</label>
                                        <input type="text" name="pengarang" class="form-control" placeholder="Masukkan pengarang" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label label-form">Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control" placeholder="Masukkan penerbit" required>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <label for="" class="form-label label-form">Tahun Terbit</label>
                                        <input type="date" name="thn" style="width: 130px;" required>
                                    </div>
                                    <div class="col-12 ">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="input">Tambah</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Table data buku -->
                <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"> 
      <div class="card-body">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data <i class="bi bi-plus-circle"></i></button>
      <br>     
      <br>
      <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th scope="col">ID Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jenis Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Form</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_buku";
                        $query = mysqli_query($conn, $sql);

                        while ($buku = mysqli_fetch_array($query)) {
                         ?>
                           <tr>

                             <td> <?=  $buku['id']  ?></td>;
                             <td> <?=  $buku['judul_buku'] ?></td>;
                             <td> <?=  $buku['jenis_buku'] ?> </td>;
                             <td> <?=  $buku['pengarang']  ?></td>;
                             <td> <?=  $buku['penerbit']  ?></td>;
                             <td> <?=  $buku['tahun_penerbit'] ?></td>;

                             <td>
                            <a href='<?php echo('formedit.php?id='.$buku['id']) ?>'><button type='button' class='btn btn-warning'>
                            <i class='bi bi-pencil-square'></i></button></a> | 
                            <a onclick="deleteConfirm('<?php echo('hapus.php?id='.$buku['id']) ?>')" href="#" role="button" aria-pressed="true">
                            <button type='button' class='btn btn-danger'><i class='bi bi-trash'></i></button></a>
                             </td>
                             </tr>;
                  <?php
                        }
                        ?>
                          
                        </tbody>
                </table>
               
          </div>
          </div>
            </div>
          </div>
            
          <script>
          function deleteConfirm(url){
              var tomboldelete = document.getElementById('btn-delete')  
              tomboldelete.setAttribute("href", url);

              var pesan = "Data dengan ID <b>"
              var pesan2 = " </b>akan dihapus"
              var n = url.lastIndexOf("=")
              var res = url.substring(n+1);
              document.getElementById("xid").innerHTML = pesan.concat(res,pesan2);

              var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {  keyboard: false });
              
              myModal.show();   
          }
      </script>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
              <a id="btn-tutup" class="btn btn-secondary" data-bs-dismiss="modal">X</a>
            </div>
            <div class="modal-body" id="xid"></div>
            <div class="modal-footer">
              <a id="btn-batal" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
              <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
          </div>
        </div>
      </div>   
    <!-- Akhir Modal Delete -->


    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>