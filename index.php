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
    <section id="gallery" class="text-center p-4 bg-secondary-subtle">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <?php
                $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
                $hasil = $conn->query($sql);
                $counter = 0;

                // Generate indicators dynamically
                while ($row = $hasil->fetch_assoc()) {
                    echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $counter . '" class="' . ($counter === 0 ? 'active' : '') . '" aria-current="true" aria-label="Slide ' . ($counter + 1) . '"></button>';
                    $counter++;
                }

                // Reset pointer for re-looping
                $hasil->data_seek(0);
                ?>
            </div>
            <div class="carousel-inner">
                <?php
                $counter = 0;

                // Generate slides dynamically
                while ($row = $hasil->fetch_assoc()) {
                    echo '<div class="carousel-item ' . ($counter === 0 ? 'active' : '') . '">';
                    echo '<img src="img/' . $row["gambar"] . '" class="d-block w-100" alt="Slide ' . ($counter + 1) . '">';
                    echo '</div>';
                    $counter++;
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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
    <section id="aboutme" class="text-center p-5 bg-secondary-subtle">
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <div class="d-flex flex-column flex-sm-row align-items-center">
            <!-- Gambar -->
            <img 
                src="img/pp1.jpg" 
                class="img-fluid rounded-circle me-4 mb-4 mb-sm-0" 
                width="300" 
                alt="Foto Profil Muchamad Nafis Aljufri">
            <!-- Teks -->
            <div class="text-start">
                <h5 class="lead">
                    A11.2023.15324
                </h5>
                <h1 class="fw-bold display-4">
                    Aubin Daffa Al Ghozy
                </h1>
                <h6>
                    Program Studi Teknik Informatika
                </h6>
                <h6 class="fw-bold">
                    Universitas Dian Nuswantoro
                </h6>
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