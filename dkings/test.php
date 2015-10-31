<?php
$mysqli = new mysqli("localhost", "root", "root", "dkings");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sal_cap = 50000;
$tot_sal = 0;
?>
<table class="table table-bordered">
  <tbody>
    <tr>
      <?php
      //Select one quarterback for the team
      $qb = 0;
      $y = 0;
      for ($y = 1; $y <= 1;) {
      $res = $mysqli->query("SELECT * FROM values_desc WHERE position = 'QB' ORDER BY value DESC LIMIT $qb,1");
      $res->data_seek(0);
      while ($row = $res->fetch_assoc()) {
        $t_salary = '';
        $t_name = '';
        $t_value = '';
        $t_name = $row['name'];
        $t_salary = floatval($row['salary']);
        $t_value = $row['value'];
        $tot_sal = $tot_sal + $t_salary;

    } if ($tot_sal < $sal_cap) {
      $y++;
      ${"qb_n".$qb} = $t_name;
      ${"qb_s".$qb} = $t_salary;
      ${"qb_v".$qb} = $t_value;
    }
    $qb++;
    }

    //Select two runningbacks for the team
    $rb = 0;
    $y = 0;
    for ($y = 1; $y <= 2;) {
    $res = $mysqli->query("SELECT * FROM values_desc WHERE position = 'RB' ORDER BY value DESC LIMIT $rb,1");
    $res->data_seek(0);
    while ($row = $res->fetch_assoc()) {
      $t_salary = '';
      $t_name = '';
      $t_value = '';
      $t_name = $row['name'];
      $t_salary = floatval($row['salary']);
      $t_value = $row['value'];
      $tot_sal = $tot_sal + $t_salary;

    } if ($tot_sal < $sal_cap) {
    $y++;
    ${"rb_n".$rb} = $t_name;
    ${"rb_s".$rb} = $t_salary;
    ${"rb_v".$rb} = $t_value;
    echo ${"rb_n".$rb};
    echo ${"rb_s".$rb};
    echo ${"rb_v".$rb};
    }
    $rb++;
    }

    //Select three wide receivers for the team
    $wr = 0;
    $y = 0;
    for ($y = 1; $y <= 3;) {
    $res = $mysqli->query("SELECT * FROM values_desc WHERE position = 'WR' ORDER BY value DESC LIMIT $wr,1");
    $res->data_seek(0);
    while ($row = $res->fetch_assoc()) {
      $t_salary = '';
      $t_name = '';
      $t_value = '';
      $t_name = $row['name'];
      $t_salary = floatval($row['salary']);
      $t_value = $row['value'];
      $tot_sal = $tot_sal + $t_salary;

    } if ($tot_sal < $sal_cap) {
    $y++;
    ${"wr_n".$wr} = $t_name;
    ${"wr_s".$wr} = $t_salary;
    ${"wr_v".$wr} = $t_value;
    echo ${"wr_n".$wr};
    echo ${"wr_s".$wr};
    echo ${"wr_v".$wr};
    }
    $wr++;
    }
    //Select one tight-end for the team
    $te = 0;
    $y = 0;
    for ($y = 1; $y <= 1;) {
    $res = $mysqli->query("SELECT * FROM values_desc WHERE position = 'TE' ORDER BY value DESC LIMIT $te,1");
    $res->data_seek(0);
    while ($row = $res->fetch_assoc()) {
      $t_salary = '';
      $t_name = '';
      $t_value = '';
      $t_name = $row['name'];
      $t_salary = floatval($row['salary']);
      $t_value = $row['value'];
      $tot_sal = $tot_sal + $t_salary;

    } if ($tot_sal < $sal_cap) {
    $y++;
    ${"te_n".$te} = $t_name;
    ${"te_s".$te} = $t_salary;
    ${"te_v".$te} = $t_value;
    echo ${"te_n".$te};
    echo ${"te_s".$te};
    echo ${"te_v".$te};
    }
    $wr++;
    }
    //Select one defense/special teams for the team
    $dst = 0;
    $y = 0;
    for ($y = 1; $y <= 1;) {
    $res = $mysqli->query("SELECT * FROM values_desc WHERE position = 'DST' ORDER BY value DESC LIMIT $dst,1");
    $res->data_seek(0);
    while ($row = $res->fetch_assoc()) {
      $t_salary = '';
      $t_name = '';
      $t_value = '';
      $t_name = $row['name'];
      $t_salary = floatval($row['salary']);
      $t_value = $row['value'];
      $tot_sal = $tot_sal + $t_salary;

    } if ($tot_sal < $sal_cap) {
    $y++;
    ${"dst_n".$dst} = $t_name;
    ${"dst_s".$dst} = $t_salary;
    ${"dst_v".$dst} = $t_value;
    echo ${"dst_n".$dst};
    echo ${"dst_s".$dst};
    echo ${"dst_v".$dst};
    }
    $wr++;
    }
    //Select one flex position for the team
    $flex = 0;
    $y = 0;
    for ($y = 1; $y <= 1;) {
    $res = $mysqli->query("SELECT * FROM values_desc WHERE position = 'QB' OR position = 'WR' OR position = 'RB' ORDER BY value DESC LIMIT $flex,1");
    $res->data_seek(0);
    while ($row = $res->fetch_assoc()) {
      $t_salary = '';
      $t_name = '';
      $t_value = '';
      $t_name = $row['name'];
      $t_salary = floatval($row['salary']);
      $t_value = $row['value'];
      $tot_sal = $tot_sal + $t_salary;

    } if ($tot_sal < $sal_cap) {
      if ($t_name != $qb_n0 and $t_name != $rb_n0 and $t_name != $rb_n1 and $t_name != $wr_n0 and $t_name != $wr_n1 and $t_name != $wr_n2 and $t_name != $te_n0 and $t_name != $dst_n0) {
        $y++;
        ${"flex_n".$flex} = $t_name;
        ${"flex_s".$flex} = $t_salary;
        ${"flex_v".$flex} = $t_value;
        echo ${"flex_n".$flex};
        echo ${"flex_s".$flex};
        echo ${"flex_v".$flex};
        }
    $flex++;
    }
  }
        ?>
        <td><?php echo '<strong>Name</strong> '.$qb_n0.' <br><strong>Value</strong> '.$qb_v0.' <br><strong>Salary</strong> '.$qb_s0.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$rb_n0.' <br><strong>Value</strong> '.$rb_v0.' <br><strong>Salary</strong> '.$rb_s0.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$rb_n1.' <br><strong>Value</strong> '.$rb_v1.' <br><strong>Salary</strong> '.$rb_s1.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$wr_n0.' <br><strong>Value</strong> '.$wr_v0.' <br><strong>Salary</strong> '.$wr_s0.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$wr_n1.' <br><strong>Value</strong> '.$wr_v1.' <br><strong>Salary</strong> '.$wr_s1.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$wr_n2.' <br><strong>Value</strong> '.$wr_v2.' <br><strong>Salary</strong> '.$wr_s2.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$te_n0.' <br><strong>Value</strong> '.$te_v0.' <br><strong>Salary</strong> '.$te_s0.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$dst_n0.' <br><strong>Value</strong> '.$dst_v0.' <br><strong>Salary</strong> '.$dst_s0.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>
        <td><?php echo '<strong>Name</strong> '.$flex_n2.' <br><strong>Value</strong> '.$flex_v2.' <br><strong>Salary</strong> '.$flex_s2.' <br><strong>Total Salary</strong> '.$tot_sal; ?></td>

</tr>
