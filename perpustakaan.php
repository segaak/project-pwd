<?php
if (isset($_POST["tambah"])) {
    session_start();
    require 'function.php';
    if (!isset($_SESSION["login"])) {
      header("Location: login.php");
      exit;
    } if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'perpustakaan.php';
        </script>";
      } else {
          echo "<script>
          alert('Data gagal ditambahkan!');
          </script>";
      }
  }
  require 'function.php';
  $charity = mysqli_query($conn, "SELECT * FROM donasi");
$pesan = query("select nama, catatan, jumlah from donasi where tujuan = 'perpustakaan'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vatika Yayasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #101820;
            color: white;
        }

        header.atas {
            box-shadow: 0 0 8px darkslategray;
            background: url(perpustakaan.jpeg) center/cover no-repeat;
            padding: 12rem;
            position: relative;
            margin-left: 13rem;
            margin-right: 13rem;
            border-radius: 10px;
        }

        header.bawah {
            box-shadow: 0 0 8px darkslategray;
            background-color: #101820;
            padding: 1rem;
            position: relative;
            margin-left: 13rem;
            margin-right: 13rem;
            border-radius: 10px;
            margin-top: 20px;
            color: white;
            font-size: 20px;
        }

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

        main {
            max-width: 1160px;
            border-radius: 10px;
            margin: 2rem auto;
            background-color: pink;
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
            width: calc(33.33% - 1rem);
            margin-bottom: 1rem;
            margin-right: 20px;
            margin-left: 20px;
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .paket-wisata-item:hover {
            transform: scale(1.1);
        }

        .paket-wisata-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .paket-wisata-item h3 {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .paket-wisata-item p {
            font-size: 0.8rem;
            margin: 0.5rem 0;
            text-align: justify;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            background-color: #252525;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 50px;
            max-width: 1170px;
        }

        .sidebar {
            background-color: #2c2c2c;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1 1 30%;
        }

        .content {
            padding: 20px;
            flex: 1 1 70%;
        }

        .content h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: none;
            background-color: #3a3a3a;
            color: #ffffff;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            
            background-color: #3a3a3a;
            color: #ffffff;
        }
        .form-group input:disabled,
        .form-group textarea:disabled {
            background-color: #4d4d4d;
        }

        .btn {
            background-color: #ffcc00;
            color: #101820;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e6b800;
        }
        .container .sidebar h4{
            /* border-bottom: 1px solid white; */

        }
        .container .sidebar h3 {
              /* border-bottom: 1px solid white; */
        }
        .card {
            /* background-color: #2c2c2c; */
            background-color: #3a3a3a;
            border: none;
            color: white;
            border: 1px solid white;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .pesan {
  box-shadow: 0 0 8px darkslategray;
  /* flex: 1; */
  /* width: 100px; */
  /* height: 500px; */
  margin-bottom: 1rem;
  margin-right: 20px;
  margin-left: 20px;
  padding: 1rem;
  /* text-align: center; */
  transition: transform 0.3s ease;
  border-bottom: 1px solid darkslategray;
}
.pesan h3{
  font-size: 1.2rem;
  margin: 0.5rem 0;
  color: white;
  border-bottom: 1px solid darkslategray;
}
.pesan p{
  font-size: 0.8rem;
  margin: 0.5rem 0;
  text-align: justify;
  color: white;
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
                <li><a href="beranda.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <header class="atas">
    </header>
    <header class="bawah">
        <p>Charity untuk Perpustakaan Yayasan bertujuan untuk memperluas akses terhadap literasi dan pengetahuan di kalangan komunitas yang dilayani oleh yayasan amal. Melalui program ini, donasi uang, buku, peralatan perpustakaan, dan bantuan sukarelawan diterima untuk mendukung pembangunan dan pengembangan perpustakaan yayasan.</p>
        <p>Tujuan utamanya adalah:</p>
        <ul>
            <li>Meningkatkan Literasi: Memberikan akses terhadap bahan bacaan yang berkualitas untuk meningkatkan kemampuan membaca dan menulis di kalangan anggota komunitas.</li>
            <li>Pendidikan yang Berkualitas: Mendukung pendidikan yang bermutu dengan menyediakan sumber daya pendidikan yang relevan dan bermanfaat.</li>
            <li>Pengembangan Pengetahuan: Memperluas pengetahuan anggota komunitas melalui koleksi buku dan sumber daya lainnya yang tersedia di perpustakaan.</li>
            <li>Pertumbuhan Pribadi: Memberikan sumber daya yang diperlukan untuk pertumbuhan intelektual dan pribadi anggota komunitas.</li>
            <li>Pemberdayaan Masyarakat: Menggunakan perpustakaan sebagai pusat pembelajaran dan pertukaran ide untuk memajukan kesejahteraan sosial komunitas yang dilayani oleh yayasan.</li>
        </ul>
        <p>Dengan menyediakan akses yang lebih luas terhadap bahan bacaan dan sumber daya pendidikan, Charity untuk Perpustakaan Yayasan berperan dalam memajukan kesejahteraan intelektual dan sosial komunitas yang dilayani oleh yayasan tersebut.</p>
    </header>
    <div class="container">
    <div class="sidebar">
        <h3>pesan</h3>
    <?php
    foreach ($pesan as $row) :
    ?>
    <div class="pesan">
    <h3><?= $row["nama"]?></h3>
    <p><?= $row["catatan"]?></p>
    <p><?= $row["jumlah"]?></p>

    </div>
    <?php
    endforeach
    ?>
    </div>
    
    <div class="content">
        <h2>donasikan sekarang</h2>
        <form action="" method="post">
        <div class="form-group">
                    <label for="nama" class="col-sm-2 col-form-label text-start form-label">Nama Donatur</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    
                </div>
                <div class="form-group">
                    <label for="telepon" class="col-sm-2 col-form-label text-start form-label">No.Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-sm-2 col-form-label text-start form-label">Alamat</label>
                    
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                   
                </div>
                <div class="form-group">
                    <label for="kota" class="col-sm-2 col-form-label text-start form-label">Kota</label>
                    
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    
                </div>
                <div class="form-group">
                    <label for="provinsi" class="col-sm-2 col-form-label text-start form-label">Provinsi</label>
                    
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    
                </div>
                <div class="form-group">
                    <label for="pos" class="col-sm-2 col-form-label text-start form-label">Kode Pos</label>
                    
                        <input type="text" class="form-control" id="pos" name="pos" required>
                
                </div>
                <div class="form-group">
                    <label for="jumlah" class="col-sm-2 col-form-label text-start form-label">Jumlah</label>
                    
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                    
                </div>
                <div class="form-group">
                    <label for="metode" class="col-sm-2 col-form-label text-start form-label">Metode Pembayaran</label>
                    
                        <select class="form-select form-control" id="metode" name="metode" required>
                            <option value="">- Pilih Metode Pembayaran -</option>
                            <option value="transferbank">Transfer Bank</option>
                            <option value="kartukredit">Kartu Kredit/Debit</option>
                            <option value="paypal">PayPal</option>
                            <option value="dompetdigital">Dompet Digital</option>
                        </select>
                </div>
                <div class="form-group">
                <label for="tujuan" class="col-sm-2 col-form-label text-start form-label">Tujuan</label>
                    
                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="perpustakaan" readonly>
                    
                </div>
                <div class="form-group">
                    <label for="catatan" class="col-sm-2 col-form-label text-start form-label">Catatan</label>
                    
                        <input type="text" class="form-control" id="catatan" name="catatan" required>
                    
                </div>
                    <input type="submit" name="tambah" value="Simpan Data" class="btn btn-primary">
                
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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