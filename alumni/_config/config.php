<?php

session_start();

include_once "conn.php";

// Koneksi ke DB
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);

if (mysqli_connect_errno()) {
  echo mysqli_connect_errno();
}


// Fungsi base urls
function base_url($url = null) {
  $base_url = "http://localhost/infocareer/alumni";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
  
}

function conv_date($date) {
  $batasLowongan_raw = new DateTime($date);
  return $batasLowongan_raw -> format('d M Y');
}