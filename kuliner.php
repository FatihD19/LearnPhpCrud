<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  </head>
  <body>
    <!-- <center><h1>Data Produk</h1><center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
    <br/> -->
   
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      ?>

<div>
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
         <section id="header" class="jumbotron text-center">
           <h1 class="display-3">Kuliner</h1>
           <p class="lead">makan enak enak enak enak.</p>
           <a href="index.php" class="btn btn-warning">Edit</a>
           
      </section>
        
      <section id="gallery">
        <div class="container">
          <div class="row">
              <?php
              
                //buat perulangan untuk element tabel dari data mahasiswa
                $no = 1; //variabel untuk membuat nomor urut
                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                // kemudian dicetak dengan perulangan while
                while($row = mysqli_fetch_assoc($result))
                {
              ?>
          <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="gambar/<?php echo $row['gambar_produk']; ?>" alt="" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
              <p class="card-text"><?php echo substr($row['deskripsi'], 0, 20); ?>...</p>
             <a href="blog.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-sm">Read More</a>
              <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
            </div>
           </div>
          </div>
          <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </div>
</div>

  </body>
</html>