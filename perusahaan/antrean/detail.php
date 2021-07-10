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
?>

<h1>Detail Lowongan</h1>



<?php include_once('../_footer.php'); ?>