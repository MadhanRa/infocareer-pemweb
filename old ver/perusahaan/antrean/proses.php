<?php

require_once "../../_config/config.php";

if (isset($_POST['confirm'])) {
  $idAPP = $_POST['idAPP'];
  $query_confirm = "UPDATE `application` SET `tgl_confirm` = CURRENT_TIMESTAMP,`confirm`=1 WHERE idAPP = $idAPP";

  mysqli_query($con, $query_confirm) or die(mysqli_error($con));

  echo "<script>alert('Pelamar telah di confirm');
  window.history.back();</script>";
}

if (isset($_POST['accept'])) {
  $idAPP = $_POST['idAPP'];
  $query_accept = "UPDATE `application` SET `tgl_accept` = CURRENT_TIMESTAMP,`accept`=1 WHERE idAPP = $idAPP";

  mysqli_query($con, $query_accept) or die(mysqli_error($con));

  echo "<script>alert('Pelamar telah di terima');
  window.history.back();</script>";
}