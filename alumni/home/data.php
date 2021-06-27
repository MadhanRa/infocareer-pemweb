<?php 

include_once('../_header.php');

$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 ORDER BY id DESC") or die (mysqli_error($con));
?>

<h1>Daftar Lowongan</h1>

<input type="text" name="search" >

<?php while($data = mysqli_fetch_assoc($sql_lowongan)) {?>

<a href="detail.php?id=<?= $data['id'] ?>">
  <h3><?= $data['judul'] ?></h3>
  <h5><?= $data['namaPerush'] ?></h5>
  <p>Membutuhkan <?= $data['lowongan'] ?> pekerja</p>
  <p>Dibuka sampai <?= conv_date($data['batasLowongan']) ?></p>
  <p>Gaji <?= $data['range_salary'] ?></p>
</a>

<?php
}
?>

<?php include_once('../_footer.php'); ?>