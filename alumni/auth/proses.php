<?php
require_once "../../_config/config.php";

function uploadPhoto($nim) {

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
  $namaFileBaru = $nim;
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // lolos pengecekan
  move_uploaded_file($tmpName, base_url_image('alumni_profile').$namaFileBaru);

  return $namaFileBaru;
}

if (isset($_POST['register'])) {
  $nim = trim(mysqli_real_escape_string($con , $_POST['nim']));

  $email = trim(mysqli_real_escape_string($con , $_POST['email']));
  $password = trim(mysqli_real_escape_string($con , $_POST['password']));
  $nama = trim(mysqli_real_escape_string($con , $_POST['nama']));
  $jenkel = trim(mysqli_real_escape_string($con , $_POST['jenkel']));
  $tmpLahir = trim(mysqli_real_escape_string($con , $_POST['tmpLahir']));
  $tglLahir = trim(mysqli_real_escape_string($con , $_POST['tglLahir']));
  $alamat_skrg = trim(mysqli_real_escape_string($con , $_POST['alamat_skrg']));
  $hp_skrg = trim(mysqli_real_escape_string($con , $_POST['hp_skrg']));
  $wn = trim(mysqli_real_escape_string($con , $_POST['wn']));
  $no_id = trim(mysqli_real_escape_string($con , $_POST['no_id']));
  $npwp = trim(mysqli_real_escape_string($con , $_POST['npwp']));
  $statusMarital = trim(mysqli_real_escape_string($con , $_POST['statusMarital']));
  $ipk = trim(mysqli_real_escape_string($con , $_POST['ipk']));
  $kompetensi = trim(mysqli_real_escape_string($con , $_POST['kompetensi']));
  $tentangAlumni = trim(mysqli_real_escape_string($con , $_POST['tentangAlumni']));

  $photo = uploadPhoto($_POST['nim']);

  $sql_cek = mysqli_query($con, "SELECT * FROM alumni WHERE nim = $nim");



  if (mysqli_num_rows($sql_cek) > 0) {
    echo "<script>alert('NIM sudah ada');</script>";
  } else {
    if (!$photo) {
      echo "<script>alert('gagal upload gambar');</script>";
    } else {
      $query = "INSERT INTO alumni VALUES 
      ('$nim', '$nama', '$jenkel', '$tmpLahir', '$tglLahir', '$alamat_skrg', '$hp_skrg', '$email', '$wn', '$no_id', '$npwp', '$statusMarital', '$ipk', '$photo', '$kompetensi', '$password', 0, '$tentangAlumni')";
      mysqli_query($con, $query) or die(mysqli_error($con));
  
      echo "<script>alert('Data berhasil ditambah');</script>";
  
      $_SESSION['nim'] = $_POST['nim'];
  
      echo "<script>window.location='".base_url_alumni()."';</script>";
    }
  }

}