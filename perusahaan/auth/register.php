<?php 
require_once "../../_config/config.php";
if (isset($_SESSION['emailPerush'])) {
  echo "<script>window.location = '".base_url_perus()."';</script>";
} else {
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
  <link rel="stylesheet" href="<?= base_url_fonts('material-icon/css/material-design-iconic-font.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url_css('registration.css') ?>">
  <title>Daftar Infocareer - Perusahaan</title>
  <style>
    .form-title {
      color: #7f05a8;
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 2rem;
    }
  </style>
</head>
<body>
  <div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data" autocomplete="off" action="proses.php">
                    <h2 class="form-title">Daftar Perusahaan</h2>
                    <div class="form-group">
                        <label for="namaPerush">Nama Perusahaan</label>
                        <input type="text" id="namaPerush" name="namaPerush" class="form-input" placeholder="Nama Perusahaan" required>
                    </div>
                    <div class="form-group">
                      <label for="emailPerush">Email</label>
                      <input type="email" id="emailPerush" name="emailPerush" class="form-input" placeholder="Email Perusahaan" required>
                    </div>
                    <div class="form-group">   
                      <label for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
                      <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                      <label for="confirmpassword">Konfirmasi Pasword</label>
                      <input type="password" id="confirmpassword" name="confirmpassword" class="form-input" placeholder="Konfirmasi Password" required>
                      <small class="registrationFormAlert form-text text-muted" id="divCheckPasswordMatch"></small>
                    </div>
                    <div class="form-row form-group">
                      <div class="col">
                        <label for="namaCp">Nama Cp</label>
                        <input type="text" id="namaCp" name="namaCp" class="form-input" placeholder="Nama Contact Person" required>
                      </div>
                      <div class="col">
                        <label for="telpCp">Telp Cp</label>
                        <input type="text" id="telpCp" name="telpCp" class="form-input" placeholder="Telp Contact Person" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="produk">Produk</label>
                      <input type="text" id="produk" name="produk" class="form-input" placeholder="Produk Perusahaan" required>
                    </div>
                    <div class="form-group">
                      <label for="alamatPerush">Alamat Perusahaan</label>
                      <input type="text" id="alamatPerush" name="alamatPerush" class="form-input" placeholder="Alamat Perusahaan" required>
                    </div>
                    <div class="form-group">
                      <label for="telpFaxPerush">Telp/fax Perusahaan</label>
                      <input type="text" id="telpFaxPerush" name="telpFaxPerush" class="form-input" placeholder="Telp/Fax Perusahaan" required>
                    </div>
                    <div class="form-group">
                      <label for="tentangPerush">Tentang Perusahaan</label>
                      <textarea name="tentangPerush" id="tentangPerush" rows="5" class="form-input" placeholder="Tentang Perusahaan" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="logo_perus">Logo Perusahaan</label>
                      <input type="file" id="logo_perus" name="logo_perus" class="form-input" >
                    </div>
                    <div class="form-group">
                      <button type="submit" name="register" id="registerButton" class="form-submit">Daftar</button>
                    </div>
                </form>
                <p class="loginhere">
                    Sudah punya akun ? <a href="<?= base_url_perus('auth/login.php'); ?>" class="loginhere-link">Login disini</a>
                </p>
            </div>
        </div>
    </section>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    function checkPasswordMatch() {
      var password = $("#password").val();
      var confirmPassword = $("#confirmpassword").val();

      if (password != confirmPassword) {
          $("#divCheckPasswordMatch").html("Password tidak sama");
          $("#registerButton").attr("disabled", true);
      } else {
          $("#divCheckPasswordMatch").html("Passwords sama.");
          $("#registerButton").attr("disabled", false);
      }
    }

    $(document).ready(function () {
      $("#password, #confirmpassword").keyup(checkPasswordMatch);
      $(".toggle-password").click(function () {
        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    });
  </script>
</body>
</html>
<?php
}
?>