<?php
$mysqli = new mysqli("localhost", "root", "root", "dkings");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM salaries_desc WHERE position = 'QB' LIMIT 3");
?>
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
    <tr>
      <?php

      $res->data_seek(0);
      while ($row = $res->fetch_assoc()) { ?>
      <td><?php echo $row['name']; ?></td>
}
<?php
}
?>


  <td><?php echo $x_arr[$counter]['quantity'];     ?></td>
  <td><?php echo $x_arr[$counter]['price'];        ?></td>
  <td><?php echo $x_arr[$counter]['stotmaterial']; ?></td>
</tr>
