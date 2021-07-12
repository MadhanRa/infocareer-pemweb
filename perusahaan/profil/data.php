<?php 
include_once('../_header.php');

?>

<div class="row m-text justify-content-end">
  <div class="col-6 martop mx-auto">
    <div class="img bg-wrap text-center pt-4 mt-4">
      <div class="user-logo">
        <img src="<?= base_url_image('perus_profile/'.$data['logo_perus']) ?>" alt="user image" class="img">
      </div>
    </div>
    <div class="text-center mar-top">
      <h4 class="title-perush"><?= $data['namaPerush'] ?></h4>
      <p><?= $data['tentangPerush'] ?></p>
    </div>
  </div>
</div>

<div class="my-4">
<h5>Informasi Perusahaan</h5>
<p>Produk : <?= $data['produk'] ?></p>
<p>Nama CP : <?= $data['namaCp'] ?></p>
<p>Telp CP : <?= $data['telpCp'] ?></p>
<p>Alamat : <?= $data['alamatPerush'] ?></p>
<p>Telp/Fax : <?= $data['telpFaxPerush'] ?></p>
<p>Email : <?= $data['emailPerush'] ?></p>


<a href="edit.php" class="btn btn-primary-themed">Edit Profil</a>
<?php include_once('../_footer.php'); ?>