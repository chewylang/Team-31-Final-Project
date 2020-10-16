<?php

require 'common.php';

$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'update employee
  set firstname = ? and lastName = ? and gender = ? and addressStreet = ? and addressCity = ? and addressState = ? and addressZip = ? and radioNum = ?
  where empID = ?'
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
    $_POST['radioNum'],
    $_POST['empID']
  ]);
  echo "Member Updated Successfully";
}
catch (Exception $e){
  echo "Something went wrong: ", $e->getMessage();
}
