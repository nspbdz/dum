<?php 
 require 'functionsBook.php';
 //koneksi ke dbms

 //ambil data di url
$id = $_GET["id"];

//query data Buku berdasarkan id

$wrt = query("SELECT  * FROM writer_tb ORDER BY id ASC");
$ctg = query("SELECT * FROM category_tb ORDER BY id ASC");

$mhs = query("SELECT  book_tb.publication_year,book_tb.id AS idname, book_tb.name AS bname, book_tb.img, writer_tb.name AS wname,
writer_tb.id AS wid, category_tb.name AS cname,category_tb.id AS cid FROM book_tb JOIN writer_tb ON book_tb.writer_id =writer_tb.id JOIN category_tb ON book_tb.category_id =category_tb.id WHERE book_tb.id = $id ")[0];


 // cek apakah tombol submit sudah di ttekan belum
 if( isset($_POST["submit"]) ) {

  

    //cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0 ){
            echo " <script>
                alert('data berhasil ubah')
                document.location.href = 'index.php';
            </script> ";
    } else {
        echo  " <script>
        alert('data gagal ubah')
        document.location.href = 'index.php';
        </script> 
                ";
        echo "<br>";
        echo mysqli_error($conn);
    }
 
    }

 ?>

<html>
<head>
    <title>ubah data Buku</title>
</head>
<body>
        <h1>ubah data Buku</h1>
        <h1>minimal merubah 1 data Buku</h1>

        <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $mhs["idname"]; ?>">
        <input type="hidden" name="imglama" value="<?= $mhs["img"]; ?>">

        <ul>
            <!-- <li>
                <label for="id">id : </label>
                <input type="text" name="id" id="id" required value="<?= $mhs["id"]; ?>">
            </li> -->
            <li>
                <label for="name">name : </label>
                <input type="text" name="name"id="name" required value="<?= $mhs["bname"]; ?>" >
            </li>

            <li>
                <label for="category_id">category : </label>
                
                        <select  name="category_id" id="category_id" required>
  <option  disable selected="selected" value="<?= $mhs['cid'] ?>" > "<?= $mhs['cname'] ?>" </option>

            <!-- <option  selected="selected"></option> -->
            <?php
                foreach($ctg as $name) { ?>
                <option id="category_id" value="<?= $name['id'] ?>">"<?= $name['name'] ?>"</option>
            <?php
                } ?>
            </select> 
                </li>
            <li>
                <label>writer : </label>
                    
            <select name="writer_id" id="writer_id" required>
  <option  disable selected="selected" value="<?= $mhs['wid'] ?>" > "<?= $mhs['wname'] ?>" </option>
  <?php
    foreach($wrt as $name) { ?>
      <option id="writer_id" value="<?= $name['id'] ?>">"<?= $name['name'] ?>"</option>
  <?php
    } ?>
</select> 
            </li>

            <li>
                <label for="publication_year">publication_year : </label>
                <input type="date" name="publication_year"id="publication_year" required value="<?= $mhs["publication_year"]; ?>" >
            </li>
            <li>
                <label for="img">img : </label>
                <img src="img/<?= $mhs['img']; ?>" width="40px" alt=""> <br>
                <input type="file" name="img"id="img"  ">
            </li>
            <li>
                 <button type="submit" name="submit">ubah data</button>
            </li>
        </ul>
        </form>

</body>

</html>