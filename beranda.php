<?php
require_once("koneksi.php");

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/ico/homepropertyicon.png">
    <link rel="icon" type="image/png" href="img/ico/homepropertyicon.png"/>
    <link href="https://bootswatch.com/5/spacelab/bootstrap.css" rel="stylesheet" >
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"
  integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ=="
  crossorigin="anonymous"
/>

    <title>PT. HOME PROPERTI</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img src="foto/logo8.png" alt="logo" width="35" height="35"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#about">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#produk">Produk kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>

                        </ul>
                    </div>
        </div>
    </nav>
    <br>
    <main class="main">
      <!-- Intro -->
      <section class="intro">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 intro-content" data-aos="fade-down">
              <h1>Miliki Hunian Nyaman Untuk Anda</h1>
              <p style="text-align:justify;">Kami memberikan kebasan dalam desain sesuai selera anda. Saat ini Kami menerima pemesanan 
              layanan properti gedung hingga rumah hingga luar negeri.</p>
              <a class="btn btn-primary" href="hunian.php">Baca Selengkapnya</a>
            </div>
            <div class="col-lg-4 order-1 order-lg-2" data-aos="fade-in">
              <img src="assets/homebg2.jpg" alt="intro">
            </div>
          </div>
        </div>
      </section>
      <section id="about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6" data-aos="flip-right">
              <br>
              <br>
              <br>
              <img class="img-fluid" src="foto/hommy.jpg" alt="rumah">
            </div>
            <div class="col-lg-6 content" data-aos="fade-down">
              <br>
              <br>
              <br>
              <h2>Tentang Kami</h2>
              <p style="text-align:justify;">PT. HOME PROPERTI adalah perusahaan yang berjalan di bidang properti. kami menjual berbagai
                 jasa yang berhubungan dengan properti. Perusahaan kami sudah berjalan selama 20 tahun kami
                 didirikan tanggal 11 September 2001. Perusahaan kami sudah menerima banyak klien sebanyak
                 kurang lebih 69,420. Fokus dari perusahaan kami adalah untuk memberikan jasa properti
                 dengan harga yang terjangkau dan juga kualitas yang terbaik. </p>
            </div>
          </div>
        </div>
      </section>
      <br>
      <br>
      <br>
      <section id="produk">
      <div class="container">
      <div class="row text-center title">
        <br>
        <br>
      <h2>Produk</h2>
      <?php 
        $sql = "SELECT * FROM `konfigurasi` WHERE `kunci` = 'beranda' LIMIT 0,1";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo $row['jumlah'];
                }
                } else {
                echo "Konfigurasi Halaman beranda tidak ada";
                }
      ?>
      <br>
      <hr>
      
      <br>
      </div>
      </div>
      </section>
      <!-- Features -->
      <section class="features">
        <div class="container">
          <div class="row text-center title">
            <div class="col" data-aos="fade-down">
              <h2>Investasikan Bersama Kami</h2>
              <p>Keuntungan yang bisa didapatkan dengan berinvestasi dengan kami.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 feature mb-lg-5">
              <div class="row align-items-center">
                <div class="col-lg" data-aos="zoom-in-left">
                  <img class="img-fluid" src="foto/invest.svg" alt="grow">
                </div>
                <div class="col-lg">
                  <h3>Persen Investasi Naik</h3>
                  <p>Pertumbuhan permintaan infrastruktur Indonesia meningkat hingga 10-50%</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 feature mb-lg-5">
              <div class="row align-items-center">
                <div class="col-lg"  data-aos="zoom-in-right">
                  <img class="img-fluid" src="foto/usaha.svg" alt="sektor">
                </div>
                <div class="col-lg">
                  <h3>Lini usaha yang menjanjikan</h3>
                  <p>sektor usaha yang mendukung pertumbuhan perekonomian yang berkesinambungan</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 feature mb-lg-5">
              <div class="row align-items-center">
                <div class="col-lg" data-aos="zoom-out-right">
                  <img class="img-fluid" src="foto/construct.svg" alt="jejak">
                </div>
                <div class="col-lg">
                  <h3>Rekam jejak</h3>
                  <p>Rekam jejak pembangunan Indonesia terus didukung dan kuat dalam proyek proyek infrastruktur</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 feature mb-lg-5">
              <div class="row align-items-center">
                <div class="col-lg" data-aos="zoom-out-left">
                  <img class="img-fluid" src="foto/gain.svg" alt="gain">
                </div>
                <div class="col-lg">
                  <h3>Kenaikan gain tinggi</h3>
                  <p>memiliki tanah yang stategis di daerah berkembang pesat, kuntungan yang diperoleh bisa mencapai 100 % dalam kondisi abnormal serta menjadi bisnis proteksi paling aman</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials -->
      <section class="testimonials">
                      <?php 
        $sql = "SELECT * FROM `artikel` WHERE `kunci` = 'artikel' LIMIT 0,1";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo $row['jumlahA'];
                }
                } else {
                echo "Konfigurasi Halaman beranda tidak ada";
                }
      ?>
      </section>

      <!-- Banner -->
      <section class="banner">
      </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="container text-center text-lg-left">
        <div class="row">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <img class="logo" src="foto/logo6.png" alt="logo" width="150" height="50">
            <address>
              <p>Jl. Diponegoro barat No.19, Dusun I,<br> tugu, Kec. Kartasura, Kabupaten Sukoharjo, <br> Jawa Tengah 57169</p>
              <p class="emai">home@homeproperti.rf.gd</p>
            </address>
          </div>
          <div class="col-lg-2 mb-4 mb-lg-0">
            <ul class="nav d-block">
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Produk Kami</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-2 mb-4 mb-lg-0">
            <ul class="nav d-block">
              <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Artikel</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 mb-4 mb-lg-0">
            <h5>Sosial Media</h5>
            <div class="social-media">
              <a href="#">
                <img src="img/icons/facebook.svg" alt="facebook">
              </a>
              <a href="#">
                <img src="img/icons/twitter.svg" alt="twitter">
              </a>
              <a href="#">
                <img src="img/icons/instagram.svg" alt="instagram">
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <small class="copyright">
              © PT. HOME PROPERTI™, 2021. All rights reserved.<br>
            </small>
          </div>
        </div>
      </div>
    </footer>

   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/TextPlugin.min.js"></script>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript" src="tilt-js/vanilla-tilt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<script>
  gsap.from('.navbar', { duration: 1.5, opacity: 0, y: '-100%', ease: 'bounce' });
  gsap.registerPlugin(TextPlugin);

  const galleryImages = document.querySelectorAll('.gallery-img');
  const delayTimes = [0, 50, 100, 150, 200, 250, 300, 350, 400, 450];

  AOS.init({
    once: true,
    duration: 3000,
  });
</script>
    
</body>

</html>
