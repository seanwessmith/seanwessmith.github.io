<?PHP

// Connect to the data source

$db_user  = "root";
$db_password = "";
$db_database = "test";
$db_server = "localhost";

mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database) or die( "Unable to select database");

$query = "SELECT date_registered, COUNT(*) as count FROM example_customers GROUP BY date_registered ORDER BY date_registered ASC";
$result = mysql_query($query);

$incoming_data = array();

while($row = mysql_fetch_array($result))
	$incoming_data[str_replace('-', '', $row['date_registered'])] = $row['count'];

// Load up the data into an array as follows

$data = array();
$data[] = 'Date,Customers';

if(count($incoming_data) > 0)
{
	for($i=29; $i>=0; $i--)
	{
		$date = date('Ymd', strtotime('-'.$i.' day'));
		
		if(array_key_exists($date, $incoming_data))
			$data[] = $date.','.$incoming_data[$date];
		else
			$data[] = $date.',0';
	}
}

$data[] = 'Color,#ff7f00';

// Output the data as follows

echo implode("\n", $data);

?>