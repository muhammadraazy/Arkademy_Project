<?php 
// meghubungkan ke database (simpan koneksi database ke dalam varabel agar lebih mudah di gunakan)
$konek = mysqli_connect("localhost", "root", "", "arkademy");

function query($query) {
     global $konek;
    //  mengambil data dari database 
     $result = mysqli_query($konek, $query);
    //  array kosong/ utk wadah
     $rows = [];
     while( $row = mysqli_fetch_assoc( $result) ) {
         $rows [] = $row;
     }
     return $rows;
}



?>
