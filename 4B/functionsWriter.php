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




function tambahWriter($data) {
    
    //ambil data dari tiap elemen dalam form
      global $conn;
    $id = htmlspecialchars($data["id"]);
    $name = htmlspecialchars($data["name"]);
  
  
      // query inser data
  $query = "INSERT INTO writer_tb
          VALUES
          ('$id','$name')
      ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM writer_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data) {
    //ambil data dari tiap elemen dalam form
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);

    // / query inser data
    $query = "UPDATE  writer_tb SET
                id = '$id',
                name = '$name'
       
            WHERE id = $id
             
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}




?>



