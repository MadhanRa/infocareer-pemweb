<?php
require_once "../_config/config.php";
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
  <style>
    body {
      background: url("<?=base_url('_assets/images/Landing_Page.png')?>") no-repeat center center fixed;
      background-size: cover;
    }
    .mtop-232{
      margin-top: 232px;
    }
    .btn-login{
      position: absolute;
      width: 117px;
      height: 40px;
      right: 204px;
      top: 44px;
      text-align: center;

      background: #7F05A8;
      border-radius: 20px;
    }
    .btn-daftar{
      position: absolute;
      width: 117px;
      height: 40px;
      right: 60px;
      top: 44px;
      text-align: center;

      background: #7F05A8;
      border-radius: 20px;
    }
    .mleft-53{
      margin-left: 53px;
    }
    .ayo-kerjo{
      /* Ayo Kerjo */
    position: absolute;
    width: 366px;
    height: 85px;
    left: 53px;
    top: 225px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 70px;
    line-height: 85px;
    color: #FFFFFF;
    }
    .dengkul{
    /* Dengkulku Modalku, */
    position: absolute;
    width: 191px;
    height: 22px;
    left: 53px;
    top: 309px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #E5E5E5;
    }
    .today{
    position: absolute;
    width: 357px;
    height: 22px;
    left: 53px;
    top: 325px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    /* identical to box height */
    color: #E5E5E5;
    }
    .lorem{
    position: absolute;
    width: 412px;
    height: 85px;
    left: 53px;
    top: 360px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 17px;
    text-align: justify;
    color: #E5E5E5;
    }
    .img-in{
    position: absolute;
    left: 4.14%;
    right: 93.98%;
    top: 92.64%;
    bottom: 4.03%;
    }
    .img-ig{
    position: absolute;
    left: 6.92%;
    right: 91.2%;
    top: 92.64%;
    bottom: 4.03%;
    }
    .img-fb{
    position: absolute;
    left: 9.7%;
    right: 89.3%;
    top: 92.64%;
    bottom: 4.03%;
    }
    
  </style>

  <title>Welcome to Infocareer</title>
</head>
<body>
    <a class="btn btn-login text-light" href="<?= base_url('auth') ?>" role="button">Login</a>
    <a class="btn btn-daftar text-light" href="<?= base_url('auth/register.php') ?>" role="button">Daftar</a>

    
    
    <h1 class="ayo-kerjo">Buka Lowongan</h1>
    <p class="dengkul">Dengkulku Modalku,</p>
    <p class="today">Today Melarat Tomorrow Konglomerat.</p>
    <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos velit veniam impedit excepturi mollitia cupiditate beatae perspiciatis officiis veritatis aut sequi ipsa, provident, consequatur dolore itaque, quibusdam repellendus necessitatibus libero!</p>

    <img src="../_assets/images/in.png" class="img-in">
    <img src="../_assets/images/ig.png" class="img-ig">
    <img src="../_assets/images/fb.png" class="img-fb">`
  <script src="<?= base_url('_assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('_assets/js/popper.js') ?>"></script>
  <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('_assets/js/main.js') ?>"></script>
</body>
</html>