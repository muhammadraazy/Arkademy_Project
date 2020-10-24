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
// tambah/insert data ke database

function tambah($data) {
    global $konek;
    $nama =htmlspecialchars($data["nama_produk)"]);
    $nrp =htmlspecialchars($data["keterangan"]);
    $email = htmlspecialchars($data["harga"]);
    $jurusan =htmlspecialchars($data["jumlah"]);
 
    // query tambah data
    $query = "INSERT INTO student VALUES 
            ('', '$nama', '$nrp', '$email', '$jurusan')";
    
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}

// delete data dari database

function hapus($id) {
    global $konek;
    mysqli_query($konek, "DELETE FROM student WHERE id = $id");

    return mysqli_affected_rows($konek);
}


// ubah/update data
function ubah($data) {
    global $konek;
        $id = $data["id"];
        $nama =htmlspecialchars($data["nama_produk"]);
        $nrp =htmlspecialchars($data["keterangan"]);
        $email = htmlspecialchars($data["harga"]);
        $jurusan =htmlspecialchars($data["jumlah"]);
   
    
        // query tambah data
        $query = "UPDATE student SET
                 nama = '$nama_produk',
                 nrp = '$keterangan',
                 email = '$harga',
                 jurusan = '$jumlah'
                 WHERE id = $id
                 ";
        
        mysqli_query($konek, $query);
    
        return mysqli_affected_rows($konek);
    }

    // untuk mencari data di halaman web
function cari($keyword) {
    $query = "SELECT * FROM student
               WHERE nama LIKE '%$keyword%' OR
               nrp LIKE '%$keyword%' OR
               email LIKE '%$keyword%' OR
               jurusan LIKE '%$keyword%'               
               ";
      return query($query);  
}


function upload() {
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmpname"];
    // cek apakah tidak ada gambar yang diupload
    if( $error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu')
            </script>
            ";
            return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ["jpg","jpeg","png"];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($$ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>
        ";
        return false;
    }
    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>
        ";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    move_uploaded_file($tmpName, 'img/' . $namaFile);
          return $namaFile;
}


?>
