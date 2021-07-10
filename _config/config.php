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
  $base_url = "http://localhost/infocareer";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_perus($url = null) {
  $base_url = "http://localhost/infocareer/perusahaan";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_alumni($url = null) {
  $base_url = "http://localhost/infocareer/alumni";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_image($url = null) {
  $base_url = "http://localhost/infocareer/_assets/images";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_js($url = null) {
  $base_url = "http://localhost/infocareer/_assets/js";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_css($url = null) {
  $base_url = "http://localhost/infocareer/_assets/css";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_fonts($url = null) {
  $base_url = "http://localhost/infocareer/_assets/fonts";

  if ($url != null) {
    return $base_url. "/" .$url;
  } else {
    return $base_url;
  }
}

function base_url_files($url = null) {
  $base_url = "http://localhost/infocareer/_assets/files";

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