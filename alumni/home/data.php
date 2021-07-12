<?php 
include_once('../_header.php');

$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 ORDER BY id DESC") or die (mysqli_error($con));

if ( isset($_POST['search']) ) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 AND l.judul LIKE '%$keyword%' ORDER BY id DESC") or die (mysqli_error($con));
}

?>

<h1>Daftar Lowongan</h1>
<form action="" method="post" class="form-inline justify-content-center mt-5" autocomplete="off" >
    <input class="border-search mr-sm-2" type="text" placeholder="Cari Lowongan" aria-label="Search" name="keyword">
    <div class="input-group-append">
      <button type="submit" name="search" id="searchButton" class="btn-search"><i class="fa fa-search"></i></button>
    </div>
</form>

<div class="row mt-3">
  <?php while($data = mysqli_fetch_assoc($sql_lowongan)) {?>
  <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-xl-auto">
          <img src="<?= base_url_image('lowongan/placeholder_lowongan.png') ?>" alt="lowongan pleceholder">
        </div>
        <div class="col-xl">
          <h5 class="card-header text-center"><?= $data['namaPerush'] ?></h5>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5><?= $data['judul'] ?></h5>
                <p><?= $data['deskripsi'] ?></p>
                <p>Exp. <?= conv_date($data['batasLowongan']) ?></p>
                <p><b>Salary</b> <?= $data['range_salary'] ?></p>
              </div>
              <div class="col-12 mt-2">
                <a href="detail.php?id=<?= $data['id'] ?>">Read More</a>
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