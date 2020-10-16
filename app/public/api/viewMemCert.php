<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = "select c.nameShort, c.stdExpire, ce.dateObtained, ce.dateExp
from certification as c, employee as e, certEmpDetails as ce
where ce.certID = c.certID and e.empID = ce.empID and e.firstname = ? and e.lastName = ?";



$stmt = $db->prepare($sql);
$stmt->execute([
  $_GET['firstname'],
  $_GET['lastName']
]);

$members = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($members, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
