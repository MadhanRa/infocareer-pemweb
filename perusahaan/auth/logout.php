<?php

require_once "../_config/config.php";

unset($_SESSION['nim']);
echo "<script>window.location = '".base_url('welcome')."';</script>";