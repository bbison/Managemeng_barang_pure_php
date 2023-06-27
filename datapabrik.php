<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="stok_barang";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);



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

//perintah hapus
if(isset($_POST['hapus'])){
  $hapus = "DELETE FROM pabrik WHERE id=".$_POST['id'];
  //hapus
  $cek = mysqli_query($conn,$hapus);
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

<h1>Data Pabrik</h1>

<table class="table">
    <tr bgcolor="#7FFFD4">
        <th>ID</th>
        <th>Nama Pabrik</th>
        <th>Alamat</th>
        <th>Contact</th>
        <th>Action</th>
    </tr>

    <?php

    $ambildata = 'SELECT * FROM pabrik';
    $hasil = mysqli_query($conn, $ambildata);

    foreach($hasil as $data){
        echo '<tr>';
            echo '<td>'. $data['id'].'</td>';
            echo '<td>'. $data['nama_pabrik'].'</td>';
            echo '<td>'. $data['alamat_pabrik'].'</td>';
            echo '<td>'. $data['contact'].'</td>';
            echo '<td>            
                    <form action="" method="post" class="d-inline">
                    <input type="hidden" name="id" id="" value="'.$data['id'].'">
                    <input class="btn btn-danger" type="submit" name="hapus" id="" value="HAPUS">
                    </form>

                    <form class="d-inline" action="/management_barang/update.php" method="post">
                    <input type="hidden" name="id" id="" value="'.$data['id'].'">
                    <input class="btn btn-success" type="submit" name="update" id="" value="UPDATE">
                    </form>
                  
                    </td>';

        echo '</tr>';
    }
    ?>
</table>




</body>
</html> 

