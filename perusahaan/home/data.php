<?php 

include_once('../_header.php');

$idPerush = $data['idPerush'];
$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE l.hapus = 0 AND l.idPerush = $idPerush ORDER BY id DESC") or die (mysqli_error($con));

if ( isset($_POST['search']) ) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 AND l.idPerush = $idPerush AND l.judul LIKE '%$keyword%' ORDER BY id DESC") or die (mysqli_error($con));
}

?>

<h1>Daftar Lowongan</h1>
<div class="row mt-4">
  <div class="col-md-8">
    <form action="" method="post" class="form-inline">
      <div class="form-group">
        <input type="text" name="keyword" placeholder="Cari lowongan" class="form-control search-input" required>
      </div>
      <button type="submit" name="search" id="searchButton" class="btn btn-primary ml-4"><span class="fa fa-search"></span></button>
    </form>
  </div>
  <div class="col-md-4">
    <div class="pull-right">
      <a href="<?= base_url('home/tambah.php') ?>" class="btn btn-primary-themed"><span class="fa fa-plus mr-2"></span>Tambah Lowongan</a>
    </div>
  </div>
</div>

<div class="row mt-5">
  
<?php while($data = mysqli_fetch_assoc($sql_lowongan)) {?>

<div class="col-md-4">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-xl-auto">
        <img src="<?= base_url('_assets/images/placeholder_lowongan.png') ?>" alt="...">
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