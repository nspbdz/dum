<?php 
//  koneksi ke database
require 'functionsBook.php';
// SELECT users_tb.name, users_tb.photo, post_tb.content, post_tb.image
// FROM users_tb INNER JOIN post_tb
// ON users_tb.id = post_tb.id_user

$book = query("SELECT book_tb.publication_year,book_tb.id AS idname, book_tb.name AS bname, book_tb.img, writer_tb.name AS wname,category_tb.name AS cname FROM book_tb JOIN writer_tb ON book_tb.writer_id =writer_tb.id JOIN category_tb ON book_tb.category_id =category_tb.id ORDER BY book_tb.id ASC");
// SELECT book_tb.name, book_tb.img, writer_tb.name,category_tb.name FROM book_tb JOIN writer_tb ON book_tb.writer_id =writer_tb.id JOIN category_tb ON book_tb.category_id =category_tb.id ORDER BY book_tb.id ASC
//tombol cari ditekan

 ?>
<html>
<head>
</head>



<body>
<h1> Spesifik  Book</h1>
<br><br>


<table border="1" cellpadding="10" cellspacing="0" >
<tr>
<th>no</th>

    <th>gambar</th>
    <th>id</th>
    <th>name</th>   
    <th>category_id</th>
    <th>writer_id</th>
    <th>publication_year</th>

</tr>
<?php $i= 1; ?>
<?php foreach($book as $row ) : ?>

<tr>
    <td><?php echo $i ?></td>
    <td><img src="img/<?php echo $row["img"]; ?>"
    width="50"></td>
    <td> <?php echo $row["idname"]; ?></td>
    <td> <?php echo $row["bname"]; ?></td>
    <td> <?php echo $row["cname"]; ?></td>
    <td> <?php echo $row["wname"]; ?></td>
    <td> <?php echo $row["publication_year"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>