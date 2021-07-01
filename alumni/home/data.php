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

$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 ORDER BY id DESC") or die (mysqli_error($con));

if ( isset($_POST['search']) ) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 AND l.judul LIKE '%$keyword%' ORDER BY id DESC") or die (mysqli_error($con));
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
      <img src="<?=base_url('_assets/images/search-icon.png')?>" class="btn-search" type ="submit">
    </div>
</form>


<div class="d-flex flex-wrap justify-content-center">
  <?php while($data = mysqli_fetch_assoc($sql_lowongan)) {?>
  <div class="card mr-3 mb-2" style="width: 28rem;">
  <!-- Looping -->
    <div class="card-horizontal">
      <div class="img-square-wrapper">
        <img class="" src="<?=base_url('_assets/images/hiring.png')?>" alt="">
      </div>
      <div class="card-body">
        <div class="card-header text-center"><?= $data['namaPerush'] ?></div>
        <h5 class="card-title"><?= $data['judul'] ?></h5>
        <p class="card-text">Membutuhkan <?= $data['lowongan'] ?> pekerja.</p>
        <p class="card-text">Dibuka sampai <?= conv_date($data['batasLowongan']) ?></p>
        <p class="card-text">Dengan gaji <?= $data['range_salary'] ?></p>
        <a href="detail.php?id=<?= $data['id'] ?>" class="btn btn-primary">Read More...</a>
      </div>
    </div>
  </div>


  <?php
  }
  ?>
</div>

<div class="footer text-center">
    Copyright 2021
</div>

<?php include_once('../_footer.php'); ?>