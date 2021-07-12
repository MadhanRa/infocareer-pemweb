<?php
require_once "../../_config/config.php";

function uploadFile($new_name) {

  $namaFile = $_FILES['file_lampiran']['name'];
  $ukuranFile = $_FILES['file_lampiran']['size'];
  $error = $_FILES['file_lampiran']['error'];
  $tmpName = $_FILES['file_lampiran']['tmp_name'];

  // apakah ada gambar yang diupload
  if ( $error === 4) {
    echo "<script>alert('Anda belum memasukkan file');</script>";
    return false;
  }

  // cek apakah yang diupload adalah file dengan ekstensi yang benar
  $extensiValid = ['pdf', 'doc', 'docx', 'zip'];
  $format = pathinfo($namaFile, PATHINFO_EXTENSION);

  if ( !in_array($format, $extensiValid) ) {
    echo "<script>alert('Format file tidak sesuai. Hanya menerima pdf, doc, docx, dan zip.');</script>";
    return false;
  }

  // cek ukuran gambar
  if ($ukuranFile > 5000000) {
    echo "<script>alert('Ukuran file terlalu besar.');</script>";
    return false;
  }

  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
  $namaFileBaru = $new_name;
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiFile;

  // lolos pengecekan
  move_uploaded_file($tmpName, '../../_assets/files/' . $namaFileBaru);

  return $namaFileBaru;
}

if (isset($_POST['daftar'])) {
  $idLowongan = $_POST['idLowongan'];
  $idPerush = $_POST['idPerush'];
  $tanggal = date('Y-m-d H:i:s');
  $nim = $_SESSION['nim'];

  $sql_check_antrian = mysqli_query($con, "SELECT * FROM application WHERE idLowongan = $idLowongan AND idPerush = $idPerush AND nim = $nim") or die(mysqli_error($con));

  if(mysqli_num_rows($sql_check_antrian) > 0) {
    echo "<script>
    alert('Anda sudah mendaftar pada lowongan ini');
    </script>";
  } else {
    $nama_file_baru = $idLowongan . "_" . $idPerush . "_" . $nim;
    $file_lampiran = uploadFile($nama_file_baru);

    if (!$file_lampiran) {
      echo "<script>alert('gagal upload file');</script>";
    } else {
      $query_insert = "INSERT INTO application VALUES (NULL, '$nim', '$idPerush', '$idLowongan', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 0, CURRENT_TIMESTAMP, 0, 0, '$file_lampiran')";

      mysqli_query($con, $query_insert) or die(mysqli_error($con));

      echo "<script>
      alert('Terimakasih sudah mendaftar');
      window.location='".base_url_alumni('antrean')."';
      </script>";

    }
  }
}