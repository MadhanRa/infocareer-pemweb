<?php

require_once "../_config/config.php";

if (isset($_POST['daftar'])) {
  $idLowongan = $_POST['idLowongan'];
  $idPerush = $_POST['idPerush'];
  $tanggal = date('Y-m-d H:i:s');

  $sql_check_antrian = mysqli_query($con, "SELECT * FROM application WHERE idLowongan = $idLowongan AND idPerush = $idPerush AND nim = 101001") or die(mysqli_error($con));

  if(mysqli_num_rows($sql_check_antrian) > 0) {
    echo "<script>
    alert('Anda sudah mendaftar pada lowongan ini');
    </script>";
  } else {
    mysqli_query($con, "INSERT INTO application (nim, idPerush, idLowongan, tgl_apply, tgl_confirm, confirm, tgl_accept, accept) VALUES ('101001', 11, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 0, CURRENT_TIMESTAMP, 0)");
  }
}