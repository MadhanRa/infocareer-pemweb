<?php 

include_once('../_header.php');
$nim = $_SESSION['nim'];
$sql_lowongan = mysqli_query($con, "SELECT a.idApp, l.judul, l.batasLowongan,  a.tgl_apply, a.confirm, a.accept, a.tgl_confirm, a.tgl_accept, p.namaPerush FROM application AS a INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush INNER JOIN perusahaan AS p ON a.idPerush = p.idPerush WHERE nim = $nim") or die (mysqli_error($con));
?>

<h1>Konfirmasi Lowongan</h1>

<?php


while($data = mysqli_fetch_assoc($sql_lowongan)) {
?>

<a href="detail.php?id=<?= $data['idApp'] ?>">
  <h3><?= $data['judul'] ?></h3>
  <h5><?= $data['namaPerush'] ?></h5>
  <p>Dibuka sampai <?= conv_date($data['batasLowongan']) ?></p>
  <p>Tanggal Apply <?= conv_date($data['tgl_apply']) ?></p>
  <p>Status Konfirmasi: <?= $data['confirm'] == 0 ? "Menunggu Konfirmasi" : "Telah Dikonfirmasi"?></p>
  <p>Status Terima: <?= $data['accept'] == 0 ? "Belum diterima" : "Diterima" ?></p>
</a>

<?php
}
?>

<?php include_once('../_footer.php'); ?>