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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- CSS GAN!!! -->
  <style>
   body {
    background: url("<?=base_url('_assets/images/bg-login.png')?>") no-repeat center center fixed;
    background-size: cover;
    }
    @media (min-width: 768px) {
    .h-md-100 { height: 100vh; }
    }
    .btn-masuk{
    width: 336px;
    height: 46px;
    background: #DE83FD;
    border-radius: 20px;
    margin-top: 20px;
    }
    .text-welcome{
    font-style: normal;
    font-weight: 800;
    font-size: 36px;
    line-height: 20px;

    text-align: center;
    color: #9900CC;
    }
    .text-welcome2{
    max-width: 400px;
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
<div class="d-md-flex h-md-100 align-items-center">

<!-- First Half -->
<div class="col-md-6 p-0 h-md-100">
    <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
        <div class="logoarea pt-5 pb-5">
          <p class="text-welcome">Selamat Datang</p>
          <img src="../_assets/images/laptop-icon-bglogin.png" class="img-gambar">
          <p class="text-welcome2">Selamat datang kembali di website pencarian kerja, pemuda harapan bangsa harus banyak berkarya untuk kemajuan negara.</p>
        </div>
    </div>
</div>

<!-- Second Half -->
<div class="col-md-6 p-0 h-md-100 loginarea">
    <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
      <form method="post" action="" autocomplete="off">
        <div class="form-group">
          <label class="text-white" for="nim">NIM</label>
          <input type="text" class="form-control" id="nim" placeholder="Enter NIM" name="nim" required>
        </div>
        <div class="form-group">
            <label class="text-white" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            <?php if( isset($error) ) : ?>
            <small class="form-text text-white" style="font-style:italic;">email/password salah</small>
            <?php endif; ?>
        </div> 
        <a class="text-white" href="<?= base_url('auth/register.php')?>">Belum punya akun? daftar dulu disini!</a><br>
        <button class="btn btn-masuk" type="submit" name="login" role="button">Masuk</button>
      </form>
    </div>
</div>
    
  <script src="<?= base_url('_assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('_assets/js/popper.js') ?>"></script>
  <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('_assets/js/main.js') ?>"></script>
</body>
</html>

<?php
}
?>