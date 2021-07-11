<style>
.btn-search{
  width: 14.1px;
  height: 13.55px;
  margin-left: -2rem;
}
.border-search{
  width: 280px;
  height: 31px;
  border: 2px solid #650984;
  box-sizing: border-box;
  border-radius: 15px;
  outline: none;
}
.card-horizontal {
  display: flex;
  flex: 1 1 auto;
}
</style>
<?php 
include_once('../_header.php');

$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 ORDER BY id DESC") or die (mysqli_error($con));

if ( isset($_POST['search']) ) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 AND l.judul LIKE '%$keyword%' ORDER BY id DESC") or die (mysqli_error($con));
}

?>

<h1>Daftar Lowongan</h1>
<!-- <form action="" method="post">
  <input type="text" name="keyword" placeholder="Cari lowongan">
  <button type="submit" name="search" id="searchButton">Cari</button>
</form> -->
<form class="form-inline justify-content-center">
    <input class="border-search mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <img src="<?=base_url_image('search-icon.png')?>" class="btn-search" type ="submit">
    </div>
</form>


<div class="row mt-5">
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