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
      <h1>Data Buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item">Data Buku</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

                <!-- Table data buku -->
                <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"> 
      <div class="card-body">
      <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                  <tr>
                  <th scope="col">ID Pengembalian</th>
                            <th scope="col">ID Pinjam</th>
                            <th scope="col">id anggota</th>
                            <th scope="col">id buku</th>
                            <th scope="col">tanggal pengembalian</th>
                            <th scope="col">id petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_pengembalian";
                        $query = mysqli_query($conn, $sql);

                        while ( $data = mysqli_fetch_array($query)) {
                         ?>
                           <tr>

                             <td> <?=  $data['id']  ?></td>
                             <td> <?=  $data['id_pinjam'] ?></td>
                             <td> <?=  $data['id_anggota'] ?> </td>
                             <td> <?=  $data['id_buku']  ?></td>
                             <td> <?=  $data['tgl_kembali']  ?></td>
                             <td> <?=  $data['id_petugas'] ?></td>

                             </tr>
                  <?php
                        }
                        ?>
                          
                        </tbody>
                </table>
               
          </div>
          </div>
            </div>
          </div>
            
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </main>
  </body>
  <?php include '../konten/footer.php'; ?>
</html>
