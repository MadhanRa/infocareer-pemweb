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
</head>
<body>

  <h1>Daftar Infocareer - Perusahaan</h1>
  <form action="proses.php" id="registForm" method="post" enctype="multipart/form-data" autocomplete="off">
    <label for="namaPerush">Nama Perusahaan</label><br>
    <input type="text" id="namaPerush" name="namaPerush" required><br>

    <label for="emailPerush">Email</label><br>
    <input type="email" id="emailPerush" name="emailPerush" required><br>

    <label for="passwordPerush">Pasword</label><br>
    <input type="password" id="passwordPerush" name="passwordPerush" required><br>

    <label for="confirmpassword">Konfirmasi Pasword</label><br>
    <input type="password" id="confirmpassword" name="confirmpassword" required><br>
    </div>
      <div class="registrationFormAlert" id="divCheckPasswordMatch">
    </div>
    <label for="namaCp">Nama Cp</label><br>
    <input type="text" id="namaCp" name="namaCp" required><br>

    <label for="telpCp">Telp Cp</label><br>
    <input type="text" id="telpCp" name="telpCp" required><br>

    <label for="produk">Produk</label><br>
    <input type="text" id="produk" name="produk" required><br>

    <label for="alamatPerush">Alamat Perusahaan</label><br>
    <input type="text" id="alamatPerush" name="alamatPerush" required><br>

    <label for="telpFaxPerush">Telp/fax Perush</label><br>
    <input type="text" id="telpFaxPerush" name="telpFaxPerush" required><br>

    <label for="tentangPerush">Tentang Peusahaan</label><br>
    <textarea name="tentangPerush" id="tentangPerush" cols="30" rows="5" required></textarea><br>
    
    <button type="submit" name="register" id="registerButton">Daftar</button>
  </form>

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