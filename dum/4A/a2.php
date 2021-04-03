<?php 
//  koneksi ke database
require 'functionsBook.php';
$ctg = query("SELECT * FROM category_tb ORDER BY id ASC");

$book = query("SELECT * FROM book_tb ORDER BY id ASC");
$wrt = query("SELECT * FROM writer_tb ORDER BY id ASC");

//tombol cari ditekan

 ?>
<html>
<head>
    <title> halaman admin</title>
</head>

<h1> list Category</h1>
 <table border="1" cellpadding="10" cellspacing="0" >
<tr>
    <th>no</th>
    <th>id</th>
    <th>name</th>   

</tr>
<?php $i= 1; ?>
<?php foreach($ctg as $row ) : ?>

<tr>
    <td><?php echo $i ?></td>
    <td> <?php echo $row["id"]; ?></td>
    
    <td> <?php echo $row["name"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>


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

<h1> list Writer</h1>
 <table border="1" cellpadding="10" cellspacing="0" >
<tr>
    <th>no</th>
    <th>id</th>
    <th>name</th>   

</tr>
<?php $i= 1; ?>
<?php foreach($wrt as $row ) : ?>

<tr>
    <td><?php echo $i ?></td>
    <td> <?php echo $row["id"]; ?></td>
    
    <td> <?php echo $row["name"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

 


</body>

</html>