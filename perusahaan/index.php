<?php
require_once "_config/config.php";

if (isset($_SESSION['emailPerush'])) {
  echo "<script>
    window.location ='".base_url('home')."';
  </script>";
} else {
  echo "<script>
    window.location ='".base_url('welcome')."';
  </script>";
}
