<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  </head>

  <body>
  <input name="id" value="<?php echo $data['id']; ?>"  hidden />
  <div id="main-content" class="blog-page">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-nav ml-auto">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled">Disabled</a>
                  </div>
                </div>
              </nav>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="gambar/<?php echo $data['gambar_produk']; ?>" alt="First slide">
                            </div>
                            <h3><?php echo $data['nama_produk']; ?></h3>
                            <p><?php echo $data['deskripsi']; ?></p>
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <br>
                                    <button id="btnSearch" class="btn btn-primary btn-md center-block" Style="width: 100px;" OnClick="btnSearch_Click" >Edit </button>
                                     <button id="btnClear" class="btn btn-danger btn-md center-block" Style="width: 100px;" OnClick="btnClear_Click" >Hapus</button>
                                 </div>
                            </div>
                        </div>                        
                    </div>
                   
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query2 = "SELECT * FROM produk LIMIT 3";
      $result2 = mysqli_query($koneksi, $query2);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi2).
           " - ".mysqli_error($koneksi2));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result2))
      {
      ?>
      
      <div class="card">
                        <div class="header">
                            <h2>Popular Posts</h2>                        
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_post">
                                        <p class="m-b-0"><?php echo $row['nama_produk']; ?></p>
                                        <span>jun 22, 2018</span>
                                        <div class="img-post">
                                            <img src="https://via.placeholder.com/280x280/87CEFA/000000" alt="Awesome Image">                                        
                                        </div>                                            
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
                </div>
            </div>

        </div>
    </div>
  </body>
</html>