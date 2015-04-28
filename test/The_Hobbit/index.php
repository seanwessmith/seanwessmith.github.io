<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Hobbit Place</title>
<link href="http://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="main.css">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/typeahead.js"></script>
<script src="../js/main.js"></script>
<script src="../js/migrate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<?php
ini_set('display_errors', '1');
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn ) {
		  die('Could not connect:'. mysql_error());
		}
//DB Connection
if(isset($_POST['add'])) {

//Prevent SQL Injection
		if(! get_magic_quotes_gpc() )
		{
		   $customername   = addslashes ($_POST['customername']);
		   $date           = addslashes ($_POST['date']);
		   $category       = addslashes ($_POST['category']);
		   $materialsearch = addslashes ($_POST['materialsearch']);
		   $quantity       = addslashes ($_POST['quantity']);
		   $price 	       = addslashes ($_POST['price']);
		   $stot		   = addslashes ($_POST['stot']);
		   $taxrate 	   = addslashes ($_POST['taxrate']);
		   $stotnotax 	   = addslashes ($_POST['stotnotax']);
		   $stotwtax 	   = addslashes ($_POST['stotwtax']);
		   $consultfees    = addslashes ($_POST['consultfees']);
		   $hours 		   = addslashes ($_POST['hours']);
		   $stotmaterial   = addslashes ($_POST['stotmaterial']);
		   $delivery 	   = addslashes ($_POST['delivery']);
		   $misc 		   = addslashes ($_POST['misc']);
		   $totfees 	   = addslashes ($_POST['totfees']);
		   $laborcost 	   = addslashes ($_POST['laborcost']);
		   $labortot 	   = addslashes ($_POST['labortot']);
		   $total 		   = addslashes ($_POST['total']);
		}
		else
		{
		//Grab inputs in text boxes
		   $customername   =  ($_POST['customername']);
		   $date           =  ($_POST['date']);
		   $category       =  ($_POST['category']);
		   $materialsearch =  ($_POST['materialsearch']);
		   $quantity       =  ($_POST['quantity']);
		   $price 	       =  ($_POST['price']);
		   $stot		   =  ($_POST['stot']);
		   $taxrate 	   =  ($_POST['taxrate']);
		   $stotnotax 	   =  ($_POST['stotnotax']);
		   $stotwtax 	   =  ($_POST['stotwtax']);
		   $consultfees    =  ($_POST['consultfees']);
		   $hours 		   =  ($_POST['hours']);
		   $stotmaterial   =  ($_POST['stotmaterial']);
		   $delivery 	   =  ($_POST['delivery']);
		   $misc 		   =  ($_POST['misc']);
		   $totfees 	   =  ($_POST['totfees']);
		   $laborcost 	   =  ($_POST['laborcost']);
		   $labortot 	   =  ($_POST['labortot']);
		   $total 		   =  ($_POST['total']);
		}
//Insert into alien_php table
//Test
//"INSERT INTO estimate VALUES ('7','1','1','23','.56','200','50', '10','100','500','25','2000','100','200','2000',curdate())";

$estimateid = "9";
$userid = "1";
$customername = "1";
$stotmaterial = "23";
$taxrate = "5";
$stotwtax = "5";
$consultfees = "5";
$hours = "5";
$delivery = "5";
$misc = "5";
$totfees = "5";
$laborcost = "5";
$labortot = "5";
$total = "5";
$upc = "1001";
$price = "5";
$quantity = "5";

$sql = "INSERT INTO materialestimate VALUES (".$estimateid.",".$upc.",".$price.",".$quantity.")";

//$sql2 = "INSERT INTO estimate VALUES (".$estimateid.",".$userid.",".$customername.",".$stotmaterial.",".$taxrate.",".$stotwtax.",".$consultfees.",".$hours.",".$stotmaterial.",".$delivery.",".$misc.",".$totfees.",".$laborcost.",".$labortot.",".$total.",curdate())";

mysql_select_db('hobbit');
$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
//Alert user of db entry
echo "<script>
alert('Thanks for doing your part to save Humanity!');
/*window.location.href='form.php';
</script>";

//Close if(isset
	  } 
?>
<?php
mysql_select_db('hobbit');
$result2 = mysql_query("SELECT a.Price, a.Quantity, b.MaterialName FROM materialestimate a, material b WHERE a.UPC = b.UPC AND a.EstimateID = '0'");
echo mysql_error();
?>

<div class="full bg"></div>
<div id="nav" class="navbar navbar-default navbar-fixed-top">
  <div class="container constrained">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand">The Hobbit Place | Landscaping &amp; Design</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li id="homebar" class="baritem active"><a href="#content">Quote</a></li>
        <li id="projbar" class="baritem"><a href="#projects">Customers</a></li>
        <li id="connbar"class="baritem"><a href="#connect">Materials</a></li>
        <li id="connbar"class="baritem"><a href="#connect">Retreive Quote</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container" id="content">
  <div class="row padme">
    <div id="box1" class="col-xs-11 col-md-12 box center">
      <div>Customer Info</div>
      <br>
      <form class="form-inline">
        <label class="sr-only">Customer Name</label>
        <input type="text" class="form-control" name="customername" id="customername" placeholder="Customer Name">
        <label class="sr-only">Address</label>
        <input type="text" class="form-control" name="streetaddress" id="streetaddress" placeholder="Street Address">
        <label class="sr-only">City</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="City">
        <label class="sr-only">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
        <label class="sr-only">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        <label class="sr-only">Date</label>
        <input type="date" class="form-control" name="date" id="date" placeholder="Date">
      </form>
      <br>
      <div>Material Info</div>
      <br>
      <form method="POST" class="form-inline">
        <label class="sr-only">Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Category">
        <label class="sr-only">Material Search</label>
        <input type="text" class="form-control" name="materialsearch" id="material" placeholder="Material">
        <label class="sr-only">Quantity</label>
        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
        <label class="disable">X</label>
        <label class="sr-only">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
        <label class="sr-only">Subtotal</label>
        <input type="text" class="form-control" name="stotmaterial" id="stotmaterial" placeholder="Subtotal">
        <label class="sr-only">Add to BOM</label>
        <input class="btn btn-default navbar-btn" type="submit" id="add" name="add" >
      </form>
    </div>
  </div>
  <?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
  ?>
  <div class="row padme" id="projects">
    <div id="box2" class="col-xs-11 col-md-12 box center">
      <div>Bill of Materials</div>
      <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="header">Name</th>
            <th class="header">Quantity</th>
            <th class="header">Price</th>
            <th class="header">Subtotal</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = mysql_fetch_array($result2)) { ?>
          <tr>
            <?php 
			 $matprice = $row["Price"];
			 $matquantity = $row["Quantity"];
			 $totmatcost = $matprice * $matquantity ?>
            <td><?php echo $row["MaterialName"]    ?></td>
            <td><?php echo $row["Quantity"]     ?></td>
            <td><?php echo $row["Price"] ?></td>
            <td><?php echo $totmatcost ?></td>
          </tr>
          <?php 
        } 
  ?>
        </tbody>
      </table>
    </div>
  </div>
    <?php 
	       } 
	  ?>
  
  <div class="row padme" id="connect">
    <div id="box3" class="col-xs-11 col-md-12 box center">
    <div>Taxes and Fees</div>
	<br>
    <form class="form-inline">
      <div class align="left">
        <label class="sr-only">Tax Rate</label>
        <input type="text" class="form-control" name="taxrate" id="taxrate" placeholder="Tax Rate">
        <span style="float:right;">
        <label class="sr-only">Subtotal No Tax</label>
        <input type="text" class="form-control" name="stotnotax" id="stotnotax" placeholder="Subtotal No Tax">
        </span></div>
      <br>
      <div> <span style="float:right;">
        <label class="sr-only">Subtotal With Tax</label>
        <input type="text" class="form-control" name="stotwtax" id="stotwtax" placeholder="Subtotal With Tax">
      </div>
      <br>
      <br>
      <div class align="left">
        <label class="sr-only">Consultation Fees</label>
        <input type="text" class="form-control" name="consultfees" id="consultfees" placeholder="Consulation Fees">
        <label class="disable">X</label>
        <label class="sr-only">Hours</label>
        <input type="text" class="form-control" name="hours" id="hours" placeholder="Hours">
        <label class="disable">=</label>
        <label class="sr-only">Subtotal</label>
        <span class="mlabel label-white">Subtotal</span>
        <label class="disable">+</label>
        <label class="sr-only">Delivery</label>
        <input type="text" class="form-control" name="delivery" id="delivery" placeholder="Delivery">
        <label class="disable">+</label>
        <label class="sr-only">Miscellaneous</label>
        <input type="text" class="form-control" name="misc" id="misc" placeholder="Miscellaneous">
        <span style="float:right;">
        <label class="sr-only">Total Fees</label>
        <input type="text" class="form-control" name="totfees" id="totfees" placeholder="Total Fees">
        </span> </div>
      <br>
      <div class align="left">
        <label class="sr-only">Labor Cost</label>
        <input type="text" class="form-control" name="laborcost" id="laborcost" placeholder="Labor Cost">
        <span style="float:right;">
        <label class="sr-only">Labor Total</label>
        <input type="text" class="form-control" name="labortotal" id="labortotal" placeholder="Labor Total">
        </span></div>
      <hr size=2>
      <div class align="right">
        <label class="sr-only">Total</label>
        <input type="text" class="form-control" name="total" id="total" placeholder="Total">
      </div>
      </div>
    </form>
  </div>
  <br>
</div>
</div>
</body>
</html>