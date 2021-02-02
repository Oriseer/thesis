
<?php
  // Init session
  session_start();

  // Include db config
  require_once 'db.php';

  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: login.php');
    exit;
  }
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM userinfo where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();

  $msg = null;
  if (empty($data['name'])) {
    $msg = "The ID of your Card is not registered !!!";
    $data['id']=$id;
    $data['name']="--------";
    $data['gender']="--------";
    $data['email']="--------";
    $data['mobile']="--------";
  } else {
    $msg = null;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link   href="designs/style.css" rel="stylesheet">
    <script src="assets1/js/bootstrap.min.js"></script>
  <style>
    td.lf {
      padding-left: 15px;
      padding-top: 12px;
      padding-bottom: 12px;
    }
  </style>
</head>

  <body>

    <center><p style="color:red;"><?php echo $msg;?></p></center>
    <table class="container">
          <tr>
                <tr>
                  <td align="center" class="lf">ID</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center"><?php echo $data['id'];?></td>
                </tr>
                <tr bgcolor="#f2f2f2">
                  <td align="center" class="lf">Name</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center"><?php echo $data['name'];?></td>
                </tr>
                <tr>
                  <td align="center" class="lf">Gender</td>
                  <td style="font-weight:bold">:</td>
                  <td align="centercenter"><?php echo $data['gender'];?></td>
                </tr>
                <tr bgcolor="#f2f2f2">
                  <td align="center" class="lf">Email</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center"><?php echo $data['email'];?></td>
                </tr>
                <tr>
                  <td align="center" class="lf">Mobile Number</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center"><?php echo $data['mobile'];?></td>
                </tr>
          </tr>
        </table>
  </body>
</html>
