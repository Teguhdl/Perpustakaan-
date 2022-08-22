<?php
include '../db/koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: formlogin.php");
}

?>
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard Perpustakaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
        <div class="row">

        <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Anggota <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <?php
                            $data = mysqli_query($conn, "SELECT * FROM tb_anggota");
                            $result = mysqli_num_rows($data);
                            ?>
                    <div class="ps-3">
                      <h6><?= $result; ?></h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

               <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Peminjam <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <?php
                            $data = mysqli_query($conn, "SELECT * FROM tb_peminjaman");
                            $result = mysqli_num_rows($data);
                            ?>
                    <div class="ps-3">
                      <h6><?= $result; ?></h6>
                    
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Buku <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-book-2-fill"></i>
                    </div>
                    <?php
                            $data = mysqli_query($conn, "SELECT * FROM tb_buku");
                            $result = mysqli_num_rows($data);
                            ?>
                    <div class="ps-3">
                      <h6><?= $result; ?></h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


    </section>

  </main><!-- End #main -->

</body>
<?php include 'footer.php'; ?>
</html>