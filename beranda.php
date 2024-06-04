<?php
session_start();

require 'function.php';

// Fungsi untuk mengambil total nominal donasi untuk setiap tujuan
function getTotalNominal($tujuan) {
  global $conn;
  $result = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM donasi WHERE tujuan = '$tujuan'");
  $row = mysqli_fetch_assoc($result);
  return $row['total'];
}

// Mendapatkan total nominal donasi untuk setiap tujuan
$asrama1Total = getTotalNominal('asrama1');
$asrama2Total = getTotalNominal('asrama2');
$asrama3Total = getTotalNominal('asrama3');
$dapurTotal = getTotalNominal('dapur');
$fasilitasTotal = getTotalNominal('fasilitas');
$lantaidasarTotal = getTotalNominal('lantai dasar');
$parkiranTotal = getTotalNominal('parkiran');
$perpustakaanTotal = getTotalNominal('perpustakaan');
$tamanTotal = getTotalNominal('taman');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vatika Yayasan</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: #101820;
    }
    .slider{width: 100%}
    .slider input{display: none;}
    .testimonials{
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      min-height: 350px;
      perspective: 1000px;
      overflow: hidden;
    }
    .testimonials .item {
  width: 500px; /* Sesuaikan lebar kotak atau label */
  height: 350px; /* Sesuaikan tinggi kotak atau label */
  /* padding: 30px; */
  border-radius: 5px;
  background-color: #21262d;
  position: absolute;
  border: 3px solid white;
  top: 0;
  box-sizing: border-box;
  text-align: center;
  transition: transform 0.4s;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  user-select: none;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
}

.testimonials .item img {
  width: 100%;
  height: 100%; /* Gambar mengisi kotak atau label */
  object-fit: cover; /* Gambar akan memenuhi kotak atau label */
  border-radius: 5px; /* Bordes untuk gambar */
}
    .testimonials .item h1{font-size: 114px; color: white;}
    .dots{display: flex; justify-content: center;align-items: center;}
    .dots label{
      height: 5px;
      width: 5px;
      border-radius: 50%;
      cursor: pointer;
      background-color: #413B52;
      margin: 7px;
      transition-duration: 0.2s;
    }

    #t-1:checked ~ .dots label[for="t-1"],
    #t-2:checked ~ .dots label[for="t-2"],
    #t-3:checked ~ .dots label[for="t-3"],
    #t-4:checked ~ .dots label[for="t-4"],
    #t-5:checked ~ .dots label[for="t-5"],
    #t-6:checked ~ .dots label[for="t-6"],
    #t-7:checked ~ .dots label[for="t-7"],
    #t-8:checked ~ .dots label[for="t-8"],
    #t-9:checked ~ .dots label[for="t-9"] {
      transform: scale(2);
      background-color: #fff;
      box-shadow: 0px 0px 0px 3px #dddddd24;
    }

    #t-1:checked ~ .testimonials label[for="t-3"],
    #t-2:checked ~ .testimonials label[for="t-4"],
    #t-3:checked ~ .testimonials label[for="t-5"],
    #t-4:checked ~ .testimonials label[for="t-6"],
    #t-5:checked ~ .testimonials label[for="t-7"],
    #t-6:checked ~ .testimonials label[for="t-8"],
    #t-7:checked ~ .testimonials label[for="t-9"],
    #t-8:checked ~ .testimonials label[for="t-1"],
    #t-9:checked ~ .testimonials label[for="t-2"] {
      transform: translate3d(600px, 0, -180px) rotateY(-25deg);
      z-index: 2;
    }

    #t-1:checked ~ .testimonials label[for="t-2"],
    #t-2:checked ~ .testimonials label[for="t-3"],
    #t-3:checked ~ .testimonials label[for="t-4"],
    #t-4:checked ~ .testimonials label[for="t-5"],
    #t-5:checked ~ .testimonials label[for="t-6"],
    #t-6:checked ~ .testimonials label[for="t-7"],
    #t-7:checked ~ .testimonials label[for="t-8"],
    #t-8:checked ~ .testimonials label[for="t-9"],
    #t-9:checked ~ .testimonials label[for="t-1"] {
      transform: translate3d(300px, 0, -90px) rotateY(-15deg);
      z-index: 3;
    }

    #t-2:checked ~ .testimonials label[for="t-1"],
    #t-3:checked ~ .testimonials label[for="t-2"],
    #t-4:checked ~ .testimonials label[for="t-3"],
    #t-5:checked ~ .testimonials label[for="t-4"],
    #t-6:checked ~ .testimonials label[for="t-5"],
    #t-7:checked ~ .testimonials label[for="t-6"],
    #t-8:checked ~ .testimonials label[for="t-7"],
    #t-9:checked ~ .testimonials label[for="t-8"],
    #t-1:checked ~ .testimonials label[for="t-9"] {
      transform: translate3d(-300px, 0, -90px) rotateY(15deg);
      z-index: 3;
    }

    #t-3:checked ~ .testimonials label[for="t-1"],
    #t-4:checked ~ .testimonials label[for="t-2"],
    #t-5:checked ~ .testimonials label[for="t-3"],
    #t-6:checked ~ .testimonials label[for="t-4"],
    #t-7:checked ~ .testimonials label[for="t-5"],
    #t-8:checked ~ .testimonials label[for="t-6"],
    #t-9:checked ~ .testimonials label[for="t-7"],
    #t-2:checked ~ .testimonials label[for="t-9"],
    #t-1:checked ~ .testimonials label[for="t-8"] {
      transform: translate3d(-600px, 0, -180px) rotateY(25deg);
    }

    #t-1:checked ~ .testimonials label[for="t-1"],
    #t-2:checked ~ .testimonials label[for="t-2"],
    #t-3:checked ~ .testimonials label[for="t-3"],
    #t-4:checked ~ .testimonials label[for="t-4"],
    #t-5:checked ~ .testimonials label[for="t-5"],
    #t-6:checked ~ .testimonials label[for="t-6"],
    #t-7:checked ~ .testimonials label[for="t-7"],
    #t-8:checked ~ .testimonials label[for="t-8"],
    #t-9:checked ~ .testimonials label[for="t-9"] {
      z-index: 4;
    }

    /* header {
  box-shadow: 0 0 10px rgba(0, 0, 0, .5);
  background: url(navbar.jpg) center/cover no-repeat; 
  padding: 12rem;
  position: relative;
  margin-left: 13rem;
  margin-right: 13rem;
}
header::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, .5);
} */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 3rem;
      max-width: 1200px;
      margin: 0 auto;

    }

    .navbar a {
      font-size: 25px;
    }

    .logo a {
      text-decoration: none;
      color: #ffffff;
      font-size: 35px;
      font-weight: bold;
    }

    .menu {
      list-style-type: none;
      display: flex;
    }

    .menu li {
      margin: 0 1rem;
    }

    .menu li a {
      text-decoration: none;
      color: #ffffff;
      transition: color 0.3s ease;
    }

    .menu li a:hover {
      color: #ffcc00;
    }

    .navigasi {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin-left: 200px;
      margin-top: 60px;
    }

   
.navigasi ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navigasi li {
    margin-right: 20px;
}

.navigasi a {
    text-decoration: none;
    color: white; 
    padding: 10px;
    position: relative;
    transition: color 0.3s;
}


.navigasi a.active::after {
    content: '';
    display: block;
    width: 100%;
    height: 2px;
    background: blue;
    position: absolute;
    left: 0;
    bottom: 0;
}


.navigasi a:hover {
    color: blue;
}

.navigasi a:hover::after {
    content: '';
    display: block;
    width: 100%;
    height: 2px;
    background: blue;
    position: absolute;
    left: 0;
    bottom: 0;
}


    main {
      max-width: 1200px;
      margin: 2rem auto;
    }

    .paket-wisata {
      margin-bottom: 2rem;
      text-align: center;
    }

    .paket-wisata-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .paket-wisata-item {
      box-shadow: 0 0 8px darkslategray;
      flex: 1;
      width: 365px;
      height: 340px;
      margin-bottom: 1rem;
      border-radius: 5px;
      padding: 1rem;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .paket-wisata-item:hover {
      transform: scale(1.1);
    }

    .paket-wisata-item img {
      width: 330px;
      height: 200px;
      border-radius: 5px;
    }

    .paket-wisata-item h3 {
      font-size: 1.2rem;
      margin: 0.5rem 0;
      color: white;
      text-align: left;
    }

    .paket-wisata-item p {
      font-size: 0.8rem;
      margin: 0.5rem 0;
      text-align: justify;
      color: white;
    }
    .paket-wisata-item a {
      text-decoration: none;
    }
    .paket-wisata .paket-wisata-container a {
    text-decoration: none; /* Remove underline from links */
    color: inherit; /* Inherit color from parent */
    display: block; /* Make the links fill the item */
}

  </style>
</head>

<body>

<nav>
    <div class="navbar">
      <div class="logo">
      <img src="logo.png" alt="logo" width="50px" height="50px" style="margin-top: -15px;">
        <a href="beranda.php">Vatika Yayasan</a>
      </div>
      <ul class="menu">
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == true || isset($_SESSION['admin']) && $_SESSION['admin'] == true) :
        ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else : ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <!-- <header class="rounded">
    </header> -->
    <div class="slider">
    <input type="radio" name="slider" id="t-1" checked>
    <input type="radio" name="slider" id="t-2">
    <input type="radio" name="slider" id="t-3">
    <input type="radio" name="slider" id="t-4">
    <input type="radio" name="slider" id="t-5">
    <input type="radio" name="slider" id="t-6">
    <input type="radio" name="slider" id="t-7">
    <input type="radio" name="slider" id="t-8">
    <input type="radio" name="slider" id="t-9">
    <div class="testimonials">
      <label for="t-1" class="item">
        <img src="dapur.jpg" alt="">
      </label>
      <label for="t-2" class="item">
        <img src="fasilitas.jpg" alt="">
      </label>
      <label for="t-3" class="item">
        <img src="parkiran1.jpg" alt="">
      </label>
      <label for="t-4" class="item">
        <img src="perpustakaan1.jpg" alt="">
      </label>
      <label for="t-5" class="item">
        <img src="lantaidasar.jpg" alt="" srcset="">
      </label>
      <label for="t-6" class="item">
        <img src="asrama1.jpg" alt="" srcset="">
      </label>
      <label for="t-7" class="item">
        <img src="asrama2.jpg" alt="" srcset="">
      </label>
      <label for="t-8" class="item">
        <img src="asrama3.jpg" alt="" srcset="">
      </label>
      <label for="t-9" class="item">
        <img src="navbar.jpg" alt="" srcset="">
      </label>
    </div>
    <div class="dots">
      <label for="t-1"></label>
      <label for="t-2"></label>
      <label for="t-3"></label>
      <label for="t-4"></label>
      <label for="t-5"></label>
      <label for="t-6"></label>
      <label for="t-7"></label>
      <label for="t-8"></label>
      <label for="t-9"></label>
    </div>
  </div>

    
  <nav>
    <div class="navigasi">
        <ul class="pilih">
            <li><a href="beranda.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'beranda.php' ? 'active' : '' ?>">Beranda</a></li>
            <li><a href="informasi.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'informasi.php' ? 'active' : '' ?>">Informasi</a></li>
            <li><a href="donasi.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'donasi.php' ? 'active' : '' ?>">Donasi</a></li>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                <li><a href="berandaadmin.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'berandaadmin.php' ? 'active' : '' ?>">Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

  <main>
    <selection class="paket-wisata">
      <div class="paket-wisata-container">
      <a href="parkiran.php"><div class="paket-wisata-item">
          <img src="parkiran1.jpg" alt="Paket Wisata 2">
          <h3>Parkir Aman untuk Yayasan: Donasi Anda, Dampak Sosial Luas!</h3>
          <p style="margin-top: 40px;">Total Donasi : Rp. <?= $parkiranTotal ?></p>
        </div></a>
        <a href="taman.php"><div class="paket-wisata-item">
          <img src="navbar.jpg" alt="Paket Wisata 4">
          <h3>Donasi Taman Yayasan: Hijaukan Yayasan, Sehatkan Komunitas Bersama!</h3>
          <p style="margin-top: 20px;">Total Donasi : Rp. <?= $tamanTotal ?></p>
        </div></a>
        <a href="dapur.php"><div class="paket-wisata-item">
          <img src="dapur.jpg" alt="Paket Wisata 5">
          <h3>Donasi Dapur Yayasan: Sumbang Peralatan, Bantu Makanan Sehat untuk Komunitas!</h3>
          <p style="margin-top: 20px;">Total Donasi : Rp. <?= $dapurTotal ?></p>
        </div></a>
      </div>
    </selection>
    <selection class="paket-wisata">
      <div class="paket-wisata-container">
      <a href="perpustakaan.php"><div class="paket-wisata-item">
          <img src="perpustakaan1.jpg" alt="Paket Wisata 5">
          <h3>Donasi Perpustakaan Yayasan: Sumbang Buku, Tingkatkan Literasi dan Pengetahuan Komunitas!</h3>
          <p style="margin-top: 20px;">Total Donasi : Rp. <?= $perpustakaanTotal ?></p>
        </div></a>
        <a href="fasilitas.php"><div class="paket-wisata-item">
          <img src="fasilitas.jpg" alt="Paket Wisata 5">
          <h3>Donasi Fasilitas Yayasan: Tingkatkan Infrastruktur, Keselamatan, dan Akses bagi Komunitas!</h3>
          <p style="margin-top: 20px;">Total Donasi : Rp. <?= $fasilitasTotal ?></p>
        </div></a>
        <a href="lantaidasar.php"><div class="paket-wisata-item">
          <img src="lantaidasar.jpg" alt="Paket Wisata 5">
          <h3>Kuatkan Yayasan: Donasi Fondasi, Tingkatkan Akses, Perkuat Komunitas!</h3>
          <p style="margin-top: 40px;">Total Donasi : Rp. <?= $lantaidasarTotal ?></p>
        </div></a>
      </div>
    </selection>
    <selection class="paket-wisata">
      <div class="paket-wisata-container">
      <a href="asrama1.php"><div class="paket-wisata-item">
          <img src="asrama1.jpg" alt="Paket Wisata 5">
          <h3>Asrama 1 Yayasan: Donasi, Tempat Aman, Kesempatan Baru!</h3>
          <p style="margin-top: 40px;">Total Donasi : Rp. <?= $asrama1Total ?></p>
        </div></a>
        <a href="asrama2.php"><div class="paket-wisata-item">
          <img src="asrama2.jpg" alt="Paket Wisata 5">
          <h3>Asrama 2 Yayasan: Donasi, Tempat Aman, Kesempatan Baru!</h3>
          <p style="margin-top: 40px;">Total Donasi : Rp. <?= $asrama2Total ?></p>
        </div></a>
        <a href="asrama3.php"><div class="paket-wisata-item">
          <img src="asrama3.jpg" alt="Paket Wisata 5">
          <h3>Asrama 3 Yayasan: Donasi, Tempat Aman, Kesempatan Baru!</h3>
          <p style="margin-top: 40px;">Total Donasi : Rp. <?= $asrama3Total ?></p>
        </div></a>
      </div>
    </selection>
  </main>
  <footer>
    <div class="footercontainer">

      <div class="footernav">
        <ul>
          <li><a href="informasi.php">Informasi</a></li>
          <?php
                if(isset($_SESSION['login']) && $_SESSION['login'] == true || isset($_SESSION['admin']) && $_SESSION['admin'] == true ) : 
                ?>
                <li><a href="logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="login.php">Login</a></li>
              <?php endif; ?>
          <li><a href="beranda.php">Beranda</a></li>
        </ul>
      </div>  
      <div class="ikonsosmed">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-tiktok"></i></a>
      </div>
    </div>
    <div class="footerbottom">
      <p>Copyright &copy;2024; Designed by <span class="designer">Vatika Yayasan</span></p>
    </div>
    <div style="margin-top: -245px;">
    <img src="tako0.png" width="300px" height="270px" style="margin-left: 200px;">
    </div><div style="margin-top: -275px;">
    <img src="tako1.png" width="300px" height="270px" style="margin-left: 1100px;">
    </div>
    </footer>

</body>

</html>