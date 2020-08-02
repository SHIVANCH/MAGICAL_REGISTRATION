<?php

$comments = 'root';
$dsn = 'mysql:host=localhost; dbname=mydb1';

try {

  $conn = new PDO($dsn, $comments) ;
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

  echo "Fail to connect to the database ".$e->getMessage();

}

?>