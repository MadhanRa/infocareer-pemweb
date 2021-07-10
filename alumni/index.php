<?php
require_once "../_config/config.php";

if (isset($_SESSION['nim'])) {
  echo "<script>
    window.location ='".base_url_alumni('home')."';
  </script>";
} else {
  echo "<script>
    window.location ='".base_url_alumni('auth')."';
  </script>";
}
