<?php 
include_once('../_header.php');

$idPerush = $data['idPerush'];
$id = @$_GET['id'];
$sql_info_lowongan = mysqli_query($con, "SELECT l.idLowongan, l.judul, l.judul, l.tglMasuk, l.batasLowongan, l.lowongan, l.deskripsi, l.pesan_ke_pelamar, GROUP_CONCAT(s.syarat SEPARATOR ';') as 'requirements'
FROM perusahaan_lowongan AS l
INNER JOIN application AS a ON a.idPerush = l.idPerush AND a.idLowongan = l.idLowongan
INNER JOIN perusahaan_lowongan_syarat AS ps ON a.idPerush = ps.idPerush AND a.idLowongan = ps.idLowongan
INNER JOIN syarat_lamar AS s ON ps.idSyarat = s.id 
WHERE l.id = $id");

$detail_low = mysqli_fetch_assoc($sql_info_lowongan);
$requirements = explode(";", $detail_low['requirements']);
$idLowongan = $detail_low['idLowongan'];

$sql_antrean= mysqli_query($con, "SELECT p.nama, a.idAPP, a.nim, a.idPerush, a.idLowongan, a.tgl_apply, a.confirm, a.accept, a.file_lampiran
FROM application AS a
INNER JOIN alumni AS p ON a.nim = p.nim
INNER JOIN perusahaan_lowongan AS l ON a.idLowongan = l.idLowongan AND a.idPerush = l.idPerush
WHERE a.idLowongan = $idLowongan AND a.idPerush = $idPerush ORDER BY a.idAPP DESC") or die(mysqli_error($con));


?>

<h1>Detail Lowongan</h1>
<div class="row mt-5 justify-content-center">
  <div class="col-12">
    <div class="mx-5 text-center">
      <h3 class="mb-3"><?= $detail_low['judul'] ?></h3>
      <p class="mb-1">Tgl. Buka <b><?= conv_date($detail_low['tglMasuk']) ?></b></p>
      <p class="mb-1">Tgl. Tutup <b><?= conv_date($detail_low['batasLowongan']) ?></b></p>
      <p class="mb-1">Dibutuhkan <?= $detail_low['lowongan'] ?> orang</p>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="mx-3">
        <h5>Deskripsi</h5>
        <p><?= $detail_low['deskripsi'] ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="mx-3">
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
  </div>
</div>

<div class="table-responsive mt-3">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tgl Daftar</th>
        <th scope="col">File Lampiran</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i = 1;
      while($data = mysqli_fetch_assoc($sql_antrean)):
      ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= $data['nama'] ?></td>
        <td><?= conv_date($data['tgl_apply']) ?></td>
        <td><a href="download.php?file=<?= $data['file_lampiran'] ?>">Download</a></td>
        <td>
          <form action="proses.php" method="post">
            <input type="hidden" name="idAPP" value="<?= $data['idAPP'] ?>">
            <button type="submit" name="confirm" id="confirmButton" class="btn <?= ($data['confirm']== 0)? "btn-secondary": "btn-primary"?>" <?= ($data['confirm']== 0)? '': 'disabled' ?>>Konfirmasi</button>
            <button 
              type="submit" 
              name="accept" 
              id="acceptButton"
              class="btn <?= ($data['confirm']== 0)? "btn-secondary": "btn-primary"?>" 
              <?= ($data['confirm']==0 OR $data['accept']==1)? 'disabled': '' ?>>
              Terima
            </button> 
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>



<?php include_once('../_footer.php'); ?>