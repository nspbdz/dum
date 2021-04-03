 <?php 
//  koneksi ke database
require 'functionsWriter.php';

$ctg = query("SELECT * FROM writer_tb ORDER BY id ASC");

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
<td><a href="tambahWriter.php">tambah Writer<a/></td>
<!-- <td><a href="tambahWriter.php">tambah Writer<a/></td> -->
</tr>

<tr>
<!-- <td><a href="tambahBook.php">tambah Book<a/></td> -->
<!-- <td><a href="listWriter.php">ubah Writer<a/></td> -->
<!-- <td><a href="ubahWriter.php">ubah Writer<a/></td> -->
</tr>


</table>    
<h1> List Writer</h1>
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
    <a href="ubahWriter.php?id=<?php echo $row['id']; ?>">ubah<a/> |

    <a href="hapusWriter.php?id=<?php echo $row['id']; ?>" 
    onclick="return confirm('yakin');">hapus <a/>

    </td>
    <td> <?php echo $row["name"]; ?></td>

</tr>
<?php $i++; ?>

<?php endforeach; ?>

 </table>

</body>
</html>