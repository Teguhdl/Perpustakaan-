<?php
include '../db/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<?php include '../konten/navbar.php'; ?>
<?php include '../konten/sidebar.php'; ?>

<body>
                                <!-- Form input data buku -->
                                <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data peminjam</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Data peminjam</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ubah Data peminjam</h5>

                    <?php

                   
                    $query = mysqli_query($conn, 
                    "SELECT * FROM tb_peminjaman WHERE id =
                    '".$_GET["id"]."'");
                    if ($data = mysqli_fetch_array($query))
                    { 
                        ?>
                        
              <!-- General Form Elements -->
              <form action="datapeminjamanproses.php" method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Id Pinjam</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="id" value="<?php echo $data['id']; ?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name ="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Id buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="id_buku" value="<?php echo $data['id_buku']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Id anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="id_anggota" value="<?php echo $data['id_anggota']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Id petugas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="id_petugas" value="<?php echo $data['id_petugas']; ?>" >
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
                                </main>
    </body>
    <?php include '../konten/footer.php'; ?>
</html>