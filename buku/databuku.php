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
      <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                  <tr>
                  <th scope="col">ID Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jenis Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_buku";
                        $query = mysqli_query($conn, $sql);

                        while ($buku = mysqli_fetch_array($query)) {
                         ?>
                           <tr>

                             <td> <?=  $buku['id']  ?></td>
                             <td> <?=  $buku['judul_buku'] ?></td>
                             <td> <?=  $buku['jenis_buku'] ?> </td>
                             <td> <?=  $buku['pengarang']  ?></td>
                             <td> <?=  $buku['penerbit']  ?></td>
                             <td> <?=  $buku['tahun_penerbit'] ?></td>

                             <td>
                            <a href='<?php echo('formedit.php?id='.$buku['id']) ?>'><button type='button' class='btn btn-warning'>
                            <i class='bi bi-pencil-square'></i></button></a> | 
                            <a onclick="deleteConfirm('<?php echo('hapus.php?id='.$buku['id']) ?>')" href="#" role="button" aria-pressed="true">
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
