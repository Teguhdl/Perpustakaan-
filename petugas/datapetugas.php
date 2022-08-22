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
                                <form class="row g-3" action="datapetugasproses.php" method="POST">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Nama Petugas</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Petugas" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Username Petugas</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Password Petugas</label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="" class="form-label label-form">Confirm Password</label>
                                        <input type="password" name="cpassword" class="form-control" placeholder="Masukkan password" required>
                                    </div> 
                                    <div class="col-12 ">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
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
      <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                  <tr>
                  <th scope="col">ID Petugas</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_petugas";
                        $query = mysqli_query($conn, $sql);

                        while ($data = mysqli_fetch_array($query)) {
                         ?>
                           <tr>

                             <td> <?=  $data['id']  ?></td>
                             <td> <?=  $data['nama'] ?></td>
                             <td> <?=  $data['username'] ?> </td>
                             <td class="hidetext"> <?=  $data['password'] ?> </td></td>

                             <td>
                            <a href='<?php echo('editpetugas.php?id='.$data['id']) ?>'><button type='button' class='btn btn-warning'>
                            <i class='bi bi-pencil-square'></i></button></a> | 
                            <a onclick="deleteConfirm('<?php echo('hapus3.php?id='.$data['id']) ?>')" href="#" role="button" aria-pressed="true">
                            <button type='button' class='btn btn-danger'><i class='bi bi-trash'></i></button></a>
                             </td>
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
        </main>
  </body>
  <?php include '../konten/footer.php'; ?>
</html>
