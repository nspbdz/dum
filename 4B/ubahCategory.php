<?php 
 require 'functionsCategory.php';
 //koneksi ke dbms

 //ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id

$ctg = query("SELECT * FROM category_tb WHERE id = $id ")[0];


 // cek apakah tombol submit sudah di ttekan belum
 if( isset($_POST["submit"]) ) {

  

    //cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0 ){
            echo " <script>
                alert('data berhasil ubah')
                document.location.href = 'listCategory.php';
            </script> ";
    } else {
        echo  " <script>
        alert('data gagal ubah')
        document.location.href = 'listCategory.php';
        </script> 
                ";
        echo "<br>";
        echo mysqli_error($conn);
    }
 
    }

 ?>

<html>
<head>
    <title>ubah data mahasiswa</title>
</head>
<body>
        <h1>ubah data mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">

        <!-- <input type="hidden" name="id" value="<?= $ctg["id"]; ?>"> -->

        <ul>
            <li>
                <label for="id">id : </label>
                <input type="text" name="id" id="id" required value="<?= $ctg["id"]; ?>">
            </li>
            <li>
                <label for="name">name : </label>
                <input type="text" name="name"id="name" required value="<?= $ctg["name"]; ?>" >
            </li>
            
            <li>
                 <button type="submit" name="submit">ubah data</button>
            </li>
        </ul>
        </form>

</body>

</html>