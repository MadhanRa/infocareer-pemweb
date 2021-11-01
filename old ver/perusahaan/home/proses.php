<?php

require_once "../../_config/config.php";

function uploadGambar($newFileName) {

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // apakah ada gambar yang diupload
  if ( $error === 4) {
    echo "<script>alert('Anda belum memasukkan gambar');</script>";
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
  $namaFileBaru = $newFileName;
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // lolos pengecekan
  move_uploaded_file($tmpName, '../../_assets/images/lowongan/'.$namaFileBaru);

  return $namaFileBaru;
}

if (isset($_POST['add'])) {
  $idPerush = trim(mysqli_real_escape_string($con , $_POST['idPerush']));
  $idLowongan = trim(mysqli_real_escape_string($con , $_POST['idLowongan']));
  $judul = trim(mysqli_real_escape_string($con , $_POST['judul']));
  $jumlah_lowongan = trim(mysqli_real_escape_string($con , $_POST['lowongan']));
  $deskripsi = trim(mysqli_real_escape_string($con , $_POST['deskripsi']));
  $pesan = trim(mysqli_real_escape_string($con , $_POST['pesan']));
  $batasLowongan = trim(mysqli_real_escape_string($con , $_POST['batasLowongan']));
  $rangeSal = trim(mysqli_real_escape_string($con , $_POST['rangeSal']));
  
  $gambar = uploadGambar($idPerush."_".$idLowongan);

  if (!$gambar) {
    echo "<script>alert('gagal upload gambar');</script>";
  } else {
    $query = "INSERT INTO `perusahaan_lowongan`(`id`, `idPerush`, `idLowongan`, `tglMasuk`, `batasLowongan`, `judul`, `lowongan`, `deskripsi`, `hapus`, `pesan_ke_pelamar`, `dilihat`, `range_salary`, `gambar_lowongan`) VALUES (NULL, '$idPerush', '$idLowongan', CURRENT_DATE, '$batasLowongan', '$judul', $jumlah_lowongan, '$deskripsi', 0, '$pesan', 0, '$rangeSal', '$gambar')";
    mysqli_query($con, $query) or die(mysqli_error($con));
  
    foreach($_POST['syarat'] as $syarat) {
      mysqli_query($con, "INSERT INTO perusahaan_lowongan_syarat (`idPerush`, `idLowongan`, `idSyarat`) VALUES ('$idPerush', $idLowongan, '$syarat')");
    }
    echo "<script>alert('Data berhasil ditambah');</script>";
    echo "<script>window.location='".base_url_perus('home')."';</script>";
  }
}