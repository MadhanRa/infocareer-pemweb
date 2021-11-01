<?php

include_once('../_header.php');

$idPerush = $data['idPerush'];
$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, l.gambar_lowongan FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE l.hapus = 0 AND l.idPerush = $idPerush ORDER BY id DESC") or die(mysqli_error($con));

if (isset($_POST['search'])) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, l.gambar_lowongan FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 AND l.idPerush = $idPerush AND l.judul LIKE '%$keyword%' ORDER BY id DESC") or die(mysqli_error($con));
}

?>

<h1>Daftar Lowongan</h1>
<div class="row mt-5">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form action="" method="post" class="form-inline justify-content-center" autocomplete="off">
      <input class="border-search mr-sm-2" type="text" placeholder="Cari Lowongan" aria-label="Search" name="keyword">
      <div class="input-group-append">
        <button type="submit" name="search" id="searchButton" class="btn-search"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
  <div class="col-md-4">
    <div class="pull-right">
      <a href="<?= base_url_perus('home/tambah.php') ?>" class="btn btn-primary-themed tambah-lowongan"><span class="fa fa-plus mr-2"></span>Tambah Lowongan</a>
    </div>
  </div>
</div>

<div class="row mt-3">

  <?php while ($data = mysqli_fetch_assoc($sql_lowongan)) { ?>

    <div class="col-md-4">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-xl-auto">
            <img src="<?= base_url_image('lowongan/' . $data['gambar_lowongan']) ?>" onerror="this.onerror=null;this.src='<?= base_url_image('lowongan/placeholder_lowongan.png') ?>'" alt="placeholder lowongan">
          </div>
          <div class="col-xl-5">
            <div class="card-body">
              <h5><?= $data['judul'] ?></h5>
              <p><?= $data['deskripsi'] ?></p>
              <a href="detail.php?id=<?= $data['id'] ?>">Read More</a>
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