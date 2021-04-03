 <?php 
//  koneksi ke database
require 'functionsBook.php';

$book = query("SELECT book_tb.publication_year,book_tb.id AS idname, book_tb.name AS bname, book_tb.img, writer_tb.name AS wname,category_tb.name AS cname FROM book_tb JOIN writer_tb ON book_tb.writer_id =writer_tb.id JOIN category_tb ON book_tb.category_id =category_tb.id ORDER BY book_tb.id ASC");

//tombol cari ditekan

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
  <table>
<tr>
<td><a href="tambahBook.php">tambah Book &nbsp; <a/></td>
<td><a href="tambahCategory.php">tambah Category &nbsp;<a/></td>
<td><a href="tambahWriter.php">tambah Writer &nbsp;<a/></td>
</tr>
<tr>
<td> <br></td>
</tr>
<tr>
<!-- <td><a href="tambahBook.php">tambah Book<a/></td> -->
<td><a href="listCategory.php">List Category<a/></td>
<td><a href="listWriter.php">List Writer<a/></td>
</tr>


</table>    
<h1> List book</h1> 
<a href="tambahBook.php"> tambah data book</a>
<br><br>


    <div class="container-fluid">
	<div class="row">
<?php foreach($book as $row ) : ?>

		<div class="col-md-4">
			<div class="card" >
            <img src=" img/<?php echo $row["img"]; ?>"  style="width: 18rem;">
				<h5 class="card-header">
                <?php echo $row["bname"]; ?>
				</h5>
				<div class="card-body">
					<p class="card-text">
                    <?php echo $row["wname"]; ?> &nbsp; <?php echo $row["publication_year"]; ?>
					</p>
                    
				</div>
				<div class="card-footer">
        <a href="detail.php?id=<?php echo $row['idname']; ?>">View Detail<a/> 
            <br>
        <a href="ubahBook.php?id=<?php echo $row['idname']; ?>">ubah<a/> |
        <a href="hapusBook.php?id=<?php echo $row['idname']; ?>" 
        onclick="return confirm('yakin');">hapus <a/>
				</div>
			</div>
		</div>
		

<?php endforeach; ?>


	</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>

</html>