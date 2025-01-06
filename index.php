<?php
include "koneksi.php"; 

?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aul's Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/logo.png" />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-danger sticky-top ">
        <div class="container">
          <a class="navbar-brand text-white" href="#">Website Aul</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark"> 
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white link-secondary" href="#profil">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white link-secondary" href="#article">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white link-secondary" href="#jadwal">Jadwal Kuliah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white link-secondary" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white link-secondary" href="login.php">Login</a>
              </li>
  
            </ul>
           
          </div>
        </div>
      </nav>

  <section id="hero" class="text-center-p-5 bg-danger-subtle text-sm-start"> 
    <div class="container">
        <div class="row align-items-center"> 
            <div class="col-12 col-md-6 order-md-2 text-center">
                <img src="img/aul.jpg" class="img-fluid mb-4" width="400">
            </div>
            <div class="col-12 col-md-6 order-md-1 text-center text-md-start">
                <h1 class="fw-bold display-4"> Aulia's Daily Journal </h1>
                <h4 class="lead display-6"> Catatan dan dokumentasi kegiatan yang berkesan bagi Aulia Anjali </h4>
            </div>
        </div>          
    </div>
  </section>

    <section id="profil"class="text-center p-5 bg-primary-subtle">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Profil Mahasiswa</h1>
        <div class="d-lg-flex flex-md-row align-items-center justify-content-evenly">
          <img src="img/pasfoto.jpg" alt="" class= "img-fluid rounded-circle mb-4" width="300">
        <div class="p-3">
          <h2 class="text-center text-lg-start">Aulia Anjali Rizaldi</h2>
          <table class="text-start p-5">
            <tr>
              <td><b>NIM</b></td>
              <td class="p-2">:</td>
              <td>A11.2023.15012</td>
            </tr>
            <tr>
              <td><b>Program studi</b></td>
              <td class="p-2">:</td>
              <td>Teknik Informatika</td>
            </tr>
            <tr>
              <td><b>Email</b></td>
              <td class="p-2">:</td>
              <td>111202315012@mhs.dinus.ac.id</td>
            </tr>
            <tr>
              <td><b>Telepon</b></td>
              <td class="p-2">:</td>
              <td>081385532793</td>
            </tr>
            <tr>
              <td><b>Alamat</b></td>
              <td class="p-2">:</td>
              <td>Jalan Gombel Permai Barat II No.73, Semarang</td>
            </tr>
          </table>
        </div>
        </div>
     </section>

    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal ASC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <section id="jadwal" class="text-center-p-5 "> 
      <div class="container"> 
        <h1 class="fw-bold display-4 pt-5 pb-4 text-center"> Jadwal Kuliah dan Kegiatan </h1>
      </div>
      <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center"> 
        
        <div class="col card text-bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold">Senin</div>
          <div class="card-body">
            <h5 class="card-title">Probabilitan dan Statistik</h5>
            <p class="card-text">12.30 - 15.00</p>
            <h5 class="card-title">Sistem Operasi</h5>
            <p class="card-text">15.30 - 18.00</p>
          </div>
        </div>
        <div class="col card text-bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold">Selasa</div>
          <div class="card-body">
            <h5 class="card-title">Rekayasa Perangkat Lunak</h5>
            <p class="card-text">09.30 - 12.00</p>
            <h5 class="card-title">Penambangan Data</h5>
            <p class="card-text">15.30 - 18.00</p>
          </div>
        </div>
        <div class="col card text-bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold">Rabu</div>
          <div class="card-body">
            <h5 class="card-title">Kriptografi</h5>
            <p class="card-text">09.30 - 12.00</p>
          </div>
        </div>
        <div class="col card text-bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold">Kamis</div>
          <div class="card-body">
            <h5 class="card-title">Logika Informatika</h5>
            <p class="card-text">09.30 - 12.00</p>
            <h5 class="card-title">Basis Data</h5>
            <p class="card-text">14.10 - 15.50</p>
          </div>
        </div>
        <div class="col card text-bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold">Jumat</div>
          <div class="card-body">
            <h5 class="card-title">Pemrograman Berbasis Web</h5>
            <p class="card-text">10.20 - 12.00</p>
            <h5 class="card-title">Basis Data</h5>
            <p class="card-text">10.20 - 12.00</p>
          </div>
        </div>
        <div class="col card text-bg-info mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold ">Sabtu</div>
          <div class="card-body">
            <h5 class="card-title">Olahraga</h5>
            <p class="card-text">07.00 - 08.00</p>
            <h5 class="card-title">Masak</h5>
            <p class="card-text">08.00 - 09.30</p>
            <h5 class="card-title">Me-time</h5>
            <p class="card-text">seharian</p>

          </div>
        </div>
        <div class="col card text-bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header text-center fw-bold">Minggu</div>
          <div class="card-body">
            <h5 class="card-title">Olahraga</h5>
            <p class="card-text">07.00 - 08.00</p>
            <h5 class="card-title">Masak</h5>
            <p class="card-text">08.00 - 09.30</p>
            <h5 class="card-title">Family time</h5>
            <p class="card-text">seharian</p>
          </div>
        </div>
      </div>
    </section>

    <section id="gallery" class="text-center p-5 bg-info-subtle">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
        <?php
        
        $sql = "SELECT * FROM gallery ORDER BY tanggal ASC";
        $hasil = $conn->query($sql);

        $active = true;

        while ($row = $hasil->fetch_assoc()) {
        ?>
          <div class="carousel-item <?= $active ? 'active' : '' ?>">
            <img src="img/<?= $row['gambar'] ?>" class="d-block mx-auto w-50" alt="<?= $row['judul'] ?>" />
            <div class="carousel-caption d-none d-md-block">
              <h5><?= htmlspecialchars($row['judul']) ?></h5>
              <p> Uploaded by <?= htmlspecialchars($row['username']) ?> on <?= htmlspecialchars($row['tanggal']) ?></p>
            </div>
          </div>
        <?php
          $active = false; // Setelah item pertama, set active ke false
        }
        ?>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="next"
      >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
<!-- gallery end -->

   
    <footer class="bg-info text-center">
      <div>
        <a href="https://www.instagram.com/aulianjali/profilecard/"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href="https://wa.me/6281385532793"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
        <a href="https://mail.google.com/mail/?authuser=0"><i class="bi bi-envelope h2 p-2 text-dark"></i></a>
      </div>
      <div>Aulia Anjali © 2024</div>
    </footer>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>