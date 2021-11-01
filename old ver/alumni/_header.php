<?php 
require_once "../../_config/config.php";

if (!isset($_SESSION['nim'])) {
  echo "<script>window.location='" .base_url_alumni('auth') ."';</script>";
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
		<link rel="stylesheet" type="text/css" href="<?= base_url_css('style.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,700;0,900;1,200;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url_css('custom.css') ?>">

  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(<?= base_url_image('alumni_profile/'.$data['photo']) ?>);"></div>
	  				<h3><?= $data['nama'] ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li id="home">
            <a href="<?=base_url_alumni('home')?>"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li id="profil">
            <a href="<?=base_url_alumni('profil')?>"><span class="fa fa-user mr-3"></span> Profil</a>
          </li>
          <li id="antrean">
              <a href="<?=base_url_alumni('antrean')?>"><span class="fa fa-suitcase mr-3 notif"></span> Antrean</a>
          </li>
          <li>
            <a href="<?=base_url_alumni('auth/logout.php')?>"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>
        <img src="<?=base_url_image('in.png')?>" class="img-in">
        <img src="<?=base_url_image('ig.png')?>" class="img-ig">
        <img src="<?=base_url_image('fb.png')?>" class="img-fb">
    	</nav>

        <!-- Page Content  -->
      <div class="container-fluid">
        <div id="content" class="p-4 p-md-5 pt-5">