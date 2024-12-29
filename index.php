<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Udinus Journal</title>
    <link rel="icon" href="img/Logo_udinus1.jpg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <a class="navbar-brand px-3" href="#">Udinus Journal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text dark">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#article">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_blank">Login</a>
            </li>
            <button id="themetoggle" class="btn btn-light">
              <i class="bi bi-moon-fill"></i>
            </button>
          </ul>
        </div>
    </nav>
    <!-- nav end -->

    <!-- hero begin -->
    <section id="hero" class="text-center p-5 bg-secondary-subtle text-sm-start" class="isi">
      <div class="container">
        <div class="d-sm-flex flex-sm-row-reverse align-items-center">
          <img src="img/banner.jpg" class="img-fluid" width="300">
          <div>
            <h1 class="fw-bold display-4">Create memories, Save memories, Everyday</h1>
            <h4 class="lead display-6">Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali</h4>
            <span id="tanggal"></span>
            <span id="jam"></span>
          </div>
        </div>
      </div>
    </section>
    <!-- hero end -->

    <!-- article begin -->
  <section id="article" class="text-center p-5">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">article</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      $no = 1;
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

    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5 bg-secondary-subtle" class="isi">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/gambar1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/gambar2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/gambar3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/gambar4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/gambar5.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- gallery end -->
     
    <!-- Schedule begin -->
    <section id="schedule" class="text-center py-4">
      <h1 class="fw-bold display-4 pb-3">Schedule</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <ul class="list-group">
            <li class="list-group-item bg-danger">Senin</li>
            <li class="list-group-item">Basis Data <br> 10.20-12.00 | D.3.M</li>
            <li class="list-group-item">Rekayasa Perangkat Lunak <br> 12.30-15.00 | H.5.12</li>
          </ul>
          <ul class="list-group">
            <li class="list-group-item bg-danger">Selasa</li>
            <li class="list-group-item">Pemrograman Berbasis Web <br> 10.20-12.00 | D.2.J</li>
            <li class="list-group-item">Pendidikan Kewarganegaraan <br> 12.30-14.10 | E.Aula</li>
          </ul>
          <ul class="list-group">
            <li class="list-group-item bg-danger">Rabu</li>
            <li class="list-group-item">Logika Informatika <br> 12.30-15.00 | H.4.7</li>
            <li class="list-group-item">Probabilitas dan Statistik <br> 15.30-18.00 | H.4.8</li>
          </ul>
          <ul class="list-group">
            <li class="list-group-item bg-danger">Kamis</li>
            <li class="list-group-item">Basis Data <br> 08.40-10.20 | H.4.6</li>
            <li class="list-group-item">Sistem Operasi <br> 12.30-15.00 | H.4.11</li>
          </ul>
          <ul class="list-group">
            <li class="list-group-item bg-danger">Jumat</li>
            <li class="list-group-item">Free <br><br><br><br><br></li>
          </ul>
          <ul class="list-group">
            <li class="list-group-item bg-danger">Sabtu</li>
            <li class="list-group-item">Free <br><br><br><br><br></li>
          </ul>
        </div>
    </section>
    <!-- Schedule end -->

    <!-- About me begin -->
    <section id="about" class="text-center p-5 bg-danger-subtle text-sm-start">
      <div class="container">
        <div class="d-sm-flex flex-sm-row align-items-center justify-content-center">
          <img src="data:image/jpeg;base64,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" 
          alt="..." width="300" class="rounded-circle px-5">
          <div>
            <p>A11.2023.15324</p>
            <h3 class="fw-bold display">Aubin Daffa Al Ghozy</h3>
            <p class="lead display">Program Studi Teknik Informatika</p>
            <p class="fw-bold display"><a href="https://dinus.ac.id/" class="text-dark" style="text-decoration: none;">Universitas Dian Nuswantoro</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- About me end -->

    <!-- footer begin -->
    <footer class="text-center p-5">
      <div>
        <a href="https://www.instagram.com/aubindaffa_"> <i class="bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href="https://twitter.com/"> <i class="bi bi-twitter h2 p-2 text-dark"></i></a>
        <a href="https://wa.me/+6282241744520"> <i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
      </div>
      <div>Aubin Daffa Al Ghozy &copy; 2024</div>
    </footer>
    <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript">
      // Display Date and Time
      window.setTimeout("tampilWaktu()", 1000);
      function tampilWaktu () {
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;
        setTimeout("tampilWaktu()",1000);
        document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
      }

      // Toggle Light/Dark Mode
      document.getElementById("themetoggle").addEventListener("click",function () {
        var currenTheme = document.documentElement.getAttribute("data-bs-theme");
        var newTheme = currenTheme === "light" ? "dark" : "light";
        document.documentElement.setAttribute("data-bs-theme", newTheme);
        this.innerHTML = newTheme === "light" ? '<i class="bi bi-moon-fill"></i>' : '<i class="bi bi-brightness-high-fill"></i>';
      });
    </script>
  </body>
</html>