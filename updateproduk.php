<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="stok_barang";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);


//logic update data
if(isset($_POST['update_produk'])){
  //menangkap data dari inputan
  $nama_barang = $_POST['nama_barang'];
  $jumlah_barang = $_POST['jumlah_barang'];
  $harga = $_POST['harga'];
  $id = $_POST['id'];
//perintah sql update
  $update = "UPDATE barang SET
  nama_barang='$nama_barang',
  jumlah_barang='$jumlah_barang',
  harga='$harga'

  WHERE id='$id'";

  $cek = mysqli_query($conn,$update);

  header ('location: produk.php');
}






//event tombol tambah pabrik
if(isset($_POST['tambah_pabrik'])){
  //menangkap data dari inputan
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $contact = $_POST['contact'];

  //perintah msql menambah data
  $sql = "INSERT INTO pabrik (nama_pabrik, alamat_pabrik, contact)
   VALUES ('$nama', '$alamat', '$contact')";
  
  //perintah terakhir
  $cek = mysqli_query($conn,$sql);
  //pemberitahuan berhasil
  if($cek){
    echo 'data berhasil ditambah';
  }
  else{
    'data gagal';
  }
 
}


//
if(isset($_POST['update'])){



  $data = "SELECT * FROM barang WHERE id=".$_POST['id'];
$hasil = mysqli_query($conn,$data);
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

<h4 class="text-center">Update Data Pabrik</h4>

<div class="d-flex justify-content-center">

<?php while($dta = mysqli_fetch_assoc($hasil)) { ?>
<form action="" method="post">
  <label for="fname">Nama Produk</label><br>
  <input type="text"  name="nama_barang" value=<?php echo $dta['nama_barang'] ?> >   <br>
  
  <label for="lname">Jumlah</label><br>
  <input type="text" name="jumlah_barang" value=<?php echo $dta['jumlah_barang'] ?> ><br>
  
  <label for="fname">Harga</label><br>
  <input type="text" name="harga" value=<?php echo $dta['harga'] ?> ><br><br>
  
  <input type="submit" value="Update Data" name="update_produk">
  <input type="hidden" name="id" value=<?php echo $dta['id']?>>
</form>

<?php }?>
</div>





</body>
</html> 

