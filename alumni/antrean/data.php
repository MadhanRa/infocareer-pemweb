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
$nim = $_SESSION['nim'];
$sql_lowongan = mysqli_query($con, "SELECT a.idApp, l.judul, l.batasLowongan,  a.tgl_apply, a.confirm, a.accept, a.tgl_confirm, a.tgl_accept, p.namaPerush FROM application AS a INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush INNER JOIN perusahaan AS p ON a.idPerush = p.idPerush WHERE nim = $nim ORDER BY a.idApp DESC") or die (mysqli_error($con));
?>

<h1>Konfirmasi Lowongan</h1>
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
      <div class="card-body m-text">
        <div class="card-header text-center"><?= $data['namaPerush'] ?></div>
        <h5 class="card-title"><?= $data['judul'] ?></h5>
        <p class="card-text">Dibuka sampai <?= conv_date($data['batasLowongan']) ?></p>
        <p class="card-text">Tanggal Apply<?= conv_date($data['tgl_apply']) ?></p>
        <p class="card-text">Status Konfirmasi: <?= $data['confirm'] == 0 ? "Menunggu Konfirmasi" : "Telah Dikonfirmasi"?></p>
        <p class="card-text">Status Terima: <?= $data['accept'] == 0 ? "Belum diterima" : "Diterima" ?></p>
        <a href="detail.php?id=<?= $data['idApp'] ?>" class="btn btn-primary">Read More...</a>
      </div>
    </div>
  </div>


  <?php
  }
  ?>
</div>
<?php include_once('../_footer.php'); ?>