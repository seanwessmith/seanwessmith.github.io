<?PHP

// Connect to the data source

$db_user  = "seansql";
$db_password = "unismith2015";
$db_database = "unimaster15";
$db_server = "localhost";

mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database) or die( "Unable to select database");

$query = "SELECT a.company_name AS User, COUNT(ref) AS count FROM customer_accounts a, bitt_site_logger WHERE account_id = a.companyid AND a.company_name <> 'RMG' AND a.support_exp >= curdate() AND ref LIKE 'http://support.unitask.us/index.php?pg=login%' GROUP BY User ORDER BY count DESC";
$result = mysql_query($query);

echo print_r($result);

$incoming_data = array();

while($row = mysql_fetch_array($result))
	$incoming_data[str_replace(',', '', $row['User'])] = $row['count'];
echo '$incoming_data minus commas in User '.json_encode($incoming_data).'<br>';

// Load up the data into an array as follows
$data = array();
$data[] = 'User, Count';
var_dump(count($arr));
/*
if(count($incoming_data) > 0)
{
	for($i=29; $i>=0; $i--)
	{
			$data[] = $count.','.$incoming_data[$count];
	}
}
*/
$data[] = 'Color,#ff7f00';

// Output the data as follows
$imploded = implode("\n", $data);
print '<pre>';
echo $imploded;
print '</pre>';
 ?>