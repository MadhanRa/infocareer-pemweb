<?php 
require_once "../_config/config.php";
if (isset($_SESSION['nim'])) {
  echo "<script>window.location = '".base_url()."';</script>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('_assets/css/style.css') ?>">
  <title>Daftar Infocareer - Alumni</title>
</head>
<body>

  <h1>Daftar Infocareer - Alumni</h1>
  <form action="" method="post">
    <label for="nim">NIM</label><br>
    <input type="text" id="nim" name="nim"><br>

    <label for="nama">Email</label><br>
    <input type="text" id="nama" name="nama"><br>

    <label for="password">Pasword</label><br>
    <input type="password" id="password" name="password"><br>

    <label for="password2">Konfirmasi Pasword</label><br>
    <input type="password" id="password2" name="password2"><br>
    
    <label for="nama">Nama Lengkap</label><br>
    <input type="text" id="nama" name="nama"><br>
    
    <label for="jenkel">Jenis Kelamin</label><br>
    <input type="radio" id="laki" name="jenkel" value="L">
    <label for="laki">Laki-laki</label><br>
    <input type="radio" id="perempuan" name="jenkel" value="P">
    <label for="perempuan">Perempuan</label><br>

    <label for="tmpLahir">Tempat Lahir</label><br>
    <input type="text" id="tmpLahir" name="tmpLahir"><br>

    <label for="tglLahir">Tanggal Lahir</label><br>
    <input type="date" id="tglLahir" name="tglLahir"><br>

    <label for="alamat_skrg">Alamat Sekarang</label><br>
    <input type="text" id="alamat_skrg" name="alamat_skrg"><br>

    <label for="hp_skrg">Nomor Handphone</label><br>
    <input type="text" id="hp_skrg" name="hp_skrg"><br>

    <label for="wn">Warga Negara</label><br>
    <input type="text" id="wn" name="wn"><br>

    <label for="no_id">Nomor Identitas</label><br>
    <input type="number" id="no_id" name="no_id"><br>

    <label for="npwp">NPWP</label><br>
    <input type="number" id="npwp" name="npwp"><br>

    <label for="statusMarital">Status Marital</label><br>
    <input type="radio" id="menikah" name="statusMarital" value="Menikah">
    <label for="menikah">Menikah</label><br>
    <input type="radio" id="belumMenikah" name="statusMarital" value="Belum Menikah">
    <label for="belumMenikah">Belum Menikah</label><br>

    <label for="ipk">IPK</label><br>
    <input type="number" id="ipk" name="ipk" min="2.1" max="4.0" step="0.1"><br>

    <label for="kompetensi">Kompetensi</label><br>
    <textarea name="kompetensi" id="kompetensi" cols="30" rows="5"></textarea><br>

    <label for="tentangAlumni">Tentang Diri</label><br>
    <textarea name="tentangAlumni" id="tentangAlumni" cols="30" rows="5"></textarea>
    
    <button type="submit" name="register">Daftar</button>
  </form>

  <script src="<?= base_url('_assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('_assets/js/popper.js') ?>"></script>
  <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('_assets/js/main.js') ?>"></script>
</body>
</html>
<?php
}
?>