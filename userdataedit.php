<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="designs/style.css" rel="stylesheet">
    <script src="assets1/js/bootstrap.min.js"></script>



    <title></title>

  </head>

  <body>

    <h1>Update Cardholder</h1>
<div style="overflow-x:auto;">
<div class="wpcf7" id="wpcf7-f156-p143-o1 formwrap">
  <p id="defaultGender" hidden><?php echo $data['gender'];?></p>
    <form action="useredittb.php?id=<?php echo $id?>" method="post" class="wpcf7-form">
        <p>
           <span class="wpcf7-form-control-wrap Message">
            <input type="text" name="id" size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name" value="<?php echo $data['id'];?>">
          </span>
           <span class="wpcf7-form-control-wrap Name">
             <input type="text" name="name" size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name" value="<?php echo $data['name'];?>">
          </span>
          <span class="wpcf7-form-control-wrap Subject flat">
            <select name="gender" class="indent wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" id="mySelect">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </span>
          <span class="wpcf7-form-control-wrap Email">
            <input type="email" name="email"  size="40" class="emailinput wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email" value="<?php echo $data['email'];?>">
          </span>
          <span class="wpcf7-form-control-wrap Email">
            <input type="text" name="mobile"  size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Mobile" value="<?php echo $data['mobile'];?>">
          </span>
          <button type="submit" class="wpcf7-form-control wpcf7-submit btn1" href="userdata.php">Back</button>
          <input type="submit" class="wpcf7-form-control wpcf7-submit btn1">
      </p>
  </form>
</div>
</div>

    <script>
      var g = document.getElementById("defaultGender").innerHTML;
      if(g=="Male") {
        document.getElementById("mySelect").selectedIndex = "0";
      } else {
        document.getElementById("mySelect").selectedIndex = "1";
      }
    </script>
  </body>
</html>

