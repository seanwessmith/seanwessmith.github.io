<?php
    //Create Database connection
    $db = mysql_connect("localhost","root","");
    if (!$db) {
        die('Could not connect to db: ' . mysql_error());
    }
 
    //Select the Database
    mysql_select_db("test",$db);
    
    //Replace * in the query with the column names.
    $result = mysql_query("select a.TOTAL, b.UOD, c.UMD, d.BOTH_PRODUCTS, e.INACTIVE FROM (SELECT COUNT(a.company_name) as TOTAL FROM customer_accounts a WHERE a.support_exp > curdate() AND a.company_name NOT LIKE '%Unitask%') a,

(SELECT COUNT(concat_both) AS UOD FROM (SELECT GROUP_CONCAT(b.unitask_product) AS concat_both FROM 
customer_accounts a, customer_products b WHERE a.companyid = b.companyid and a.support_exp > curdate() AND
a.company_name <> 'Unitask, Inc.' GROUP BY a.company_name) AS t WHERE concat_both = '1') b, 

(SELECT COUNT(concat_both) AS UMD FROM (SELECT GROUP_CONCAT(b.unitask_product) AS concat_both FROM 
customer_accounts a, customer_products b WHERE a.companyid = b.companyid and a.support_exp > curdate() AND 
a.company_name <> 'Unitask, Inc.' GROUP BY a.company_name) AS t WHERE concat_both = '2') c,

(SELECT COUNT(concat_both) AS BOTH_PRODUCTS FROM (SELECT GROUP_CONCAT(b.unitask_product) AS concat_both FROM
customer_accounts a, customer_products b WHERE a.companyid = b.companyid and a.support_exp > curdate() AND 
a.company_name <> 'Unitask, Inc.' GROUP BY a.company_name) AS t WHERE concat_both = '1,2' OR concat_both = '2,1') d,

(SELECT COUNT(a.company_name) AS INACTIVE FROM customer_accounts a WHERE a.support_exp < curdate() AND a.company_name <> 'Unitask, Inc.') e;
", $db);  
    
    //Create an array
    $json_response = array();
	echo $json_response;
    
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['TOTAL'] = $row['TOTAL'];
        $row_array['UOD'] = $row['UOD'];
        $row_array['UMD'] = $row['UMD'];
        $row_array['BOTH_PRODUCTS'] = $row['BOTH_PRODUCTS'];
        $row_array['INACTIVE'] = $row['INACTIVE'];
        
        //push the values in the array
        array_push($json_response,$row_array);
    }
    echo json_encode($json_response);
    
    //Close the database connection
    fclose($db);
 
?>