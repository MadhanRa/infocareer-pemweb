<?php  
include_once('../_header.php');

$idPerush = $data['idPerush'];
$sql_syarat = mysqli_query($con, "SELECT * FROM syarat_lamar");
$sql_lowongan_id = mysqli_query($con, "SELECT COUNT(idLowongan) as 'ids' FROM perusahaan_lowongan WHERE idPerush = $idPerush");
$ids = mysqli_fetch_assoc($sql_lowongan_id);
$newId = 1 + $ids['ids'];

?>
<h1>Tambah Lowongan</h1>
<form action="proses.php" method="post" enctype="multipart/form-data" class="my-5" autocomplete="off">
  <input type="hidden" name="idPerush" value="<?= $idPerush ?>">
  <input type="hidden" name="idLowongan" value="<?= $newId ?>">
  <div class="form-group">
    <label for="judul">Judul Lowongan</label>
    <input type="text" class="form-control" id="judul" name="judul" required >
  </div>
  <div class="form-row form-group">
    <div class="col-md-6">
      <label for="lowongan">Jumlah Lowongan</label>
      <input type="text" class="form-control" id="lowongan" name="lowongan" required >
    </div>
    <div class="col-md-6">
      <label for="batasLowongan">Batas Lowongan</label>
      <input type="date" id="batasLowongan" name="batasLowongan" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi Lowongan</label>
    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="3" style="height: auto!important;" required ></textarea>
  </div>
  <div class="form-group">
    <label for="pesan">Pesan ke pelamar</label>
    <textarea type="text" class="form-control" id="pesan" name="pesan" rows="3" style="height: auto!important;" required ></textarea>
  </div>
  <div class="form-group">
    <label for="rangeSal">Range Salary</label>
    <input type="text" class="form-control" id="rangeSal" name="rangeSal" required >
  </div>
  <div class="form-group">
    <label for="gambar">Gambar Lowongan</label>
    <input type="file" id="gambar" name="gambar" class="form-control-file" >
  </div>
  <h5 class="mt-5">Syarat</h5>
  <?php while ($requirements = mysqli_fetch_assoc($sql_syarat)) {?>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="<?= $requirements['id'] ?>" name="syarat[]">
      <label class="form-check-label" for="syarat">
        <?= $requirements['syarat'] ?>
    </label>
    </div>
  <?php  
  }
  ?>
  <div class="form-group">
    <a href="<?= base_url_perus('home') ?>" class="btn btn-secondary-themed mb-3 mt-5 text-center">Batal</a>
    <button type="submit" class="btn btn-primary-themed mb-3 ml-5 mt-5" name="add">Tambah Lowongan</button>
  </div>
</form>
<?php  
include_once('../_footer.php');
?>