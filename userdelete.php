<?php
    require 'database.php';
    $id = 0;

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM userinfo  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: userdata.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="assets1/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets1/js/bootstrap.min.js"></script>
  <title></title>
</head>

<body>

    <div class="container">

    <div class="span10 offset1">
      <div class="row">
        <h3 align="center">Delete User</h3>
      </div>

      <form class="form-horizontal" action="userdelete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <p class="alert alert-error">Are you sure to delete ?</p>
        <div class="form-actions">
          <button type="submit" class="btn btn-danger">Yes</button>
          <a class="btn" href="userdata.php">No</a>
        </div>
      </form>
    </div>

    </div> <!-- /container -->
  </body>
</html>
