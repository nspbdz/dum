<?php 
//  koneksi ke database
require 'functionsBook.php';

$book = query("SELECT * FROM book_tb ORDER BY id ASC");

//tombol cari ditekan

 ?>
<html>
<head>
    <title> halaman admin</title>
</head>



<body>
<h1> table book</h1>
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
    <td> <?php echo $row["id"]; ?></td>
    <td> <?php echo $row["name"]; ?></td>
    <td> <?php echo $row["category_id"]; ?></td>
    <td> <?php echo $row["writer_id"]; ?></td>
    <td> <?php echo $row["publication_year"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>