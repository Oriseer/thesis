<?php
require 'database.php';
require 'UIDcontainer.php';


 $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM userinfo where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($UIDresult));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();

  if (empty($data['name'])) {
      if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
          $arr = array('state' => "on");
          $json=json_encode($arr,true);}


  echo ("$json")
  } else {
      if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
          $arr = array('state' => "off");
          $json=json_encode($arr,true);}


  echo ("$json")
  }

 ?>
