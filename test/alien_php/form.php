<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../main.css">
<style>
body { background-image: url(img/Earth_2.png); 
}
</style>
</head>
<body>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn ) {
		  die('Could not connect: ' . mysql_error());
		}


//DB Connection
if(isset($_POST['add'])) {

//Prevent SQL Injection
		if(! get_magic_quotes_gpc() )
		{
		   $first 		= addslashes ($_POST['first']);
		   $last        = addslashes ($_POST['last']);
		   $location    = addslashes ($_POST['location']);
		}
		else
		{
		//Grab inputs in text boxes
		   $first       = $_POST['first'];
		   $last        = $_POST['last'];
		   $location    = $_POST['location'];
		}
//Insert into alien_php table
$sql = "INSERT INTO alien VALUES('$first','$last','$location', CURDATE())";

mysql_select_db('alien_php');
$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
//Alert user of db entry
echo "<script>
alert('Thanks for doing your part to save Humanity!');
/*window.location.href='form.php';*/
</script>";

//mysql_close($conn);
	  }
?>
 <?php
mysql_select_db('alien_php');
$result2 = mysql_query("SELECT * FROM alien");
echo mysql_error();
?>
    
<!-- Build Entry Form -->
<form method="POST>
  <div class="container">
  <div class="row text-center"> <img src="http://pix.iemoji.com/sbemojix2/0522.png" class="img-circle"></div>
  <div class="form-group">
  <div class="row text-center">
    <h2 id="forms-example">Area 151</h2>
    <p>Record your alien sightings here!</p>
  </div>
  <div class="bs-example" data-example-id="basic-forms">
  <input type="text" name="first" class="form-control" id="first" placeholder="Enter First Name">
  <br>
  <input type="text" name="last" class="form-control" id="last" placeholder="Enter Last Name">
  <br>
  <input type="text" name="location" class="form-control" id="location" placeholder="Enter Location">
  <br>
  <input name="add" type="submit" id="add" value="Add Sighting">
</form>
</div>
</div>
   
   
   <?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	?>
   <div class="row text-center">
  <h2 id="tables-bordered">Most Wanted</h2>
  <p>Keep track of alien sightings</p>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="header">First</th>
      <th class="header">Last</th>
      <th class="header">Location</th>
      <th class="header">Date Found</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysql_fetch_array($result2)) { ?>
    <tr>
      
      <td><?php echo $row["first"]    ?></td>
      <td><?php echo $row["last"]     ?></td>
      <td><?php echo $row["location"] ?></td>
      <td><?php echo $row["date_add"] ?></td>
    </tr>
    <?php } 
	

	
	?>
  </tbody>
</table>
   
   <?php
   
}
   
   ?>
</body>
</html>
