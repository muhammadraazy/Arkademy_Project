<?php  

require 'functions.php';

// cek apakah tombol sudah pernah ditekan apa belum
if( isset($_POST["submit"]) ) {
   
    //   cek apakah data berhasil ditambahkan atau tidak dan mengarahkan ke halaman create.php dengan redirect javascript

    if( tambah($_POST) > 0) {
        echo "
        <script>
         alert('data berhasil di tambahkan');
        document.location.href = 'create.php';
        </script> ";
    } else {
        echo "
        <script>
        alert('data gagal di tambahkan');
        document.location.href = 'create.php';
       </script>;
       ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data</title>
</head>
<body>
    
<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post">
  <ul>
    <li>
    <label for="nama">Nama :</label>
    <input type="text" name="nama" id="nama" required placeholder="masukkan nrp anda"> 
    </li><br>
    <li>
    <label for="nrp">NRP :</label>
    <input type="text" name="nrp" id="nrp" placeholder="masukkan nrp anda"> 
    </li><br>
    <li>
    <label for="email">Email :</label>
    <input type="text" name="email" id="email" placeholder="masukkan email anda"> 
    </li><br>
    <li>
    <label for="jurusan">Jurusan :</label>
    <input type="text" name="jurusan" id="jurusan" placeholder="masukkan jurusan anda"> 
    </li><br>
    <li>
    <label for="gambar">Gambar :</label>
    <input type="file" name="gambar" id="gambar" placeholder="masukkan gambar anda"> 
    </li>
 </ul>

 <button type="submit" name="submit">Tambah Data!</button>
  </form>

</body>
</html>