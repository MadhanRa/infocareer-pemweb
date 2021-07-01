<?php 
require_once "../_config/config.php";
if (isset($_SESSION['emailPerush'])) {
  echo "<script>window.location = '".base_url()."';</script>";
} else {
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
  <title>Daftar Infocareer - Perusahaan</title>
  <style>
  .form-control {
    border : 1px solid grey;
  }
  </style>
</head>
<body>

  <div class="container my-5">
    <h1>Daftar Infocareer - Perusahaan</h1>
    <form action="proses.php" id="registForm" method="post" autocomplete="off">
      <div class="form-group">
        <label for="namaPerush">Nama Perusahaan</label>
        <input type="text" id="namaPerush" name="namaPerush" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="emailPerush">Email</label>
        <input type="email" id="emailPerush" name="emailPerush" class="form-control" required>
      </div>
      <div class="form-group">   
        <label for="passwordPerush">Password</label>
        <input type="password" id="passwordPerush" name="passwordPerush" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="confirmpassword">Konfirmasi Pasword</label>
        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required>
        <small class="registrationFormAlert form-text text-muted" id="divCheckPasswordMatch"></small>
      </div>
      <div class="form-group">
        <label for="namaCp">Nama Cp</label>
        <input type="text" id="namaCp" name="namaCp" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="telpCp">Telp Cp</label>
        <input type="text" id="telpCp" name="telpCp" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="produk">Produk</label>
        <input type="text" id="produk" name="produk" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="alamatPerush">Alamat Perusahaan</label>
        <input type="text" id="alamatPerush" name="alamatPerush" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="telpFaxPerush">Telp/fax Perush</label>
        <input type="text" id="telpFaxPerush" name="telpFaxPerush" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="tentangPerush">Tentang Perusahaan</label>
        <textarea name="tentangPerush" id="tentangPerush" rows="5" class="form-control" required></textarea>
      </div>
      <button type="submit" name="register" id="registerButton" class="btn btn-primary">Daftar</button>
    </form>
  </div>

  <script src="<?= base_url('_assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('_assets/js/popper.js') ?>"></script>
  <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('_assets/js/main.js') ?>"></script>
  <script>
    function checkPasswordMatch() {
      var password = $("#passwordPerush").val();
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
      $("#passwordPerush, #confirmpassword").keyup(checkPasswordMatch);
    });
  </script>
</body>
</html>
<?php
}
?>