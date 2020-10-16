<?php

require 'common.php';

$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'update certification
  set nameShort = ? and stdExpire = ?
  where certID = ?'
);
try{
  $stmt->execute([
    $_POST['nameShort'],
    $_POST['stdExpire'],
    $_POST['certID']
  ]);
  echo "Certification Added Successfully";
}
catch (Exception $e){
  echo "Something went wrong: ", $e->getMessage();
}
