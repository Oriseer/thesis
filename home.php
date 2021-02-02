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
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="designs/style.css">
  <link rel="stylesheet" href="https://npm-scalableminds.s3.eu-central-1.amazonaws.com/@scalableminds/chatroom@master/dist/Chatroom.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
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
    <div class="chat-container"></div>
    <script
        src="https://npm-scalableminds.s3.eu-central-1.amazonaws.com/@scalableminds/chatroom@master/dist/Chatroom.js">
    </script>
    <script type="text/javascript">
        var chatroom = new window.Chatroom({
            host: "http://localhost:5005",
            title: "HENRY The AI-assistant",
            container: document.querySelector(".chat-container"),
            welcomeMessage: "HI I am HENRY The Robot Assistant.\n Is there anything I can help you out?",
            speechRecognition: "en-US",
            voiceLang: "en-US"
        });
        chatroom.openChat();
    </script>
  </body>
</html>
