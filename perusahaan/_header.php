<?php 

require_once "../../_config/config.php";

if (!isset($_SESSION['emailPerush'])) {
  echo "<script>window.location='" .base_url_perus('auth') ."';</script>";
}
$email = $_SESSION["emailPerush"];
$sql_perusahaan = mysqli_query($con, "SELECT * FROM perusahaan WHERE emailPerush = '$email'") or die(mysqli_error($con));
$data = mysqli_fetch_assoc($sql_perusahaan);
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Infocareer - Perusahaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url_css('style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,700;0,900;1,200;1,400;1,700;1,900&display=swap" rel="stylesheet">
  </head>
  <style>
    body {
      font-family: "Montserrat", sans-serif;
    }
    #sidebar {
      background: #9900CC;
    }
    
    .card h5 {
      font-size: 12px;
    }

    .card p {
      font-size: 9px;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      overflow: hidden;
      margin-bottom: 0.6rem;
    }

    .card a {
      font-size: 9px;
      background: #C4C4C4;
      border-radius: 7px;
      padding: 2px 12px;
      text-decoration: none;
      color: white;
    }

    .card a:hover {
      background: #757575;
    }

    .card-body {
      padding: 0.7rem;
    }

    .btn-primary-themed{
      width: 200px;
      background: #9900CC;
      border-radius: 20px;
      color: white;
    }

    .btn-primary-themed:hover {
      background: #7F05A8;
      color: white;
    }

    .btn-primary-themed.tambah-lowongan {
      font-size: 12px;
    }

    .btn-secondary-themed {
      width: 200px;
      border: 1px solid #7F05A8;
      background: white;
      border-radius: 20px;
      color: #7F05A8;
    }

    .title-perush {
      font-size: 2rem;
      color: #7F05A8;
      font-weight: bold;
    }
    .img-in{
      position: absolute;
      right: 180px;
      bottom: 37.98px;
    }
    .img-ig{
      position: absolute;
      right: 140px;
      bottom: 37.98px;
    }
    .img-fb{
      position: absolute;
      right: 110px;
      bottom: 37.98px;
    }
    /* Search Input di home dan antrean */
    .btn-search {
      margin-left: -2.3rem;
      background-color: transparent;
      border: none;
      color: #650984;
    }
    .border-search {
      width: 280px;
      height: 31px;
      border: 2px solid #650984;
      box-sizing: border-box;
      border-radius: 15px;
      outline: none;
      padding: 0 10px;
    }
    input[type="text"].border-search::-webkit-input-placeholder {
      /* Chrome/Opera/Safari */
      font-size: 12px;
    }
  </style>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4";">
	  			<div class="user-logo">
	  				<h3><?= $data['namaPerush'] ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li id="home">
            <a href="<?=base_url_perus('home')?>"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li id="profil">
            <a href="<?=base_url_perus('profil')?>"><span class="fa fa-user mr-3"></span> Profil</a>
          </li>
          <li id="antrean">
              <a href="<?=base_url_perus('antrean')?>"><span class="fa fa-suitcase mr-3"></span> Daftar Pelamar</a>
          </li>
          <li>
            <a href="<?=base_url_perus('auth/logout.php')?>"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>
        <img src="<?=base_url_image('in.png')?>" class="img-in">
        <img src="<?=base_url_image('ig.png')?>" class="img-ig">
        <img src="<?=base_url_image('fb.png')?>" class="img-fb">
    	</nav>

        <!-- Page Content  -->
      <div class="container-fluid">
        <div id="content" class="p-4 p-md-5 pt-5">