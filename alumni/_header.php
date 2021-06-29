<?php 

require_once "_config/config.php";

if (!isset($_SESSION['nim'])) {
  echo "<script>window.location='" .base_url('auth') ."';</script>";
}
$nim = $_SESSION["nim"];
$sql_alumni = mysqli_query($con, "SELECT * FROM alumni WHERE nim = $nim") or die(mysqli_error($con));
$data = mysqli_fetch_assoc($sql_alumni);
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Infocareer - ALumni</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url('_assets/css/style.css') ?>">
    <style>
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
    nav#sidebar{
      background-color: #9900CC;
    }
    </style>

  </head>
  <body>
		<!-- WARNA belum bisa full ungu??? -->
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(<?= base_url('_assets/images/bg_1.jpg') ?>);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(<?= base_url('_assets/images/'.$data['photo']) ?>);"></div>
	  				<h3><?= $data['nama'] ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="<?=base_url('home')?>"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="<?=base_url('profil')?>"><span class="fa fa-gift mr-3"></span> Profil</a>
          </li>
          <li>
              <a href="<?=base_url('antrean')?>"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Antrean</a>
          </li>
          <li>
            <a href="<?=base_url('auth/logout.php')?>"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>
        <img src="<?=base_url('_assets/images/in.png')?>" class="img-in">
        <img src="<?=base_url('_assets/images/ig.png')?>" class="img-ig">
        <img src="<?=base_url('_assets/images/fb.png')?>" class="img-fb">`
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">