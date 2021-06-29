<?php 
require_once "../_config/config.php";
if (isset($_SESSION['nim'])) {
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
  <title>Daftar Infocareer - Alumni</title>
</head>
<body>

  <h1>Daftar Infocareer - Alumni</h1>
  <form action="proses.php" id="registForm" method="post" enctype="multipart/form-data" autocomplete="off">
    <label for="nim">NIM</label><br>
    <input type="text" id="nim" name="nim" required><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Pasword</label><br>
    <input type="password" id="password" name="password" required><br>

    <label for="confirmpassword">Konfirmasi Pasword</label><br>
    <input type="password" id="confirmpassword" name="confirmpassword" required><br>
    </div>
      <div class="registrationFormAlert" id="divCheckPasswordMatch">
    </div>
    <label for="nama">Nama Lengkap</label><br>
    <input type="text" id="nama" name="nama" required><br>
    
    <label for="jenkel">Jenis Kelamin</label><br>
    <input type="radio" id="laki" name="jenkel" value="L">
    <label for="laki">Laki-laki</label><br>
    <input type="radio" id="perempuan" name="jenkel" value="P">
    <label for="perempuan">Perempuan</label><br>

    <label for="tmpLahir">Tempat Lahir</label><br>
    <input type="text" id="tmpLahir" name="tmpLahir" required><br>

    <label for="tglLahir">Tanggal Lahir</label><br>
    <input type="date" id="tglLahir" name="tglLahir" required><br>

    <label for="alamat_skrg">Alamat Sekarang</label><br>
    <input type="text" id="alamat_skrg" name="alamat_skrg" required><br>

    <label for="hp_skrg">Nomor Handphone</label><br>
    <input type="text" id="hp_skrg" name="hp_skrg" required><br>

    <label for="wn">Warga Negara</label><br>
    <input type="text" id="wn" name="wn" required><br>

    <label for="no_id">Nomor Identitas</label><br>
    <input type="text" id="no_id" name="no_id" required><br>

    <label for="npwp">NPWP</label><br>
    <input type="text" id="npwp" name="npwp" required><br>

    <label for="statusMarital">Status Marital</label><br>
    <input type="radio" id="kawin" name="statusMarital" value="Kawin">
    <label for="kawin">Kawin</label><br>
    <input type="radio" id="belumKawin" name="statusMarital" value="Belum Kawin">
    <label for="belumKawin">Belum Kawin</label><br>

    <label for="ipk">IPK</label><br>
    <input type="number" id="ipk" name="ipk" min="2.1" max="4.0" step="0.1" required><br>

    <label for="kompetensi">Kompetensi</label><br>
    <textarea name="kompetensi" id="kompetensi" cols="30" rows="5" required></textarea><br>

    <label for="tentangAlumni">Tentang Diri</label><br>
    <textarea name="tentangAlumni" id="tentangAlumni" cols="30" rows="5" required></textarea><br>

    <label for="photo">Photo</label><br>
    <input type="file" id="photo" name="photo"><br>
    
    <button type="submit" name="register" id="registerButton">Daftar</button>
  </form>

  <script src="<?= base_url('_assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('_assets/js/popper.js') ?>"></script>
  <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('_assets/js/main.js') ?>"></script>
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
    });
  </script>
</body>
</html>
<?php
}
?>