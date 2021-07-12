<?php

require_once "../_config/config.php";

if (isset($_POST['add'])) {
  $idPerush = trim(mysqli_real_escape_string($con , $_POST['idPerush']));
  $newId = trim(mysqli_real_escape_string($con , $_POST['newId']));
  $judul = trim(mysqli_real_escape_string($con , $_POST['judul']));
  $jumlah_lowongan = trim(mysqli_real_escape_string($con , $_POST['lowongan']));
  $deskripsi = trim(mysqli_real_escape_string($con , $_POST['deskripsi']));
  $pesan = trim(mysqli_real_escape_string($con , $_POST['pesan']));
  $batasLowongan = trim(mysqli_real_escape_string($con , $_POST['batasLowongan']));
  $rangeSal = trim(mysqli_real_escape_string($con , $_POST['rangeSal']));
  
  $query = "INSERT INTO perusahaan_lowongan (`id`, `idPerush`, `idLowongan`, `tglMasuk`, `batasLowongan`, `judul`, `lowongan`, `deskripsi`, `hapus`, `pesan_ke_pelamar`, `dilihat`, `range_salary`) VALUES (NULL, '$idPerush', '$newId', CURRENT_DATE, '$batasLowongan', '$judul', '$jumlah_lowongan', '$deskripsi', 0, '$pesan', 0, '$rangeSal')";
  mysqli_query($con, $query) or die(mysqli_error($con));

  foreach($_POST['syarat'] as $syarat) {
    mysqli_query($con, "INSERT INTO perusahaan_lowongan_syarat (`idPerush`, `idLowongan`, `idSyarat`) VALUES ('$idPerush', $newId, '$syarat')");
  }
  echo "<script>alert('Data berhasil ditambah');</script>";
  echo "<script>window.location='".base_url_perus('home')."';</script>";
}