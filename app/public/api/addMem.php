<?php

require 'common.php';

$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'insert into employee(firstname, lastname, gender, addressStreet, addressCity, addressState, adressZip, radioNum, station, email, phone)
  values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);'
);
try{
  $stmt->execute([
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['gender'],
    $_POST['addressStreet'],
    $_POST['addressCity'],
    $_POST['addressState'],
    $_POST['adressZip'],
    $_POST['radioNum'],
    $_POST['station'],
    $_POST['email'],
    $_POST['phone']
  ]);
  try{
    $sql = 'select * from employee where firstname = ? and lastname = ?';

    $stmt = $db->prepare($sql);
    $stmt->execute([
      $_POST['firstname'],
      $_POST['lastname']
    ]);

    $result = $stmt->fetchAll();
  }
  catch (Exception $e){
    echo "Something went wrong1: ", $e->getMessage();
  }
}
catch (Exception $e){
  echo "Something went wrong2: ", $e->getMessage();
}

$json = json_encode($result, JSON_PRETTY_PRINT);
header('Content-Type: application/json');
echo $json;
