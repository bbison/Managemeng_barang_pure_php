<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stok_barang";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);



//event tombol tambah pabrik
if (isset($_POST['tambah_pabrik'])) {
  //menangkap data dari inputan
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $contact = $_POST['contact'];

  //perintah msql menambah data
  $sql = "INSERT INTO pabrik (nama_pabrik, alamat_pabrik, contact)
   VALUES ('$nama', '$alamat', '$contact')";

  //perintah terakhir
  $cek = mysqli_query($conn, $sql);
  //pemberitahuan berhasil
  if ($cek) {
    echo 'data berhasil ditambah';
  } else {
    'data gagal';
  }
}

?>

<!DOCTYPE html>
<html>

<head>

  <title>Management Barang</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <?php
  include 'navbar.php'
  ?>

  <h4 class="text-center">Input Data Pabrik</h4>

  <div class="d-flex justify-content-center">
    <form action="" method="post">
      <label for="fname">Nama</label><br>
      <input type="text" name="nama"><br>

      <label for="lname">ALamat</label><br>
      <input type="text" name="alamat"><br>

      <label for="fname">Contact</label><br>
      <input type="text" name="contact"><br><br>

      <input type="submit" value="Tambah Data" name="tambah_pabrik">
    </form>
  </div>





</body>

</html>