<?php
    //Create Database connection
    $db = mysql_connect("localhost","root","");
    if (!$db) {
        die('Could not connect to db: ' . mysql_error());
    }
 
    //Select the Database
    mysql_select_db("test",$db);
    
    //Active Accounts Query
    $result = mysql_query("SELECT a.company_name AS User, COUNT(ref) AS Date FROM customer_accounts a, bitt_site_logger WHERE account_id = a.companyid AND a.company_name <> 'RMG' AND a.support_exp >= curdate() AND ref LIKE 'http://support.unitask.us/index.php?pg=login%' GROUP BY User ORDER BY Date DESC;
", $db);  
    
    //Create an array
	$endpoint = 'https://app.cyfe.com/api/push/55198d04446802513719081122352';
	
    $data = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['User'] = $row['User'];
        $row_array['Date'] = $row['Date'];
        
        //push the values in the array
        array_push($data,$row_array);
	}
	foreach($data as $x => $x_value) {
    echo "User=" . $x . ", Date=" . $x_value;
    echo "<br>";
}
	//Cyfe Configurations
	$data['data'][] = array('Date' => '', 'User' => '');
	$data['onduplicate'] = array('User' => 'replace');
	$data['color'] = array('User' => '#52ff7f');
	$data['type'] = array('User' => 'line');
	
	
	//Print Array
	//$data_string = json_encode($data);
	//Testing Variables
	echo 'data '.$data.'<br>';
	echo '<br>';
	echo 'data string '.$data_string.'<br>';
	echo '<br>';
	
	//Curl Settings
	$ch = curl_init();                                                                      
    curl_setopt($ch, CURLOPT_URL, $endpoint);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close ($ch);
	echo 'status '.$status.'<br>';
	if(stripos($status, '200') !== false)
        echo 'success';
    else
        echo 'failure';
    //Close the database connection
    fclose($db);
 
?>