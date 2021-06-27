<?php

require_once "../_config/config.php";

if (isset($_POST['daftar'])) {
  $idLowongan = $_POST['idLowongan'];
  $idPerush = $_POST['idPerush'];
  $tanggal = date('Y-m-d H:i:s');
  $nim = $_SESSION['nim'];
  $sql_check_antrian = mysqli_query($con, "SELECT * FROM application WHERE idLowongan = $idLowongan AND idPerush = $idPerush AND nim = $nim") or die(mysqli_error($con));

  if(mysqli_num_rows($sql_check_antrian) > 0) {
    echo "<script>
    alert('Anda sudah mendaftar pada lowongan ini');
    window.location='".base_url('home/detail.php?idLowongan='.$idLowongan.'&idPerush='.$idPerush)."';
    </script>";
  } else {
    mysqli_query($con, "INSERT INTO application (nim, idPerush, idLowongan, tgl_apply, tgl_confirm, confirm, tgl_accept, accept) VALUES ($nim, $idPerush, $idLowongan, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 0, CURRENT_TIMESTAMP, 0)");
    echo "<script>
    alert('Terimakasih sudah mendaftar');
    window.location='".base_url('antrean')."';
    </script>";
  }
}