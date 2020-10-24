<?php 
require 'functions.php';
$produk = query("SELECT * FROM produk");

// cek apakah tombol cari sudah ditekan atau belum
if( isset($_POST["cari"]) ) {
    $produk = cari($_POST["keyword"] );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nama nama mahasiswa</title>
    <style>
    body {
        background-color: grey;
    }
    .tag {
        position: relative;
        text-align: center;
        color: black;
    }
    .tag h1 {
        border-bottom: 2px solid black;
        display: inline;
    }
    .tag a{
        margin-top: 10px;
        color: black;
        text-decoration: none;
        display: block;
    }
    .pencarian {
        position: absolute;
        top: 110px;
        left: 500px;
        border: 0px;
    }
    .pencarian input, button {
        border-radius: 30px;
        padding: 3px;
    }
    table {
        position: absolute;
        top: 150px;
        left: 300px;
        border-radius: 30px 30px;
        color: white;
        background-color: yellowgreen;
    }
    table a {
        color: white;
        text-decoration: none;
    }
    table tr:nth-child(even) {
        background-color: maroon;
    }
    table th {
        text-transform: capitalize;
    }
    </style>
</head>
<body>
    <div class="tag">
    <h1>Daftar Mahasiswa</h1> <br>
    <a style="text-align: center;" href="tambah.php">Tambah Data Mahasiswa</a>
    </div>
   <br><br>

   <form action="" method="post">

<!-- untuk mencari -->
<div class="pencarian">
<input  type="text" name="keyword" size="45" placeholder="masukkan keyword pencarian" autofocus autocomplete="off">
<button  type="submit" name="cari">Search</button>
</div>

<br><br>
</form>

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
        <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> |
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
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
