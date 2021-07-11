<?php
include_once('../_header.php');

function uploadPhoto($nim) {

  $namaFile = $_FILES['photo']['name'];
  $ukuranFile = $_FILES['photo']['size'];
  $error = $_FILES['photo']['error'];
  $tmpName = $_FILES['photo']['tmp_name'];

  // apakah ada gambar yang diupload
  if ( $error === 4) {
    echo "<script>alert('Anda belum memasukkan photo');</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $extensiValid = ['jpg', 'jpeg', 'png'];
  $format = pathinfo($namaFile, PATHINFO_EXTENSION);

  if ( !in_array($format, $extensiValid) ) {
    echo "<script>alert('Format file gambar tidak sesuai.');</script>";
    return false;
  }

  // cek ukuran gambar
  if ($ukuranFile > 2000000) {
    echo "<script>alert('ukuran gambar terlalu besar.');</script>";
    return false;
  }

  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  $namaFileBaru = $nim;
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // lolos pengecekan
  move_uploaded_file($tmpName, '../_assets/images/'.$namaFileBaru);

  return $namaFileBaru;
}

if (isset($_POST['edit'])) {
  $alamat_skrg = trim(mysqli_real_escape_string($con , $_POST['alamat_skrg']));
  $hp_skrg = trim(mysqli_real_escape_string($con , $_POST['hp_skrg']));
  $npwp = trim(mysqli_real_escape_string($con , $_POST['npwp']));
  $statusMarital = trim(mysqli_real_escape_string($con , $_POST['statusMarital']));
  $kompetensi = trim(mysqli_real_escape_string($con , $_POST['kompetensi']));
  $tentangAlumni = trim(mysqli_real_escape_string($con , $_POST['tentangAlumni']));

  $photo = uploadPhoto($_POST['nim']);

  if (!$photo) {
    echo "<script>alert('gagal upload gambar');</script>";
  } else {
    $query = "UPDATE alumni SET 
    alamat_skrg = '$alamat_skrg', 
    hp_skrg = '$hp_skrg',
    statusMarital = '$statusMarital',
    photo = '$photo',
    kompetensi = '$kompetensi',
    tentangAlumni = '$tentangAlumni'
    WHERE nim = $nim";
    mysqli_query($con, $query) or die(mysqli_error($con));

    echo "<script>alert('Data berhasil diubah');</script>";
    echo "<script>window.location='".base_url_alumni('profil')."';</script>";
  }
}

?>
<h1>Edit Profil</h1>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="mt-3">
    <div class="form-group">
      <label for="alamat_skrg">Alamat Sekarang</label>
      <input type="text" id="alamat_skrg" name="alamat_skrg" class="form-control" required value="<?= $data['alamat_skrg'] ?>">
    </div>
    <div class="form-group">
    <label for="hp_skrg">Nomor Handphone</label>
    <input type="text" id="hp_skrg" name="hp_skrg" class="form-control" required value="<?= $data['hp_skrg'] ?>">
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Status Marital</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input type="radio" id="kawin" name="statusMarital" class="form-check-input" value="Kawin" <?= $data['statusMarital'] == "Kawin" ? "checked" : null ?>>
            <label for="kawin" class="form-check-label">Kawin</label>
          </div>
          <div class="form-check">
            <input type="radio" id="belumKawin" name="statusMarital" class="form-check-input" value="Belum Kawin" <?= $data['statusMarital'] == "Belum Kawin" ? "checked" : null ?>>
            <label for="belumKawin" class="form-check-label">Belum Kawin</label>
          </div>
        </div>
      </div>
    </fieldset>
    <div class="form-group">
      <label for="kompetensi">Kompetensi</label>
      <textarea name="kompetensi" id="kompetensi" class="form-control" cols="30" rows="5" required><?= $data['kompetensi'] ?></textarea>
    </div>
    <div class="form-group">
      <label for="tentangAlumni">Tentang Diri</label>
      <textarea name="tentangAlumni" id="tentangAlumni" class="form-control" cols="30" rows="5" required><?= $data['tentangAlumni'] ?></textarea>
    </div>
    <div class="form-group">
      <label for="photo">Photo</label>
      <input type="file" id="photo" class="form-control-file" name="photo">
    </div>
    <div class="form-group">
      <button type="submit" name="edit" id="editButton" class="btn btn-edit">Ubah</button>
    </div>
  </form>

<?php include_once('../_footer.php'); ?>