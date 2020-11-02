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

  try{
    $sql = 'select * from certification where nameShort = ?';

    $stmt = $db->prepare($sql);
    $stmt->execute([
      $_POST['nameShort']
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
