<?php 
require 'function.php';
$student = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nama nama mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
<th>No</th>
<th>Aksi</th>
<th>nama</th>
<th>nrp</th>
<th>email</th>
<th>jurusan</th>
<th>gambar</th>
   </tr>
   <?php $i = 1; ?>
        <?php foreach( $produk as $row ) :  ?>
<tr>
    <td><?= $i; ?></td>
    <td>
        <a href="">ubah</a> |
        <a href="">hapus</a>
    </td>
    <td><?php echo $row["nama"]; ?></td>
    <td><?php echo $row["nrp"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["jurusan"]; ?></td>
    <td><img src="img/<?php= $row["gambar"]; ?>"></td>
</tr>
  <?php $i++; ?>
        <?php endforeach;  ?>
    </table>
</body>
</html>
