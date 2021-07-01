<?php
require_once "../_config/config.php";

if (isset($_POST['register'])) {
  $email = trim(mysqli_real_escape_string($con , $_POST['emailPerush']));
  $password = trim(mysqli_real_escape_string($con , $_POST['passwordPerush']));
  $nama = trim(mysqli_real_escape_string($con , $_POST['namaPerush']));
  $namaCp = trim(mysqli_real_escape_string($con , $_POST['namaCp']));
  $telpCp = trim(mysqli_real_escape_string($con , $_POST['telpCp']));
  $produk = trim(mysqli_real_escape_string($con , $_POST['produk']));
  $alamatPerush = trim(mysqli_real_escape_string($con , $_POST['alamatPerush']));
  $telpFaxPerush = trim(mysqli_real_escape_string($con , $_POST['telpFaxPerush']));
  $tentangPerush = trim(mysqli_real_escape_string($con , $_POST['tentangPerush']));

  $sql_cek = mysqli_query($con, "SELECT * FROM perusahaan WHERE emailPerush = '$email'");

  if (mysqli_num_rows($sql_cek) > 0) {
    echo "<script>alert('Email sudah ada');</script>";
    echo "<script>window.location='".base_url('auth/register.php')."';</script>";
  } else {
    $query = "INSERT INTO perusahaan (`idPerush`, `namaPerush`, `produk`, `alamatPerush`, `telpFaxPerush`, `emailPerush`, `namaCp`, `telpCp`, `regTime`, `tentangPerush`, `passwordPerush`, `flag`) VALUES (NULL, '$nama', '$produk', '$alamatPerush', '$telpFaxPerush', '$email', '$namaCp', '$telpCp', CURRENT_TIMESTAMP, '$tentangPerush', '$password', 1)";
    mysqli_query($con, $query) or die(mysqli_error($con));

    echo "<script>alert('Data berhasil ditambah');</script>";

    $_SESSION['emailPerush'] = $_POST['emailPerush'];

    echo "<script>window.location='".base_url()."';</script>";
  }

}