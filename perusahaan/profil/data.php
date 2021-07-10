<?php 
include_once('../_header.php');

?>

<h3 class="title-perush text-center"><?= $data['namaPerush'] ?></h3>

<div class="my-4">
<h5>Informasi Perusahaan</h5>
<p>Produk : <?= $data['produk'] ?></p>
<p>Nama CP : <?= $data['namaCp'] ?></p>
<p>Telp CP : <?= $data['telpCp'] ?></p>
<p>Alamat : <?= $data['alamatPerush'] ?></p>
<p>Telp/Fax : <?= $data['telpFaxPerush'] ?></p>
<p>Email : <?= $data['emailPerush'] ?></p>

<h5>Tentang Perusahaan</h5>
<p><?= $data['tentangPerush'] ?></p>
</div>

<a href="<?=base_url('profil/edit.php')?>" class="btn btn-primary-themed">Edit Profil</a>
<?php include_once('../_footer.php'); ?>