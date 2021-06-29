<?php
require_once "../_config/config.php";

if (isset($_SESSION['nim'])) {
  echo "<script>window.location = '".base_url()."';</script>";
} else {

  if (isset($_POST['login'])) {
      
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $sql_login = mysqli_query($con, "SELECT * FROM alumni WHERE nim = '$nim'");

    // Cek nim
    if (mysqli_num_rows($sql_login) === 1) {
      
      // Cek password
      $row = mysqli_fetch_assoc($sql_login);
      if ($password === $row['passwordAlumni']) {
        $_SESSION['nim'] = $nim;
        echo "<script>window.location='".base_url()."';</script>";
      }
    }

    $error = true;
  }
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
  <!-- CSS GAN!!! -->
  <style>
    body {
    background: url("<?=base_url('_assets/images/bg-login.png')?>") no-repeat center center fixed;
    background-size: cover;
    }
    .img-gambar{
    position: absolute;
    left: 12.27%;
    right: 61.87%;
    top: 34.44%;
    bottom: 37.78%;
    }
    .btn-masuk{
    position: absolute;
    width: 336px;
    height: 46px;
    right: 162px;
    top: 402px;
    background: #DE83FD;
    border-radius: 20px;
    }
    .form-masuk{
    position: absolute;
    right: 143px;
    top: 228px;
    }
    .text-welcome{
    position: absolute;
    left: 13.12%;
    right: 62.73%;
    top: 29.58%;
    bottom: 67.64%;

    font-family: Montserrat;
    font-style: normal;
    font-weight: 800;
    font-size: 36px;
    line-height: 20px;

    text-align: center;
    color: #9900CC;
    }
    .text-welcome2{
    position: absolute;
    left: 13.28%;
    right: 61.88%;
    top: 63.75%;
    bottom: 29.44%;

    font-family: Montserrat;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 15px;

    text-align: justify;
    color: #666666;
    }

  </style>
  <title>Login - Infocareer Alumni</title>
</head>
<body>
  <p class="text-welcome">Selamat Datang</p>
  <img src="../_assets/images/laptop-icon-bglogin.png" class="img-gambar">
  <p class="text-welcome2">Selamat datang kembali di website pencarian kerja, pemuda harapan bangsa harus banyak berkarya untuk kemajuan negara.</p>
  
  <form method="post" action="" autocomplete="off" class="form-masuk">
    <div class="form-group row">
      <div class="col-xs-3">
        <label for="nim" class="text-white">NIM</label>
        <input type="text" class="form-control" id="nim" aria-describedby="emailHelp" placeholder="Masukkan NIM" name="nim" required">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-3">
        <label for="password" class="text-white">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
      </div>
    </div> 
    <button type="submit" class="btn btn-masuk" name="login">Masuk</button>
    <br>
    <a href="<?= base_url('auth/register.php')?>" class="text-white">Belum punya akun? daftar dulu disini!</a>
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