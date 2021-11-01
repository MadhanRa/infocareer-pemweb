<style>
  .body {
    background: #E5E5E5;
  }

  .judul-modal {
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 24px;
    color: #7F05A8;
  }

  .btn-lamar {
    width: 216px;
    height: 35px;
    font-family: Montserrat;
    font-style: normal !important;
    font-weight: bold !important;
    color: #E5E5E5 !important;
    line-height: 17px !important;
    background-color: #7F05A8 !important;
    border-radius: 15px !important;
  }

  .btn-modal-batal {
    width: 100px;
    height: 22px;
    font-family: Montserrat;
    font-style: normal !important;
    font-weight: bold !important;
    line-height: 3px !important;
    text-align: center !important;
    color: #7F05A8 !important;
    background-color: #FFFFFF !important;
    border: 1px solid #7F05A8 !important;
    box-sizing: border-box !important;
    border-radius: 15px !important;
  }

  .btn-modal-kirim {
    width: 100px;
    height: 22px;
    font-family: Montserrat;
    font-style: normal !important;
    font-weight: bold !important;
    line-height: 3px !important;
    text-align: center !important;
    color: #E5E5E5 !important;
    background-color: #7F05A8 !important;
    border-radius: 15px !important;
  }
</style>
<?php
include_once('../_header.php');

$id = @$_GET['id'];
$sql_detail_lowongan = mysqli_query($con, "SELECT l.idLowongan, l.idPerush, l.judul, l.tglMasuk, l.batasLowongan, l.lowongan, l.deskripsi, l.pesan_ke_pelamar,  l.range_salary, l.gambar_lowongan, p.namaPerush, p.alamatPerush, p.tentangPerush, p.emailPerush, p.telpFaxPerush, p.telpCp, p.namaCp, GROUP_CONCAT(s.syarat SEPARATOR ';') as 'requirements'
FROM perusahaan_lowongan AS l 
INNER JOIN perusahaan AS p ON l.idPerush = p.idPerush 
INNER JOIN perusahaan_lowongan_syarat ON p.idPerush = perusahaan_lowongan_syarat.idPerush AND l.idLowongan = perusahaan_lowongan_syarat.idLowongan
INNER JOIN syarat_lamar AS s ON perusahaan_lowongan_syarat.idSyarat = s.id 
WHERE l.id = $id") or die(mysqli_error($con));

$data = mysqli_fetch_assoc($sql_detail_lowongan);
$requirements = explode(";", $data['requirements']);
?>
<div class="row">
  <div class="col-md-auto">
    <!-- Logo Perusahaan -->
    <img class="img-detail" src="<?= base_url_image('lowongan/' . $data['gambar_lowongan']) ?>" onerror="this.onerror=null;this.src='<?= base_url_image('lowongan/placeholder_lowongan_big.png') ?>'" alt="placeholder lowongan">
  </div>
  <div class="col-sm">
    <!-- Judul Lowongan -->
    <h3><?= $data['judul'] ?></h3>
    <h6><?= $data['namaPerush'] ?></h6>
    <!-- Info Lowongan -->
    <div class="m-text">
      <p>Dibutuhkan <?= $data['lowongan'] ?> orang</p>
      <p>Dibuka sejak <b><?= conv_date($data['tglMasuk']) ?></b></p>
      <p>Batas Lowongan <b><?= conv_date($data['batasLowongan']) ?></b></p>
      <p>Gaji <b><?= $data['range_salary'] ?></b></p>
    </div>
    <!-- Syarat Lowongan -->
    <h5>Syarat-syarat</h5>
    <ul>
      <?php
      foreach ($requirements as $syarat) { ?>
        <li><?= $syarat ?></li>
      <?php
      }
      ?>
    </ul>
  </div>
</div>

<h5 class="mt-3">Deskripsi</h5>
<p><?= $data['deskripsi'] ?></p>
<!-- About company -->
<div class="mt-5">
  <h4>Tentang Perusahaan</h4>
  <h5><?= $data['namaPerush'] ?></h5>
  <p>Alamat</p>
  <p><?= $data['alamatPerush'] ?></p>
  <p>Tentang Perusahaan</p>
  <p><?= $data['tentangPerush'] ?></p>
  <p>Kontak Perusahaan</p>
  <p>Email: <?= $data['emailPerush'] ?></p>
  <p>Telp/Fax: <?= $data['telpFaxPerush'] ?> </p>
  <p>CP: <?= $data['telpCp'] ?> (<?= $data['namaCp'] ?>)</p>
</div>

<!-- Keterangan :  -->
<div>
  <h5>Pesan ke pelamar</h5>
  <p><?= $data['pesan_ke_pelamar'] ?></p>
</div>

<!-- Tombol lamar -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-lamar" data-toggle="modal" data-target="#exampleModalCenter">
  Lamar Pekerjaan Ini
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center judul-modal" id="exampleModalLongTitle">Daftar lamaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- Lampirkan persyaratan -->
          <div class="container">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="file_lampiran" id="file_lampiran">
              <label class="custom-file-label" for="customFile">Masukkan lampiran</label>
            </div>
            <input type="hidden" name="nim" value="<?= $_SESSION['nim'] ?>" />
            <input type="hidden" name="idLowongan" value="<?= $data['idLowongan'] ?>">
            <input type="hidden" name="idPerush" value="<?= $data['idPerush'] ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-modal-batal" data-dismiss="modal">Batal</button>
            <button type="submit" name="daftar" class="btn btn-modal-kirim">Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include_once('../_footer.php'); ?>