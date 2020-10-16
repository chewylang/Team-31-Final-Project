<?php

require 'common.php';

$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'insert into certification(nameShort, stdExpire) values(?, ?)'
);
try{
  $stmt->execute([
    $_POST['nameShort'],
    $_POST['stdExpire']
  ]);
  echo "Certification Added Successfully";
}
catch (Exception $e){
  echo "Something went wrong: ", $e->getMessage();
}
