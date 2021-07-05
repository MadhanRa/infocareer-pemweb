<style>
.martop{
  margin-top: -1rem;
}
.marle{
  margin-right: 5rem;
}
.mar-top p{
  margin-top: -0.5rem;
}
.mc p{
  width: 100%;
}
.flex-auto{
  flex :1 1 auto;
}
.btn-edit{
  font-size: 12px;
}
</style>
<?php 
include_once('../_header.php');

$nim = $_SESSION['nim'];
$sql_alumni = mysqli_query($con, "SELECT * FROM alumni WHERE nim = $nim") or die(mysqli_error($con));
$data = mysqli_fetch_assoc($sql_alumni);

?>
<div class="row m-text justify-content-end">
  <div class="col-sm">
  
  </div>
  <div class="col-sm martop">
    <h1 class="text-center">Profil Alumni</h1>
      <div class="img bg-wrap text-center py-4" style="background-image: url(<?= base_url('_assets/images/bg_1.jpg') ?>);">
        <div class="user-logo">
          <div class="img" style="background-image: url(<?= base_url('_assets/images/'.$data['photo']) ?>);"></div>
          <h3><?= $data['nama'] ?></h3>
        </div>
      </div>
    <div class="text-center py-4 mar-top martop">
      <a class="btn-edit" href="<?=base_url('profil/edit.php')?>">(Edit Profil)</a>
      <p><?= $data['tentangAlumni'] ?></p>
      <p>Email : <?= $data['email'] ?></p>
    </div>
  </div>
  <div class="col-sm mar-top marle text-right">
    <h5>Nilai Akademik</h5>
    <p>IPK : <?= $data['ipk'] ?></p>
    
    <h5>Kompetensi</h5>
    <p><?= $data['kompetensi'] ?></p>
  </div>
</div>

<div class="row">
  <div class="col m-text d-flex">
    <div class="flex-auto"></div>
    <div class="d-flex flex-column align-items-center mc">
      <p>Nama : <?= $data['nama'] ?></p>
      <p>Jenis Kelamin : <?= $data['jenkel'] ?></p>
      <p>Tempat Lahir : <?= $data['tmpLahir'] ?></p>
      <p>Tanggal Lahir : <?= conv_date($data['tglLahir']) ?></p>
      <p>Warga Negara : <?= $data['hp_skrg'] ?></p>
    </div>
    <div class="flex-auto"></div>
  </div>
  <div class="col m-text d-flex">
    <div class="flex-auto"></div>
    <div class="d-flex flex-column align-items-center mc">
      <p>No. Identitas : <?= $data['no_id'] ?></p>
      <p>No. NPWP : <?= $data['npwp'] ?></p>
      <p>Status : <?= $data['statusMarital'] ?></p>
      <p>Alamat : <?= $data['alamat_skrg'] ?></p>
      <p>No. Hp : <?= $data['hp_skrg'] ?></p>
    </div>
    <div class="flex-auto"></div>
  </div>
</div>

<?php include_once('../_footer.php'); ?>