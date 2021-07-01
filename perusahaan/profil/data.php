<?php 
include_once('../_header.php');

$nim = $_SESSION['emailPerush'];
$sql_alumni = mysqli_query($con, "SELECT * FROM perusahaan WHERE nim = $nim") or die(mysqli_error($con));
$data = mysqli_fetch_assoc($sql_alumni);

?>

<h1>Profil Alumni</h1>
<h3><?= $data['nama'] ?></h3>

<h5>Biodata</h5>
<p>No. Identitas : <?= $data['no_id'] ?></p>
<p>No. NPWP : <?= $data['npwp'] ?></p>
<p>Nama : <?= $data['nama'] ?></p>
<p>Jenis Kelamin : <?= $data['jenkel'] ?></p>
<p>Tempat Lahir : <?= $data['tmpLahir'] ?></p>
<p>Tanggal Lahir : <?= conv_date($data['tglLahir']) ?></p>
<p>Warga Negara : <?= $data['hp_skrg'] ?></p>
<p>Status : <?= $data['statusMarital'] ?></p>
<p>Alamat : <?= $data['alamat_skrg'] ?></p>
<p>No. Hp : <?= $data['hp_skrg'] ?></p>
<p>Email : <?= $data['email'] ?></p>

<h5>Kompetensi</h5>
<p><?= $data['kompetensi'] ?></p>

<h5>Nilai Akademik</h5>
<p>IPK : <?= $data['ipk'] ?></p>

<h5>Tentang Alumni</h5>
<p><?= $data['tentangAlumni'] ?></p>
<a href="<?=base_url('profil/edit.php')?>">Edit Profil</a>
<?php include_once('../_footer.php'); ?>