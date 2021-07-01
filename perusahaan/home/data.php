<?php 

include_once('../_header.php');

$idPerush = $data['idPerush'];
$sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, l.deskripsi, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE l.hapus = 0 AND l.idPerush = $idPerush ORDER BY id DESC") or die (mysqli_error($con));

if ( isset($_POST['search']) ) {
  $keyword = $_POST['keyword'];
  $sql_lowongan = mysqli_query($con, "SELECT l.id, l.judul, l.lowongan, l.batasLowongan, l.range_salary, p.namaPerush FROM perusahaan_lowongan AS l JOIN perusahaan AS p ON l.idPerush = p.idPerush WHERE hapus = 0 AND l.judul LIKE '%$keyword%' ORDER BY id DESC") or die (mysqli_error($con));
}

?>

<h1>Daftar Lowongan</h1>
<div class="row">
  <div class="col">
    <form action="" method="post" class="form-inline">
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="keyword" placeholder="Cari lowongan" class="form-control">
      </div>
      <button type="submit" name="search" id="searchButton" class="btn btn-primary mb-2"><span class="fa fa-search"></span></button>
    </form>
  </div>
  <div class="col">
    <div class="pull-right">
      <a href="<?= base_url('home/tambah.php') ?>" class="btn btn-success"><span class="fa fa-plus mr-2"></span>Tambah Lowongan</a>
    </div>
  </div>
</div>

<div class="row row-cols-3 mt-5">
  
<?php while($data = mysqli_fetch_assoc($sql_lowongan)) {?>

<div class="col">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-6">
        <img src="<?= base_url('_assets/images/placeholder_lowongan.png') ?>" alt="...">
      </div>
      <div class="col-md-5">
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