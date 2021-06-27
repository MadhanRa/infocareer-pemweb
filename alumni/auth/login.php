<?php
require_once "../_config/config.php";

if (isset($_SESSION['nim'])) {
  echo "<script>window.location = '".base_url()."';</script>";
} else {

  if (isset($_POST['login'])) {
      
    $nim = $_POST['nim'];
    $password = $_POST['password'];

    $sql_login = mysqli_query($con, "SELECT * FROM alumni WHERE nim = '$nim'");

    // Cek nim
    if (mysqli_num_rows($sql_login) === 1) {
      
      // Cek password
      $row = mysqli_fetch_assoc($sql_login);
      if ($password === $row['passwordAlumni']) {
        $_SESSION['nim'] = $nim;
        echo "<script>window.location='".base_url()."';</script>";
      }
    }

    $error = true;
  }
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
  <title>Login - Infocareer Alumni</title>
</head>
<body>
  <h1>Login - Infocareer Alumni</h1>
  <?php if( isset($error) ) : ?>
    <p style="color:red; font-style: italic;">NIM/password salah</p>
  <?php endif; ?>
  <form method="post" action="" autocomplete="off">
    <label for="nim">NIM</label><br>
    <input type="text" id="nim" name="nim" required><br>

    <label for="password">Pasword</label><br>
    <input type="password" id="password" name="password" required>

    <button type="submit" name="login">Login</button>

  </form>


  <a href="<?= base_url('auth/register.php')?>">Belum punya akun? daftar dulu disini!</a>

  
  <script src="<?= base_url('_assets/js/jquery.min.js')?>"></script>
  <script src="<?= base_url('_assets/js/popper.js') ?>"></script>
  <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('_assets/js/main.js') ?>"></script>
</body>
</html>

<?php
}
?>