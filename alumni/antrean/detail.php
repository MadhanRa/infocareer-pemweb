<?php 
include_once('../_header.php'); 

$idApp = @$_GET['id'];

$sql_detail_lowongan = mysqli_query($con, "SELECT l.judul, l.tglMasuk, l.batasLowongan, l.lowongan, l.deskripsi, l.pesan_ke_pelamar, l.gambar_lowongan, p.namaPerush, a.tgl_apply, a.tgl_confirm, a.confirm, a.tgl_accept, a.accept 
FROM application AS a
INNER JOIN perusahaan AS p ON a.idPerush = p.idPerush
INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush
INNER JOIN perusahaan_lowongan_syarat AS ps ON p.idPerush = ps.idPerush AND l.idLowongan = ps.idLowongan
INNER JOIN syarat_lamar AS s ON ps.idSyarat = s.id
WHERE a.idApp = $idApp") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_detail_lowongan);

if (isset($_POST['delete'])) {
  mysqli_query($con, "UPDATE application SET hapus=1 WHERE idAPP='$idApp'");
  echo "<script>window.location='".base_url_alumni('antrean')."';</script>";
}
?>
<div class="row">
  <div class="col-md-auto">
    <!-- Logo Perusahaan -->
    <img class="img-detail" src="<?= base_url_image('lowongan/'.$data['gambar_lowongan']) ?>">
  </div>
  <div class="col-sm">
    <!-- Judul Lowongan -->
    <h3><?= $data['judul'] ?></h3>
    <h5><?= $data['namaPerush'] ?></h5>
    <!-- Info Lowongan -->
    <div class="mt-3">
      <h6>Dibuka Sejak</h6>
      <p><?= conv_date($data['tglMasuk']) ?></p>
      <h6>Batas Lowongan</h6>
      <p><?= conv_date($data['batasLowongan']) ?></p>
      <h6>Dibutuhkan</h6>
      <p><?= $data['lowongan'] ?> orang</p>
    </div>
  </div>
  <div class="col-md mt-5">
    <h5>Status Pendaftar</h5>
    <p>Tanggal mendaftar <?= conv_date($data['tgl_apply']) ?> </p>
    <h6>Status Konfirmasi</h6>
    <p><span class="badge badge-pill <?= $data['confirm'] == 0 ? "badge-secondary" : "badge-success"?>"><?= $data['confirm'] == 0 ? "Menunggu Konfirmasi" : "Telah Dikonfirmasi sejak ".conv_date($data['tgl_confirm']) ?></span></p>
    <h6>Status Terima</h6>
    <p><span class="badge badge-pill <?= $data['accept'] == 0 ? "badge-secondary" : "badge-success"?>"><?= $data['accept'] == 0 ? "Belum diterima" : "Diterima sejak ".conv_date($data['tgl_accept']) ?></span></p>
  </div>
</div>

<!-- Pesan Untuk pelamaar -->
<div class="mt-5">
  <h5>Deskripsi</h5>
  <p><?= $data['deskripsi'] ?></p>
  <h5>Pesan ke pelamar</h5>
  <p><?= $data['pesan_ke_pelamar'] ?></p>
</div>

<form action="" method="post">
  <button type="submit" name="delete" id="deleteButton" class="btn btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus lowongan?')"><span class="fa fa-trash mr-3"></span>Hapus</button>
</form>

<?php include_once('../_footer.php'); ?>