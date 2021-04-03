<?php 
//  koneksi ke database
require 'functionsBook.php';
$wrt = query("SELECT * FROM writer_tb ORDER BY id ASC");
 ?>
<html>
<head>
    <title> halaman admin</title>
</head>

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