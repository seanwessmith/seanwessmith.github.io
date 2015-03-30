<?php
// mysql
$mysqli = new mysqli("curly.unitask.com", "seansql", "unismith2015", "unimaster15");
$result = $mysqli->query("select a.TOTAL, b.UOD, c.UMD, d.BOTH_PRODUCTS, e.INACTIVE FROM (SELECT COUNT(a.company_name) as TOTAL FROM customer_accounts a WHERE a.support_exp > curdate() AND a.company_name NOT LIKE '%Unitask%') a,

(SELECT COUNT(concat_both) AS UOD FROM (SELECT GROUP_CONCAT(b.unitask_product) AS concat_both FROM 
customer_accounts a, customer_products b WHERE a.companyid = b.companyid and a.support_exp > curdate() AND
a.company_name <> 'Unitask, Inc.' GROUP BY a.company_name) AS t WHERE concat_both = '1') b, 

(SELECT COUNT(concat_both) AS UMD FROM (SELECT GROUP_CONCAT(b.unitask_product) AS concat_both FROM 
customer_accounts a, customer_products b WHERE a.companyid = b.companyid and a.support_exp > curdate() AND 
a.company_name <> 'Unitask, Inc.' GROUP BY a.company_name) AS t WHERE concat_both = '2') c,

(SELECT COUNT(concat_both) AS BOTH_PRODUCTS FROM (SELECT GROUP_CONCAT(b.unitask_product) AS concat_both FROM
customer_accounts a, customer_products b WHERE a.companyid = b.companyid and a.support_exp > curdate() AND 
a.company_name <> 'Unitask, Inc.' GROUP BY a.company_name) AS t WHERE concat_both = '1,2' OR concat_both = '2,1') d,

(SELECT COUNT(a.company_name) AS INACTIVE FROM customer_accounts a WHERE a.support_exp < curdate() AND a.company_name <> 'Unitask, Inc.') e");
$row = $result->fetch_assoc();
echo htmlentities($row['_message']);
?>
