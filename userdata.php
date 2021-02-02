
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
  $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
  file_put_contents('UIDContainer.php',$Write);
?>
<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="designs/style.css">


<div class="nav">
  <div class="nav-title">
    <h1>ADSMS</h1>
  </div>

  <div class="nav-menu">
    <ul>
      <li> <a href="home.php">Home <span
class="sr-only">(current)</span></a> </li>
 <li> <a href="userdata.php">User Data</a> </li>
  <li>
<a href="registration.php">Card Reg</a> </li>
 <li> <a href="read.php">Read ID</a> </li>
<li> <a href="logs.php">logs</a> </li>
 <li> <a href="logout.php">logout</a> </li>
    </ul>
  </div>
</div>


    <title></title>
  </head>

  <body>

    <br>
<br>

<table class="container">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">ID</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM userinfo ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
              echo '<td>'. $row['email'] . '</td>';
              echo '<td>'. $row['mobile'] . '</td>';
              echo '<td><a class="btn btn-primary" href="userdataedit.php?id='.$row['id'].'">Edit</a>';
              echo ' ';
              echo '<a class="btn btn-danger" data-id='.$row['id'].' onclick="confirmDelete(this);" >Delete</a>';
              echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>

  </tbody>
</table>

<!-- Button trigger modal -->
<!--
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Delete User</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this user ?</p>
                <form method="POST" action="deletetest.php" id="form-delete-user">
                    <input type="hidden" name="id">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="form-delete-user" name="delete" class="btn btn-danger">Delete</button>
            </div>

        </div>
    </div>
</div>
 -->
 <form method="POST" action="deletetest.php" id="form-delete-user">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Cardholder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this user ?</p>
        <input type="hidden" name="id">
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="form-delete-user" name="delete" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript">
   function confirmDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete-user").id.value = id;
    $("#myModal").modal("show");
}
</script>
  </body>
</html>
