<?php
include_once('../_header.php');

$nim = $_SESSION['nim'];
$sql_alumni = mysqli_query($con, "SELECT * FROM alumni WHERE nim = $nim") or die(mysqli_error($con));
$data = mysqli_fetch_assoc($sql_alumni);

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
    echo "<script>window.location='".base_url('profil/edit.php')."';</script>";
  } else {
    $query = "UPDATE alumni SET 
    alamat_skrg = '$alamat_skrg', 
    hp_skrg = '$hp_skrg',
    npwp = '$npwp',
    statusMarital = '$statusMarital',
    photo = '$photo',
    kompetensi = '$kompetensi',
    tentangAlumni = '$tentangAlumni'
    WHERE nim = $nim";
    mysqli_query($con, $query) or die(mysqli_error($con));

    echo "<script>alert('Data berhasil diubah');</script>";
    echo "<script>window.location='".base_url('profil')."';</script>";
  }
}

?>
<h1>Edit Profil</h1>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <label for="alamat_skrg">Alamat Sekarang</label><br>
    <input type="text" id="alamat_skrg" name="alamat_skrg" required value="<?= $data['alamat_skrg'] ?>"><br>

    <label for="hp_skrg">Nomor Handphone</label><br>
    <input type="text" id="hp_skrg" name="hp_skrg" required value="<?= $data['hp_skrg'] ?>"><br>

    <label for="npwp">NPWP</label><br>
    <input type="text" id="npwp" name="npwp" required value="<?= $data['npwp'] ?>"><br>

    <label for="statusMarital">Status Marital</label><br>
    <input type="radio" id="kawin" name="statusMarital" value="Kawin" <?= $data['statusMarital'] == "Kawin" ? "checked" : null ?>>
    <label for="kawin">Kawin</label><br>
    <input type="radio" id="belumKawin" name="statusMarital" value="Belum Kawin" <?= $data['statusMarital'] == "Belum Kawin" ? "checked" : null ?>>
    <label for="belumKawin">Belum Kawin</label><br>

    <label for="kompetensi">Kompetensi</label><br>
    <textarea name="kompetensi" id="kompetensi" cols="30" rows="5" required><?= $data['kompetensi'] ?></textarea><br>

    <label for="tentangAlumni">Tentang Diri</label><br>
    <textarea name="tentangAlumni" id="tentangAlumni" cols="30" rows="5" required><?= $data['tentangAlumni'] ?></textarea><br>

    <label for="photo">Photo</label><br>
    <input type="file" id="photo" name="photo"><br>
    
    <button type="submit" name="edit" id="editButton">Ubah</button>
  </form>

<?php include_once('../_footer.php'); ?>