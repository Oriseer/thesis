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
    <script src="assets1/jquery/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
         $("#getUID").load("UIDContainer.php");
        setInterval(function() {
          $("#getUID").load("UIDContainer.php");
        }, 500);
      });
    </script>

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
  <div class="container">
    <h1>Cardholder Registration</h1>
<div class="wpcf7" id="wpcf7-f156-p143-o1 formwrap">
    <form action="insert.php" method="post" class="wpcf7-form">
        <p>
           <span class="wpcf7-form-control-wrap Message">
            <textarea id="getUID" name="id" cols="20" rows="5" class="wpcf7-form-control wpcf7-textarea" placeholder="Please Tag your Card to display ID" readonly></textarea>
          </span>
           <span class="wpcf7-form-control-wrap Name">
             <input type="text" name="name" value="" size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name" required>
          </span>
          <span class="wpcf7-form-control-wrap Subject flat">
            <select name="gender" class="indent wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </span>
          <span class="wpcf7-form-control-wrap Email">
            <input type="email" name="email"  size="40" class="emailinput wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email" required>
          </span>
          <span class="wpcf7-form-control-wrap Email">
            <input type="text" name="mobile"  size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Mobile" required>
          </span>
          <input type="submit" class="wpcf7-form-control wpcf7-submit btn1">
          <img class="ajax-loader" src="http://www.jordancundiff.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;">
      </p>
      <div class="wpcf7-response-output wpcf7-display-none">
      </div>
  </form>
</div>
  </div>
  </body>
</html>
