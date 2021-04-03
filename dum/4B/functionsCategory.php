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




function tambahCategory($data) {
    
    //ambil data dari tiap elemen dalam form
      global $conn;
    $id = htmlspecialchars($data["id"]);
    $name = htmlspecialchars($data["name"]);
  
  
      // query inser data
  $query = "INSERT INTO category_tb
          VALUES
          ('$id','$name')
      ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM category_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data) {
    //ambil data dari tiap elemen dalam form
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);

    // / query inser data
    $query = "UPDATE  category_tb SET
                id = '$id',
                name = '$name'
       
            WHERE id = $id
             
        ";
    mysqli_query($conn, $query);

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
