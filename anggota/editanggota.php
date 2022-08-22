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
      <h1>Data Petugas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Data Petugas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ubah Data Petugas</h5>

                    <?php

                   
                    $query = mysqli_query($conn, 
                    "SELECT * FROM tb_anggota WHERE id =
                    '".$_GET["id"]."'");
                    if ($data = mysqli_fetch_array($query))
                    { 
                        ?>
                        
              <!-- General Form Elements -->
              <form action="dataanggotaproses.php" method="post">
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ID Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="id" value="<?php echo $data['id']; ?>" readonly >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="nama" value="<?php echo $data['nama']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="username" value="<?php echo $data['username']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" id="inputPassword" class="form-control" name ="password" >
                  </div>
                </div>
                <div class="mb-3 row">
            <div class="col-sm-10 offset-2">
                <input type="checkbox" class="form-check-input" id="show-password"> Tampilkan Password
            </div>
        </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword2" name ="cpassword" >
                  </div>
                </div>
                <div class="mb-3 row">
            <div class="col-sm-10 offset-2">
                <input type="checkbox" class="form-check-input" id="show-password2"> Tampilkan Password
            </div>
        </div>
        <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">jenis kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>" >
                  </div>
                </div>
        <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="alamat" value="<?php echo $data['alamat']; ?>" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No Handphone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name ="no_hp" value="<?php echo $data['no_hp']; ?>" >
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
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#show-password').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputPassword').attr('type', 'text');
                } else {
                    $('#inputPassword').attr('type', 'password');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#show-password2').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputPassword2').attr('type', 'text');
                } else {
                    $('#inputPassword2').attr('type', 'password');
                }
            });
        });
    </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                </main>
    </body>
    <?php include '../konten/footer.php'; ?>
</html>