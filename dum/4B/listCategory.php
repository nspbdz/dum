 <?php 
//  koneksi ke database
require 'functionsCategory.php';

$ctg = query("SELECT * FROM category_tb ORDER BY id ASC");

//tombol cari ditekan

 ?>
<html>
<head>
    <title> halaman admin</title>
</head>



<body>
<table>
<tr>
<!-- <td><a href="tambahBook.php">tambah Book<a/></td> -->
<td><a href="tambahCategory.php">tambah Category<a/></td>
<!-- <td><a href="tambahWriter.php">tambah Writer<a/></td> -->
</tr>

<tr>
<!-- <td><a href="tambahBook.php">tambah Book<a/></td> -->
<!-- <td><a href="listCategory.php">ubah Category<a/></td> -->
<!-- <td><a href="ubahWriter.php">ubah Writer<a/></td> -->
</tr>


</table>    
<h1> List Category</h1>
<br><br>


<table border="1" cellpadding="10" cellspacing="0" >
<tr>
    <th>id</th>
    <th>aksi</th>
    <th>name</th>   

</tr>
<?php $i= 1; ?>
<?php foreach($ctg as $row ) : ?>

<tr>
    <td><?php echo $i ?></td>
    <td>
    <a href="ubahCategory.php?id=<?php echo $row['id']; ?>">ubah<a/> |

    <a href="hapusCategory.php?id=<?php echo $row['id']; ?>" 
    onclick="return confirm('yakin');">hapus <a/>

    </td>
    <td> <?php echo $row["name"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>