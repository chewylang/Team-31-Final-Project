<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = "select concat(e.firstname, ' ', e.lastname) as name, c.nameShort, ec.dateExp
from employee as e, certification as c, certEmpDetails as ec
where ec.empID = e.empID and ec.certID = c.certID and ec.dateExp < current_date();";
$vars = [];

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$members = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($members, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
