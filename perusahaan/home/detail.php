<?php 
include_once('../_header.php'); 

$id = @$_GET['id'];
$sql_detail_lowongan = mysqli_query($con, "SELECT l.idLowongan, l.idPerush, l.judul, l.tglMasuk, l.batasLowongan, l.lowongan, l.deskripsi, l.pesan_ke_pelamar, l.range_salary, l.gambar_lowongan, GROUP_CONCAT(s.syarat SEPARATOR ';') as 'requirements'
FROM perusahaan_lowongan AS l 
INNER JOIN perusahaan AS p ON l.idPerush = p.idPerush
INNER JOIN perusahaan_lowongan_syarat ON p.idPerush = perusahaan_lowongan_syarat.idPerush AND l.idLowongan = perusahaan_lowongan_syarat.idLowongan
INNER JOIN syarat_lamar AS s ON perusahaan_lowongan_syarat.idSyarat = s.id 
WHERE l.id = $id") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_detail_lowongan);
$requirements = explode(";", $data['requirements']);

if (isset($_POST['delete'])) {
  mysqli_query($con, "UPDATE perusahaan_lowongan SET hapus=1 WHERE id='$id'");
  echo "<script>window.location='".base_url_perus('home')."';</script>";
}
?>

<div class="row">
  <div class="col-md-auto">
    <img class="img-detail" src="<?= base_url_image('lowongan/'.$data['gambar_lowongan']) ?>" alt="placeholder lowongan">
  </div>
  <div class="col">
    <h3><?= $data['judul'] ?></h3>
    <p>Tanggal Posting: <b><?= conv_date($data['tglMasuk']) ?></b></p>
    <p>Batas Lowongan: <b><?= conv_date($data['batasLowongan']) ?></b></p>
    <p>Dibutuhkan: <b><?= $data['lowongan'] ?> orang</b></p>
    <p>Gaji: <b><?= $data['range_salary']?></b></p>
    <h5>Syarat-syarat</h5>
    <ul>
    <?php 
    foreach ($requirements as $syarat){?>
    <li><?= $syarat ?></li>
    <?php
    }
    ?>
    </ul>
  </div>
</div>
<h5>Deskripsi</h5>
<p><?= $data['deskripsi'] ?></p>

<h5>Pesan ke pelamar</h5>
<p><?= $data['pesan_ke_pelamar'] ?></p>

<form action="" method="post">
  <button type="submit" name="delete" id="deleteButton" class="btn btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus lowongan?')"><span class="fa fa-trash mr-3"></span>Hapus Lowongan</button>
</form>


<?php include_once('../_footer.php'); ?>