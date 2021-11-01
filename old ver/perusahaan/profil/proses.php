<?php

require_once "../../_config/config.php";

function uploadPhoto($email) {

  $namaFile = $_FILES['logo_perus']['name'];
  $ukuranFile = $_FILES['logo_perus']['size'];
  $error = $_FILES['logo_perus']['error'];
  $tmpName = $_FILES['logo_perus']['tmp_name'];

  // apakah ada gambar yang diupload
  if ( $error === 4) {
    echo "<script>alert('Anda belum memasukkan logo');</script>";
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
  move_uploaded_file($tmpName, '../../_assets/images/perus_profile/'.$namaFileBaru);

  return $namaFileBaru;
}

if (isset($_POST['edit'])) {
  $idPerush = $_POST['idPerush'];
  $emailPerush = $_POST['emailPerush'];
  $namaCp = trim(mysqli_real_escape_string($con , $_POST['namaCp']));
  $telpCp = trim(mysqli_real_escape_string($con , $_POST['telpCp']));
  $produk = trim(mysqli_real_escape_string($con , $_POST['produk']));
  $alamatPerush = trim(mysqli_real_escape_string($con , $_POST['alamatPerush']));
  $telpFaxPerush = trim(mysqli_real_escape_string($con , $_POST['telpFaxPerush']));
  $tentangPerush = trim(mysqli_real_escape_string($con , $_POST['tentangPerush']));

  $logo_perus = uploadPhoto($emailPerush);

  if (!$logo_perus) {
    echo "<script>alert('gagal upload gambar');</script>";
  } else {
    $query = "UPDATE `perusahaan` SET `produk`='$produk',`alamatPerush`='$alamatPerush',`telpFaxPerush`='$telpFaxPerush',`namaCp`='$namaCp',`telpCp`='$telpCp',`tentangPerush`='$tentangPerush', `logo_perus`='$logo_perus' WHERE idPerush = $idPerush";

    mysqli_query($con, $query) or die(mysqli_error($con));

    echo "<script>alert('Data berhasil diedit');</script>";
    echo "<script>window.location='".base_url_perus('profil')."';</script>";
  }
  
}