<?php 
include_once('../_header.php'); 

$idLowongan = @$_GET['idLowongan'];
$idPerush = @$_GET['idPerush'];
$sql_detail_lowongan = mysqli_query($con, "SELECT l.judul, l.tglMasuk, l.batasLowongan, l.lowongan, l.deskripsi, l.pesan_ke_pelamar, p.namaPerush, p.alamatPerush, p.tentangPerush, p.emailPerush, p.telpFaxPerush, p.telpCp, p.namaCp, GROUP_CONCAT(s.syarat SEPARATOR ';') as 'requirements'
FROM perusahaan_lowongan AS l 
INNER JOIN perusahaan AS p ON l.idPerush = p.idPerush 
INNER JOIN perusahaan_lowongan_syarat ON p.idPerush = perusahaan_lowongan_syarat.idPerush AND l.idLowongan = perusahaan_lowongan_syarat.idLowongan
INNER JOIN syarat_lamar AS s ON perusahaan_lowongan_syarat.idSyarat = s.id 
WHERE l.idLowongan = $idLowongan AND p.idPerush = $idPerush") or die(mysqli_error($con));

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


<form action="proses.php" method="post">
<input type="hidden" name="idLowongan" value="<?= $idLowongan ?>">
<input type="hidden" name="idPerush" value="<?= $idPerush ?>">
<button type="submit" name="daftar">Daftar</button>
</form>

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