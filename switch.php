<?php
require_once "./_config/config.php";
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
  background-size: cover;
  }
  @media (min-width: 768px) {
  .h-md-100 { height: 100vh; }
  }
  .bg-kiri{
    background-color: #9900CC;
  }
  .bg-kanan{
    background-color: #FFFFFF;
  }
  </style>
  <title>Switch - Infocareer</title>
</head>
<body>
<div class="d-md-flex h-md-100 align-items-center">

<!-- First Half -->
<div class="col-md-6 p-0 h-md-100 bg-kiri">
  <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
    <div class="pt-5 pb-5">
      <p class="text-welcome">Selamat Datang</p>
      <img src="<?= base_url_image('laptop-icon-bgswitch.png') ?>" class="img-gambar">
      <p class="text-welcome2">Selamat datang kembali di website pencarian kerja, pemuda harapan bangsa harus banyak berkarya untuk kemajuan negara.</p>
    </div>
  </div>
</div>

<!-- Second Half -->
<div class="col-md-6 p-5 h-md-100 bg-kanan">
  <div class="row h-100">
  <div class="col-sm-12 d-md-flex p-5 my-auto justify-content-center">
    <a  href="<?= base_url_alumni() ?>"><img src="<?= base_url_image('Group 51.png') ?>"></a>
  </div>
  <div class="col-sm-12 d-md-flex p-5 my-auto justify-content-center">
    <a href="<?= base_url_perus() ?>"><img src="<?= base_url_image('Group 53.png') ?>"></a>
  </div>
  </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>
</html>