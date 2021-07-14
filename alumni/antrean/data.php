<?php
include_once('../_header.php');

$nim = $data['nim'];
$sql_lowongan = mysqli_query($con, "SELECT a.idApp, l.judul, l.batasLowongan, l.gambar_lowongan,  a.tgl_apply, a.confirm, a.accept, a.tgl_confirm, a.tgl_accept, p.namaPerush, p.idPerush 
FROM application AS a 
INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush 
INNER JOIN perusahaan AS p ON a.idPerush = p.idPerush 
WHERE a.nim = $nim AND a.hapus = 0 ORDER BY a.idApp DESC") or die(mysqli_error($con));

if (isset($_POST['search'])) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT a.idApp, l.judul, l.batasLowongan, l.gambar_lowongan, a.tgl_apply, a.confirm, a.accept, a.tgl_confirm, a.tgl_accept, p.namaPerush, p.idPerush 
  FROM application AS a 
  INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush 
  INNER JOIN perusahaan AS p ON a.idPerush = p.idPerush 
  WHERE a.nim = $nim AND a.hapus = 0 AND l.judul LIKE '%$keyword%' ORDER BY a.idApp DESC") or die(mysqli_error($con));
}

?>

<h1>Konfirmasi Lowongan</h1>
<form action="" method="post" class="form-inline justify-content-center mt-5">
  <input class="border-search mr-sm-2" type="text" placeholder="Cari Lowongan" aria-label="Search" name="keyword">
  <div class="input-group-append">
    <button type="submit" name="search" id="searchButton" class="btn-search"><i class="fa fa-search"></i></button>
  </div>
</form>

<div class="row mt-3">
  <?php while ($data = mysqli_fetch_assoc($sql_lowongan)) { ?>
    <div class="col-md-4">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-xl-auto">
            <img src="<?= base_url_image('lowongan/' . $data['gambar_lowongan']) ?>" onerror="this.onerror=null;this.src='<?= base_url_image('lowongan/placeholder_lowongan.png') ?>'" alt="lowongan pleceholder">
          </div>
          <div class="col-xl">
            <h5 class="card-header text-center"><?= $data['namaPerush'] ?></h5>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h5><?= $data['judul'] ?></h5>
                  <p class="card-text">Exp. <?= conv_date($data['batasLowongan']) ?></p>
                  <p class="card-text">Daftar <?= conv_date($data['tgl_apply']) ?></p>
                  <p><span class="badge badge-pill <?= $data['confirm'] == 0 ? "badge-secondary" : "badge-success" ?>"><?= $data['confirm'] == 0 ? "Menunggu Konfirmasi" : "Telah Dikonfirmasi" ?></span></p>
                  <p><span class="badge badge-pill <?= $data['accept'] == 0 ? "badge-secondary" : "badge-success" ?>"><?= $data['accept'] == 0 ? "Belum diterima" : "Diterima" ?></span></p>
                </div>
                <div class="col-12">
                  <a href="detail.php?id=<?= $data['idApp'] ?>" class="antrean-readmore">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>
<?php include_once('../_footer.php'); ?>