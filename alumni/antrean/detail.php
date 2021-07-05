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
<div class="row">
  <div class="col-md-auto">
    <!-- Logo Perusahaan -->
    <img src="<?=base_url('_assets/images/placeholder_lowongan_big.png')?>">
  </div>
  <div class="col-sm m-text">
    <!-- Judul Lowongan -->
    <h3><?= $data['judul'] ?></h3>
    <h6><?= $data['namaPerush'] ?></h6>
    <!-- Info Lowongan -->
    <p>Dibuka sejak <?= conv_date($data['tglMasuk']) ?></p>
    <p>Batas Lowongan <?= conv_date($data['batasLowongan']) ?></p>
    <p>Dibutuhkan <?= $data['lowongan'] ?> orang</p>
    <!-- Surat Undangan -->
  </div>
  <div class="col-md m-text">
    <h5>Status Pendaftar</h5>
    <p>Tanggal mendaftar <?= conv_date($data['tgl_apply']) ?> </p>
    <p>Status Konfirmasi</p>
    <p><?= $data['confirm'] == 0 ? "Menunggu Konfirmasi" : "Telah Dikonfirmasi sejak ".conv_date($data['tgl_confirm']) ?></p>
    <p>Status Terima</p>
    <p><?= $data['accept'] == 0 ? "Belum diterima" : "Diterima sejak ".conv_date($data['tgl_accept']) ?></p>
  </div>
</div>

<!-- Pesan Untuk pelamaar -->
<div class="m-text">
  <h5>Pesan ke pelamar</h5>
  <p><?= $data['pesan_ke_pelamar'] ?></p>
</div>


<?php include_once('../_footer.php'); ?>