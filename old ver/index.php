<?php
require_once "./_config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,700;0,900;1,200;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <style>
    body {
      background: url("<?=base_url_image('Landing_Page.png')?>") no-repeat center center fixed;
      background-size: cover;
      font-family: 'Montserrat', sans-serif;
    }

    .mtop-232 {
      margin-top: 232px;
    }

    .btn-login {
      position: absolute;
      right: 204px;
      top: 44px;
      text-align: center;
    }

    .btn-daftar {
      position: absolute;
      right: 60px;
      top: 44px;
      text-align: center;
    }

    .btn-primary{
      width: 117px;
      background: #7F05A8;
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

    .mleft-53 {
      margin-left: 53px;
    }

    .ayo-kerjo {
      /* Ayo Kerjo */
      position: absolute;
      width: auto;
      height: 85px;
      left: 53px;
      top: 225px;
      font-style: normal;
      font-weight: bold;
      font-size: 50px;
      line-height: 85px;
      color: #FFFFFF;
    }

    .dengkul {
      /* Dengkulku Modalku, */
      position: absolute;
      width: 191px;
      height: 22px;
      left: 53px;
      top: 309px;
      font-style: normal;
      font-weight: 500;
      font-size: 18px;
      line-height: 22px;
      color: #E5E5E5;
    }

    .today {
      position: absolute;
      width: 357px;
      height: 22px;
      left: 53px;
      top: 325px;
      font-style: normal;
      font-weight: 500;
      font-size: 18px;
      line-height: 22px;
      /* identical to box height */
      color: #E5E5E5;
    }

    .lorem {
      position: absolute;
      width: 412px;
      height: 85px;
      left: 53px;
      top: 360px;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 17px;
      text-align: justify;
      color: #E5E5E5;
    }

    .img-in {
      position: absolute;
      left: 4.14%;
      right: 93.98%;
      top: 92.64%;
      bottom: 4.03%;
    }

    .img-ig {
      position: absolute;
      left: 6.92%;
      right: 91.2%;
      top: 92.64%;
      bottom: 4.03%;
    }

    .img-fb {
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
  <a class="btn btn-primary btn-login text-light" href="<?= base_url('switch.php?isRegister=false') ?>" role="button">Login</a>
  <a class="btn btn-primary btn-daftar text-light" href="<?= base_url('switch.php?isRegister=true') ?>" role="button">Daftar</a>



  <h1 class="ayo-kerjo">Buka Lowongan</h1>
  <p class="dengkul">Dengkulku Modalku,</p>
  <p class="today">Today Melarat Tomorrow Konglomerat.</p>
  <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos velit veniam impedit excepturi
    mollitia cupiditate beatae perspiciatis officiis veritatis aut sequi ipsa, provident, consequatur dolore itaque,
    quibusdam repellendus necessitatibus libero!</p>

  <img src="<?= base_url_image('in.png') ?>" class="img-in">
  <img src="<?= base_url_image('ig.png') ?>" class="img-ig">
  <img src="<?= base_url_image('fb.png') ?>" class="img-fb">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>