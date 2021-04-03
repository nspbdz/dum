<?php 
 require 'functionsBook.php';
 //koneksi ke dbms

 //ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id

$book = query("SELECT book_tb.publication_year,book_tb.id AS idname, book_tb.name AS bname, book_tb.img, writer_tb.name AS wname,category_tb.name AS cname FROM book_tb JOIN writer_tb ON book_tb.writer_id =writer_tb.id JOIN category_tb ON book_tb.category_id =category_tb.id ORDER BY book_tb.id ASC ")[0];



 ?>

<html>
<head>
<body>
        <h1>detail buku </h1>


        <input type="hidden" name="id" value="<?= $book["idname"]; ?>">

        <ul>
            <li>
                <label for="id">id : </label>
                <input type="text" name="id" id="id" required value="<?= $book["idname"]; ?>">
            </li>
            <li>
                <label for="name">name : </label>
                <input type="text" name="name"id="name" required value="<?= $book["bname"]; ?>" >
            </li>
            <li>
                <label for="category_id">category_id : </label>
                <input type="text" name="category_id"id="category_id" required value="<?= $book["cname"]; ?>" >
            </li>
            <li>
                <label for="writer_id">writer_id : </label>
                <input type="text" name="writer_id"id="writer_id" required value="<?= $book["wname"]; ?>" >
            </li>
            <li>
                <label for="publication_year">publication_year : </label>
                <input type="date" name="publication_year"id="publication_year" required value="<?= $book["publication_year"]; ?>" >
            </li>
            <li>
                <label for="img">img : </label>
                <img src="img/<?= $book['img']; ?>" width="40px" alt=""> <br>
            </li>
            <li>
                 <button type="submit" name="submit">ubah data</button>
            </li>
        </ul>
        </form>

</body>

</html>