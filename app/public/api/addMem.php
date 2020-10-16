<?php

require 'common.php';

$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'insert into employee(firstname, lastname, gender, addressStreet, addressCity, addressState, adressZip, radioNum)
  values(?, ?, ?, ?, ?, ?, ?, ?);'
);
try{
  $stmt->execute([
    $_POST['firstName'],
    $_POST['lastName'],
    $_POST['gender'],
    $_POST['addressStreet'],
    $_POST['addressCity'],
    $_POST['addressState'],
    $_POST['addressZip'],
    $_POST['radioNum']
  ]);
  echo "Member Added Successfully";
}
catch (Exception $e){
  echo "Something went wrong: ", $e->getMessage();
}
