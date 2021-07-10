<?php
include_once('../_header.php');

$idPerush = $data['idPerush'];

if (isset($_POST['edit'])) {
  $namaCp = trim(mysqli_real_escape_string($con , $_POST['namaCp']));
  $telpCp = trim(mysqli_real_escape_string($con , $_POST['telpCp']));
  $produk = trim(mysqli_real_escape_string($con , $_POST['produk']));
  $alamatPerush = trim(mysqli_real_escape_string($con , $_POST['alamatPerush']));
  $telpFaxPerush = trim(mysqli_real_escape_string($con , $_POST['telpFaxPerush']));
  $tentangPerush = trim(mysqli_real_escape_string($con , $_POST['tentangPerush']));

  $query = "UPDATE `perusahaan` SET `produk`='$produk',`alamatPerush`='$alamatPerush',`telpFaxPerush`='$telpFaxPerush',`namaCp`='$namaCp',`telpCp`='$telpCp',`tentangPerush`='$tentangPerush' WHERE idPerush = $idPerush";

  mysqli_query($con, $query) or die(mysqli_error($con));

  echo "<script>alert('Data berhasil diedit');</script>";
  echo "<script>window.location='".base_url('profil')."';</script>";
}
?>
<h1>Edit Profil</h1>
<form action="" method="post" autocomplete="off">
    <div class="form-row">
      <div class="col">
        <label for="namaCp">Nama Cp</label>
        <input type="text" id="namaCp" name="namaCp" class="form-control" placeholder="Nama Contact Person" value="<?= $data['namaCp'] ?>" required>
      </div>
      <div class="col">
        <label for="telpCp">Telp Cp</label>
        <input type="text" id="telpCp" name="telpCp" class="form-control" placeholder="Telp Contact Person" value="<?= $data['telpCp'] ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label for="produk">Produk</label>
      <input type="text" id="produk" name="produk" class="form-control" placeholder="Produk Perusahaan" value="<?= $data['produk'] ?>" required>
    </div>
    <div class="form-group">
      <label for="alamatPerush">Alamat Perusahaan</label>
      <input type="text" id="alamatPerush" name="alamatPerush" class="form-control" placeholder="Alamat Perusahaan" value="<?= $data['alamatPerush'] ?>" required>
    </div>
    <div class="form-group">
      <label for="telpFaxPerush">Telp/fax Perusahaan</label>
      <input type="text" id="telpFaxPerush" name="telpFaxPerush" class="form-control" placeholder="Telp/Fax Perusahaan" value="<?= $data['telpFaxPerush'] ?>" required>
    </div>
    <div class="form-group">
      <label for="tentangPerush">Tentang Perusahaan</label>
      <textarea name="tentangPerush" id="tentangPerush" rows="4" class="form-control" placeholder="Tentang Perusahaan" style="height: auto!important;" required><?= $data['tentangPerush'] ?></textarea>
    </div>
    <div class="form-group">
      <button type="submit" name="edit" id="registerButton" class="btn btn-primary-themed">Edit</button>
      <a href="<?= base_url('profil') ?>" class="btn btn-secondary-themed mb-3 ml-5 mt-3">Batal</a>
    </div>
  </form>

<?php include_once('../_footer.php'); ?>