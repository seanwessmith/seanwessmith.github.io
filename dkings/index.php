<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta content="width=device-width,initial-scale=1.0,user-scalable=no,minimum-scale=1.0,maximum-scale=1.0" id="viewport" name="viewport">
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link href="http://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="wynd.css">
	<script src="jquery-1.11.3.min.js"></script>
	<script src="migrate.js"></script>
	<script src="bootstrap.min.js"></script>
	<script src="main.js"></script>
	<!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	<title>Fantasy Football Quant</title>
</head>
<body>
<!-- SELECT * FROM salaries_desc WHERE position = 'QB' LIMIT 1, 1 -->
<!-- Make a connection to localhost DKings Database-->
<?php
$mysqli = new mysqli("localhost", "root", "root", "dkings");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<div class="full bg"></div>
<div class="full blurbg" id="cliptop"></div>
<div class="full blurbg" id="mainblur"></div>
<div id="nav" class="navbar navbar-default navbar-fixed-top">
  <div class="container constrained">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand">Fantasy Football Quant</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="homebar" class="baritem active"><a href="#content">Build</a></li>
        <li id="projbar" class="baritem"><a href="#projects">Review</a></li>
        <li id="connbar" class="baritem"><a href="#connect">History</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container" id="content">
<div class="row padme">
  <div id="box1" class="col-xs-12 col-md-12 box center">
    <h1>Fantasy Football Quant</h1>
    <small>Enter your salary cap:</small>
    <table>
			<input type="text" autocomplete="false" spellcheck="false" name="salarycap" class="textbox" id="salarycap" placeholder="Salary Cap" value="<?php if($salarycap) print $salarycap ?>">
		</table>
	</div>
<div class="row padme" id="projects">
  <div id="box2" class="col-xs-11 col-md-12 box center">
		<table class="table table-bordered">
		  <tbody>
		    <tr>
		      <?php
          $res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'QB' LIMIT 1");
		      $res->data_seek(0);
		      while ($row = $res->fetch_assoc()) { ?>
		      <td><?php echo $row['name']; ?></td>
		<?php } ?>
		</tr>
		<tr>
			<?php
			$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'RB' LIMIT 2");
			$res->data_seek(0);
			while ($row = $res->fetch_assoc()) { ?>
			<td><?php echo $row['name']; ?></td>
<?php } ?>
</tr>
<tr>
	<?php
	$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'WR' LIMIT 3");
	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) { ?>
	<td><?php echo $row['name']; ?></td>
<?php } ?>
</tr>
<tr>
	<?php
	$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'TE' LIMIT 1");
	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) { ?>
	<td><?php echo $row['name']; ?></td>
<?php } ?>
</tr>
<tr>
	<?php
	//Should be a flex position///////
	$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'WR' LIMIT 1");
	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) { ?>
	<td><?php echo $row['name']; ?></td>
<?php } ?>
</tr>
<tr>
	<?php
	$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'DST' LIMIT 1");
	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) { ?>
	<td><?php echo $row['name']; ?></td>
<?php } ?>
</tr>
	</tbody>
</table>
	<!--
	$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'QB' LIMIT 1, 1");

	$res->data_seek(0);
	while ($row = $res->fetch_assoc()) {
	    echo " id = " . $row['name'] . "\n";
	}
  -->
  </div>
</div>

</script>
</body>
</html>
