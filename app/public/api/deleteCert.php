<?php

require 'common.php';



// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'delete from certification where nameShort = ?'
);
try{
  $stmt->execute([
    $_GET['nameShort']
  ]);
  echo "Certification Successfully Deleted";
  echo"<br>";
  echo "<a href=\home.html>Home</a>";
}
catch (Exception $e){
  echo "Something went wrong: ", $e->getMessage();
}
