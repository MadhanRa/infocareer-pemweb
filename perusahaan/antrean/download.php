<?php


if (isset($_GET['file'])) {
  $fileName = basename($_GET['file']);
  $filePath = "../../_assets/files/".$fileName;

  if (!empty($fileName) && file_exists($filePath)) {
    // Define headers
    header("Cache-Control: public");
    header("Content-Descriptions: File Transfer");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read file
    readfile($filePath);
    exit;
  } else {
    echo "<script>alert('File tidak  ada')</script>;";
  }
}