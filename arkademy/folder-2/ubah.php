<?php  

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query/cari data mahasiswa berdasarkan id // query nya sudah dibuat di halaman functions
$stu = query("SELECT * FROM student WHERE id = $id")[0];

// cek apakah tombol sudah pernah ditekan apa belum
if( isset($_POST["submit"]) ) {
   
    //   cek apakah data berhasil ditambahkan atau tidak dan mengarahkan ke halaman index.php dengan redirect javascript

    if( ubah($_POST) > 0) {
        echo "
        <script>
         alert('data berhasil di ubah');
        document.location.href = 'create.php';
        </script> ";
    } else {
        echo "
        <script>
        alert('data gagal di ubah');
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
    <title>ubah data</title>
</head>
<body>
    
<h1>Ubah Data Siswa</h1>

<form action="" method="post">
  <ul>
  <input type="hidden" name="id" value="<?php echo $stu["id"]; ?>">
    <li>
    <label for="nama">Nama :</label>
    <input type="text" name="nama" id="nama" required  value="<?php echo $stu["nama"]; ?>" placeholder="masukkan nrp anda"> 
    </li><br>
    <li>
    <label for="nrp">NRP :</label>
    <input type="text" name="nrp" id="nrp" value="<?php echo $stu["nrp"]; ?>" placeholder="masukkan nrp anda"> 
    </li><br>
    <li>
    <label for="email">Email :</label>
    <input type="text" name="email" id="email" value="<?php echo $stu["email"]; ?>" placeholder="masukkan email anda"> 
    </li><br>
    <li>
    <label for="jurusan">Jurusan :</label>
    <input type="text" name="jurusan" id="jurusan"  value="<?php echo $stu["jurusan"]; ?>" placeholder="masukkan jurusan anda"> 
    </li><br>
    <li>
    <label for="gambar">Gambar :</label>
    <input type="text" name="gambar" id="gambar" value="<?php echo $stu["gambar"]; ?>" placeholder="masukkan gambar anda"> 
    </li>
 </ul>

 <button type="submit" name="submit">Ubah Data!</button>
  </form>

</body>
</html>