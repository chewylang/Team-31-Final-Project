<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = "select concat(e.firstname, ' ', e.lastname) as fullname, s.stationNum, e.radioNum, m.email
from station as s, employee as e, employeeStation as es, empEmail as m
where m.empID = e.empID and e.empID = es.empID and s.stationNum = es.stationNum and m.type = 'work'
group by fullname";

$vars = [];

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$members = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($members, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
