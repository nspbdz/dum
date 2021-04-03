<?php 
//  koneksi ke database
$conn = mysqli_connect("localhost", "root","","batch22");


function query($query)  {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;

    }
    return $rows; 
}

function tambah($data) {
    
      //ambil data dari tiap elemen dalam form
        global $conn;
      $id = htmlspecialchars($data["id"]);
      $name = htmlspecialchars($data["name"]);
      $category_id = htmlspecialchars($data["category_id"]);
      $writer_id = htmlspecialchars($data["writer_id"]);
      $publication_year = htmlspecialchars($data["publication_year"]);
    //   $jurusan = htmlspecialchars($data["jurusan"]);
    //   $gambar = htmlspecialchars($data["gambar"]);
    //upload gambar
    $img = upload();
    if( !$img ) {
        return false;
    }

        // query inser data
    $query = "INSERT INTO book_tb
            VALUES
            ('$id','$name','$category_id','$writer_id', '$publication_year',
            '$img')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM book_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data) {
    //ambil data dari tiap elemen dalam form
    global $conn;
    $id = $data["id"];
    // $nrp = htmlspecialchars($data["nrp"]);
    $name = htmlspecialchars($data["name"]);
    $category_id = htmlspecialchars($data["category_id"]);
    $writer_id = htmlspecialchars($data["writer_id"]);
    $publication_year = htmlspecialchars($data["publication_year"]);
    $imglama = htmlspecialchars($data["imglama"]);

    //cek apakah user pilih gambar baru / tidak
    if ( $_FILES['img']['error'] === 4 ) {
        $img = $imglama;
    } else {
        $img = upload();

    }

        // query inser data
    $query = "UPDATE  book_tb SET
                -- id = '$id',
                name = '$name',
                category_id = '$category_id',
                writer_id = '$writer_id',
                publication_year = '$publication_year',
                img = '$img'
            WHERE id = $id
             
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}


function cari($keyword) {
    $query = "SELECT * FROM mahasiswa 
                WHERE
                  nama LIKE '$keyword%' OR
                  nrp LIKE '$keyword%' OR
                  email LIKE '$keyword%' OR
                  jurusan LIKE '$keyword%' 

                  
             ";
    return query($query);
    
}


function upload(){ 

    $namaFile = $_FILES['img']['name'];
    $ukuranFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];

    //cek apakah tidak ada img yang diupload
    if( $error === 4) {
        echo "<script>
                alert('pilih img terlebih dahulu');
            </script>";
        return false; 
    }

    // cek  apakah yang diupload adalah img
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
    </script>";
return false; 

    }

        // cek  jika ukuran nya terlalu besar
        if( $ukuranFile > 1000000 ) {
            echo "<script>
            alert('pilih gambar terlalu besar!');
        </script>";
    return false; 

        }

        // generate nama gambar baru

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .=$ekstensiGambar;

        // lolos pengecekan, gambar siap diupload

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;


}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
     $password = mysqli_real_escape_string($conn, $data["password"]);
     $password2 = mysqli_real_escape_string($conn,$data["password2"]);


    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username' ");


if( mysqli_fetch_assoc($result) ) {
        echo " <script>
            alert('username yang diplih sudah terdaftar!');
        </script>";
        return false;
    }


    //  cek konfirmasi password

    if( $password !== $password2) {
        echo " <script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die; 

    //Ttambahkan data baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>










<!-- <html>
 $conn = mysqli_connect("localhost", "root","","phpdasar");

// mengambil data dari database

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() mengembalikan array asosiatif
// mysqli_fetch_assoc() mengembalikan array numerik
// mysqli_fetch_array() mengembalikan array array
// mysqli_fetch_objek() mengembalikan array objek


// while ($mhs = mysqli_fetch_array($result)) {

//     var_dump($mhs);

// }
</html> -->
