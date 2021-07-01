<?php  
include_once('../_header.php');

$idPerush = $data['idPerush'];
$sql_syarat = mysqli_query($con, "SELECT * FROM syarat_lamar");
$sql_lowongan_id = mysqli_query($con, "SELECT COUNT(idLowongan) as 'ids' FROM perusahaan_lowongan WHERE idPerush = $idPerush");
$ids = mysqli_fetch_assoc($sql_lowongan_id);
$newId = 1 + $ids['ids'];
if (isset($_POST['add'])) {
  $judul = trim(mysqli_real_escape_string($con , $_POST['judul']));
  $jumlah_lowongan = trim(mysqli_real_escape_string($con , $_POST['lowongan']));
  $deskripsi = trim(mysqli_real_escape_string($con , $_POST['deskripsi']));
  $pesan = trim(mysqli_real_escape_string($con , $_POST['pesan']));
  $batasLowongan = trim(mysqli_real_escape_string($con , $_POST['batasLowongan']));
  $rangeSal = trim(mysqli_real_escape_string($con , $_POST['rangeSal']));
  
  $query = "INSERT INTO perusahaan_lowongan (`id`, `idPerush`, `idLowongan`, `tglMasuk`, `batasLowongan`, `judul`, `lowongan`, `deskripsi`, `hapus`, `pesan_ke_pelamar`, `dilihat`, `range_salary`) VALUES (NULL, '$idPerush', '$newId', CURRENT_DATE, '$batasLowongan', '$judul', '$jumlah_lowongan', '$deskripsi', 0, '$pesan', 0, '$rangeSal')";
  mysqli_query($con, $query) or die(mysqli_error($con));

  foreach($_POST['syarat'] as $syarat) {
    mysqli_query($con, "INSERT INTO perusahaan_lowongan_syarat (`idPerush`, `idLowongan`, `idSyarat`) VALUES ('$idPerush', $newId, '$syarat')");
  }
  echo "<script>alert('Data berhasil ditambah');</script>";
  echo "<script>window.location='".base_url()."';</script>";
}

?>
<h1>Tambah Lowongan</h1>
<form action="" method="post" class="my-5">
<input type="hidden" name="idLowongan" value="<?= $newId ?>">
  <div class="form-group">
    <label for="judul">Judul Lowongan</label>
    <input type="text" class="form-control" id="judul" name="judul" required >
  </div>
  <div class="form-row">
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
    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required ></textarea>
  </div>
  <div class="form-group">
    <label for="pesan">Pesan ke pelamar</label>
    <textarea type="text" class="form-control" id="pesan" name="pesan" required ></textarea>
  </div>
  <div class="form-group">
    <label for="rangeSal">Range Salary</label>
    <input type="text" class="form-control" id="rangeSal" name="rangeSal" required >
  </div>
  <h5>Syarat</h5>
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
  <button type="submit" class="btn btn-primary mb-3 mt-5" name="add">Tambah Lowongan</button>
</form>
<?php  
include_once('../_footer.php');
?>