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
if(isset($_POST['tambah_produk'])){
  // tangkap data
  $produk = $_POST['nama_produk'];
  $pabrik_id = $_POST['pabrik_id'];
  $stock = $_POST['stock'];
  $harga = $_POST['harga'];

  //masukkan ke data base
  $sql = "INSERT INTO barang (nama_barang, jumlah_barang, pabrik_id, harga)
  VALUES ('$produk', '$stock', '$pabrik_id', '$harga')";

  //perintah terakhir
  $cek = mysqli_query($conn,$sql);
}

if(isset($_POST['hapus'])){
  $hapus = "DELETE FROM barang WHERE id=".$_POST['id'];
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

  <div class="d-flex justify-content-center">
    <div class="col-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Produk
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Produk</label>
                  <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <select class="form-select" name="pabrik_id" aria-label="Default select example">
                    <option selected>Pilih Pabrik</option>
                   
                    <?php
                      $ambildata = 'SELECT * FROM pabrik';
                      $hasil = mysqli_query($conn, $ambildata);
                      foreach($hasil as $data){
                        echo ' <option value="'.$data['id'].'">'.$data['nama_pabrik'].'</option>';
                      }
                      ?>

                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Harga</label>
                  <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Stock</label>
                  <input type="text" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="tambah_produk" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <h1>Data Pabrik</h1>

<table class="table">
    <tr >
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Action</th>
    </tr>

    <?php

    $ambildata = 'SELECT * FROM barang';
    $hasil = mysqli_query($conn, $ambildata);
                
    foreach($hasil as $data){
        echo '<tr>';
            echo '<td>'. $data['id'].'</td>';
            echo '<td>'. $data['nama_barang'].'</td>';
            echo '<td>'. $data['jumlah_barang'].'</td>';
            echo '<td>'. $data['harga'].'</td>';
            echo '<td>            
                    <form action="" method="post" class="d-inline">
                    <input type="hidden" name="id" id="" value="'.$data['id'].'">
                    <input class="btn btn-danger" type="submit" name="hapus" id="" value="HAPUS">
                    </form>

                    <form class="d-inline" action="/management_barang/updateproduk.php" method="post">
                    <input type="hidden" name="id" id="" value="'.$data['id'].'">
                    <input class="btn btn-success" type="submit" name="update" id="" value="UPDATE">
                    </form>
                  
                    </td>';

        echo '</tr>';
    }
    ?>
</table>

    </div>
  </div>

</body>

</html>