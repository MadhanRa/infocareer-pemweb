<?php 
include_once('../_header.php'); 

$idApp = @$_GET['id'];

$sql_detail_lowongan = mysqli_query($con, "SELECT l.judul, l.tglMasuk, l.batasLowongan, l.lowongan, l.deskripsi, l.pesan_ke_pelamar, p.namaPerush, p.alamatPerush, p.tentangPerush, p.emailPerush, p.telpFaxPerush, p.telpCp, p.namaCp, GROUP_CONCAT(s.syarat SEPARATOR ';') as 'requirements', a.tgl_apply, a.tgl_confirm, a.confirm, a.tgl_accept, a.accept 
FROM application AS a 
INNER JOIN perusahaan AS p ON a.idPerush = p.idPerush
INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush
INNER JOIN perusahaan_lowongan_syarat AS ps ON p.idPerush = ps.idPerush AND l.idLowongan = ps.idLowongan
INNER JOIN syarat_lamar AS s ON ps.idSyarat = s.id 
WHERE a.idApp = $idApp") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_detail_lowongan);
$requirements = explode(";", $data['requirements']);
?>

<h1>Detail Lowongan</h1>
<h3><?= $data['judul'] ?></h3>

<p>Dibuka sejak <?= conv_date($data['tglMasuk']) ?></p>

<p>Batas Lowongan <?= conv_date($data['batasLowongan']) ?></p>

<p>Dibutuhkan <?= $data['lowongan'] ?> orang</p>

<h5>Deskripsi</h5>
<p><?= $data['deskripsi'] ?></p>

<h5>Syarat-syarat</h5>
<ul>
<?php 
foreach ($requirements as $syarat){?>
<li><?= $syarat ?></li>
<?php
}
?>
</ul>
<h5>Pesan ke pelamar</h5>
<p><?= $data['pesan_ke_pelamar'] ?></p>

<h5>Status Pendaftar</h5>
<p>Tanggal mendaftar <?= conv_date($data['tgl_apply']) ?> </p>
<p>Status Konfirmasi</p>
<p><?= $data['confirm'] == 0 ? "Menunggu Konfirmasi" : "Telah Dikonfirmasi sejak ".conv_date($data['tgl_confirm']) ?></p>
<p>Status Terima</p>
<p><?= $data['accept'] == 0 ? "Belum diterima" : "Diterima sejak ".conv_date($data['tgl_accept']) ?></p>

<h4>Tentang Perusahaan</h4>
<h6><?= $data['namaPerush'] ?></h6>
<p>Alamat</p>
<p><?= $data['alamatPerush'] ?></p>
<p>Tentang Perusahaan</p>
<p><?= $data['tentangPerush'] ?></p>
<p>Kontak Perusahaan</p>
<p>Email: <?= $data['emailPerush'] ?></p>
<p>Telp/Fax: <?= $data['telpFaxPerush'] ?> </p>
<p>CP: <?= $data['telpCp'] ?> (<?= $data['namaCp'] ?>)</p>


<?php include_once('../_footer.php'); ?>