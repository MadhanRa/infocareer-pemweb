<?php 
require_once "../../_config/config.php";
if (isset($_SESSION['nim'])) {
  echo "<script>window.location = '".base_url_alumni()."';</script>";
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
  <title>Daftar Infocareer - Alumni</title>
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
      <div class="container">
        <div class="signup-content">
          <form action="proses.php" id="signup-form" method="post" enctype="multipart/form-data" autocomplete="off" class="signup-form">
          <h2 class="form-title">Daftar Infocareer - Alumni</h2>
            <div class="form-row form-group">
              <div class="col">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" class="form-input" placeholder="Masukkan NIM" required>
              </div>
              <div class="col">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Masukkan Email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Pasword</label>
              <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label for="confirmpassword">Konfirmasi Pasword</label>
              <input type="password" id="confirmpassword" name="confirmpassword" class="form-input" placeholder="Konfirmasi Password" required>
              <small class="registrationFormAlert form-text text-muted" id="divCheckPasswordMatch"></small>
            </div>
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" class="form-input" placeholder="Nama Lengkap" required>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input type="radio" id="laki" name="jenkel" value="L" class="form-check-input">
                    <label for="laki" class="form-check-label">Laki-laki</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" id="perempuan" name="jenkel" value="P" class="form-check-input">
                    <label for="perempuan" class="form-check-label">Perempuan</label>
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-row form-group">
              <div class="col">
                <label for="tmpLahir">Tempat Lahir</label>
                <input type="text" id="tmpLahir" name="tmpLahir" class="form-input" placeholder="Tempat Lahir" required>
              </div>
              <div class="col">
                <label for="tglLahir">Tanggal Lahir</label>
                <input type="date" id="tglLahir" name="tglLahir" class="form-input" required>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat_skrg">Alamat Sekarang</label>
              <input type="text" id="alamat_skrg" name="alamat_skrg" class="form-input" placeholder="Alamat Sekarang" required>
            </div>
            <div class="form-group">
              <label for="hp_skrg">Nomor Handphone</label>
              <input type="text" id="hp_skrg" name="hp_skrg" class="form-input" placeholder="Nomor Handphone" required>
            </div>
            <div class="form-group">
              <label for="wn">Warga Negara</label>
              <input type="text" id="wn" name="wn" class="form-input" placeholder="Warga Negara" required>
            </div>
            <div class="form-group">
              <label for="no_id">Nomor Identitas</label>
              <input type="text" id="no_id" name="no_id" class="form-input" placeholder="Nomor Identitas" required>
            </div>
            <div class="form-group">
              <label for="npwp">NPWP</label>
              <input type="text" id="npwp" name="npwp" class="form-input" placeholder="NPWP" required>
            </div>

            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Status Marital</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input type="radio" id="kawin" name="statusMarital" value="Kawin" class="form-check-input">
                    <label for="kawin" class="form-check-label">Kawin</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" id="belumKawin" name="statusMarital" value="Belum Kawin" class="form-check-input">
                    <label for="belumKawin" class="form-check-label">Belum Kawin</label>
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-group">
              <label for="ipk">IPK</label>
              <input type="number" id="ipk" name="ipk" min="2.1" max="4.0" step="0.1" class="form-input" placeholder="IPK" required>
            </div>
            <div class="form-group">
              <label for="kompetensi">Kompetensi</label>
              <textarea name="kompetensi" id="kompetensi" cols="30" rows="5" class="form-input" placeholder="Kompetensi" required></textarea>
            </div>
            <div class="form-group">
              <label for="tentangAlumni">Tentang Diri</label>
              <textarea name="tentangAlumni" id="tentangAlumni" cols="30" rows="5" class="form-input" placeholder="Tentang Diri" required></textarea>
            </div>
            <div class="form-group">
              <label for="photo">Photo</label>
              <input type="file" id="photo" name="photo" class="form-control-file" >
            </div>
            <div class="form-group">
              <button type="submit" name="register" id="registerButton" class="form-submit">Daftar</button>
            </div>
          </form>
          <p class="loginhere">
            Sudah punya akun ? <a href="<?= base_url_alumni('auth/login.php'); ?>" class="loginhere-link">Login disini</a>
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