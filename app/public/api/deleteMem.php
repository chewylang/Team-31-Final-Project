<?php

require 'common.php';



// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'delete from employee where empID = ?;'
);
try{
  $stmt->execute([
    $_POST['empID']
  ]);
  echo "Member Successfully Deleted";
}
catch (Exception $e){
  echo "Something went wrong: ", $e->getMessage();
}
