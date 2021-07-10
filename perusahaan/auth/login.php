<?php
require_once "../../_config/config.php";

if (isset($_SESSION['emailPerush'])) {
  echo "<script>window.location = '".base_url_perus()."';</script>";
} else {

  if (isset($_POST['login'])) {
      
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_login = mysqli_query($con, "SELECT * FROM perusahaan WHERE emailPerush = '$email'");

    // Cek email
    if (mysqli_num_rows($sql_login) === 1) {
      
      // Cek password
      $row = mysqli_fetch_assoc($sql_login);
      if ($password === $row['passwordPerush']) {
        $_SESSION['emailPerush'] = $row['emailPerush'];
        echo "<script>window.location='".base_url_perus()."';</script>";
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
		
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,700;0,900;1,200;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <!-- CSS GAN!!! -->
  <style>  
    body {
      background: url("<?=base_url_image('bg-login.png')?>") no-repeat center center fixed;
      background-size: cover;
      font-family: 'Montserrat', sans-serif;
    }
    @media (min-width: 768px) {
      .h-md-100 { height: 100vh; }
    }
    .btn-primary{
      width: 336px;
      height: 46px;
      background: #DE83FD;
      border-radius: 20px;
      border-color: transparent;
    }
    .btn-primary:hover {
      background-color: #8d2fad;
      border-color: transparent;
    }
    .btn-primary:focus {
      background-color: #8d2fad;
      border-color: transparent;
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
      margin-top: 1.2rem;
    }

  </style>
  <title>Login - Infocareer Perusahaan</title>
</head>
<body>
  <div class="d-md-flex h-md-100 align-items-center">

    <!-- First Half -->
    <div class="col-md-6 p-0 h-md-100">
        <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
            <div class="logoarea pt-5 pb-5">
              <p class="text-welcome">Selamat Datang</p>
              <img src="<?= base_url_image('laptop-icon-bglogin.png') ?>" class="img-gambar">
              <p class="text-welcome2">Selamat datang kembali di website infocareer,  tempat untuk mencari pekerja.</p>
            </div>
        </div>
    </div>

    <!-- Second Half -->
    <div class="col-md-6 p-0 h-md-100 loginarea">
        <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
          <form method="post" action="" autocomplete="off">
            <div class="form-group">
                <label class="text-white" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
                <label class="text-white" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                <?php if( isset($error) ) : ?>
                <small class="form-text text-white" style="font-style:italic;">email/password salah</small>
                <?php endif; ?>
            </div> 
            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="login" role="button">Masuk</button>
            </div>
            <div class="text-center">
              <p class="text-white mt-3">Belum punya akun? daftar dulu <b><a class="text-white" href="<?= base_url_perus('auth/register.php')?>">disini!</a></b></p>
            </div>
          </form>
        </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>