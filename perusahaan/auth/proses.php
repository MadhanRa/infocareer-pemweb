<?php
require_once "../../_config/config.php";

function uploadPhoto($email) {

  $namaFile = $_FILES['photo']['name'];
  $ukuranFile = $_FILES['photo']['size'];
  $error = $_FILES['photo']['error'];
  $tmpName = $_FILES['photo']['tmp_name'];

  // apakah ada gambar yang diupload
  if ( $error === 4) {
    echo "<script>alert('Anda belum memasukkan photo');</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $extensiValid = ['jpg', 'jpeg', 'png'];
  $format = pathinfo($namaFile, PATHINFO_EXTENSION);

  if ( !in_array($format, $extensiValid) ) {
    echo "<script>alert('Format file gambar tidak sesuai.');</script>";
    return false;
  }

  // cek ukuran gambar
  if ($ukuranFile > 2000000) {
    echo "<script>alert('ukuran gambar terlalu besar.');</script>";
    return false;
  }

  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  $namaFileBaru = $email;
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // lolos pengecekan
  move_uploaded_file($tmpName, base_url_image('perus_profile').$namaFileBaru);

  return $namaFileBaru;
}

if (isset($_POST['register'])) {
  $email = trim(mysqli_real_escape_string($con , $_POST['emailPerush']));
  $password = trim(mysqli_real_escape_string($con , $_POST['password']));
  $nama = trim(mysqli_real_escape_string($con , $_POST['namaPerush']));
  $namaCp = trim(mysqli_real_escape_string($con , $_POST['namaCp']));
  $telpCp = trim(mysqli_real_escape_string($con , $_POST['telpCp']));
  $produk = trim(mysqli_real_escape_string($con , $_POST['produk']));
  $alamatPerush = trim(mysqli_real_escape_string($con , $_POST['alamatPerush']));
  $telpFaxPerush = trim(mysqli_real_escape_string($con , $_POST['telpFaxPerush']));
  $tentangPerush = trim(mysqli_real_escape_string($con , $_POST['tentangPerush']));

  $photo = uploadPhoto($_POST['emailPerush']);

  $sql_cek = mysqli_query($con, "SELECT * FROM perusahaan WHERE emailPerush = '$email'");

  if (mysqli_num_rows($sql_cek) > 0) {
    echo "<script>alert('Email sudah ada');</script>";
  } else {
    if (!$photo) {
      echo "<script>alert('gagal upload gambar');</script>";
    } else {
      $query = "INSERT INTO perusahaan (`idPerush`, `namaPerush`, `produk`, `alamatPerush`, `telpFaxPerush`, `emailPerush`, `namaCp`, `telpCp`, `regTime`, `tentangPerush`, `passwordPerush`, `flag`) VALUES (NULL, '$nama', '$produk', '$alamatPerush', '$telpFaxPerush', '$email', '$namaCp', '$telpCp', CURRENT_TIMESTAMP, '$tentangPerush', '$password', 1)";

      mysqli_query($con, $query) or die(mysqli_error($con));

      echo "<script>alert('Data berhasil ditambah');</script>";

      $_SESSION['emailPerush'] = $_POST['emailPerush'];

      echo "<script>window.location='".base_url_perus()."';</script>";
    }
  }

}