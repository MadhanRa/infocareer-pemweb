<?php 
include_once('../_header.php');
?>
<div class="row m-text justify-content-end">
  <div class="col-6 martop mx-auto">
    <div class="img bg-wrap text-center pt-4 mt-4">
      <div class="user-logo">
        <img src="<?= base_url_image('alumni_profile/'.$data['photo']) ?>" alt="user image" class="img">
      </div>
    </div>
    <div class="text-center mar-top">
      <h4><?= $data['nama'] ?></h4>
      <p><?= $data['tentangAlumni'] ?></p>
      <p><i><?= $data['email'] ?></i></p>
    </div>
  </div>
</div>

<div class="row mt-5 mx-auto biodata_profile">
  <div class="col-md">
      <h6>Nomor Identitas</h6>
      <p><?= $data['no_id'] ?></p>
      <h6>Tempat Tanggal Lahir</h6>
      <p><?= $data['tmpLahir']. ", " .conv_date($data['tglLahir']) ?></p>
      <h6>Jenis Kelamin</h6>
      <p><?= ($data['jenkel'] === "L")? "Laki-laki" : "Perempuan"; ?></p>
      <h6>Alamat</h6>
      <p><?= $data['alamat_skrg'] ?></p>
      <h6>Status Perkawinan</h6>
      <p><?= $data['statusMarital'] ?></p>
      <h6>Kewarganegaraan</h6>
      <p><?= $data['wn'] ?></p>
      <h6>Nomor Handphone</h6>
      <p><?= $data['hp_skrg'] ?></p>
  </div>
  <div class="col-md">
      <h6>Nomor NPWP</h6>
      <p><?= $data['npwp'] ?></p>
      <h6>Nilai Akademik</h6>
      <p>IPK : <?= $data['ipk'] ?></p>
      <h6>Kompetensi</h6>
      <p><?= $data['kompetensi'] ?></p>
  </div>
  <div class="col-12 text-center">
    <a class="btn btn-edit" href="<?=base_url_alumni('profil/edit.php')?>">Edit Profil</a>
  </div>
</div>

<?php include_once('../_footer.php'); ?>