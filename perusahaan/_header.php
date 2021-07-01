<?php 

require_once "_config/config.php";

if (!isset($_SESSION['emailPerush'])) {
  echo "<script>window.location='" .base_url('auth') ."';</script>";
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
		<link rel="stylesheet" href="<?= base_url('_assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  </head>
  <style>
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
  }

  .card a {
    font-size: 9px;
    background: #C4C4C4;
    border-radius: 7px;
    padding: 2px 12px;
    text-decoration: none;
    color: white;
  }

  .card-body {
    padding: 6px 12px;
    margin-left: 12px;
  }
  </style>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(<?= base_url('_assets/images/bg_1.jpg') ?>);">
	  			<div class="user-logo">
	  				<h3><?= $data['namaPerush'] ?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="<?=base_url('home')?>"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
            <a href="<?=base_url('profil')?>"><span class="fa fa-user mr-3"></span> Profil</a>
          </li>
          <li>
              <a href="<?=base_url('antrean')?>"><span class="fa fa-suitcase mr-3"></span> Antrean</a>
          </li>
          <li>
            <a href="<?=base_url('auth/logout.php')?>"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">