<?php
  $UIDresult=$_POST["UIDresult"];
  $Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
  file_put_contents('UIDContainer.php',$Write);

require 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM userinfo where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($UIDresult));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();

  if (empty($data)) {
}
  else{
      $arr = array('a' => 1);
      $json=json_encode($arr,true);
      echo "$json";
    }
  }



?>

