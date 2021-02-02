
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
 /* $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
  file_put_contents('UIDContainer.php',$Write);*/
?>

<!DOCTYPE html>
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
<style type="text/css">
    html {
      font-family: Arial;
      display: inline-block;
      margin: 0px auto;
      text-align: center;
    }


    td.lf {
      padding-left: 15px;
      padding-top: 12px;
      padding-bottom: 12px;
    }
</style>


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

    <h4 align="center" id="blink">Please Tag to Display ID or User Data</h4>

    <p id="getUID" hidden></p>

   <div id="show_user_data">

    <table class="container">
          <tr>
                <tr>
                  <td align="center" class="lf">ID</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center">--------</td>
                </tr>
                <tr bgcolor="#f2f2f2">
                  <td align="center" class="lf">Name</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center">--------</td>
                </tr>
                <tr>
                  <td align="center" class="lf">Gender</td>
                  <td style="font-weight:bold">:</td>
                  <td align="centercenter">--------</td>
                </tr>
                <tr bgcolor="#f2f2f2">
                  <td align="center" class="lf">Email</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center">--------</td>
                </tr>
                <tr>
                  <td align="center" class="lf">Mobile Number</td>
                  <td style="font-weight:bold">:</td>
                  <td align="center">--------</td>
                </tr>
          </tr>
        </table>
      </div>

    <script>
      var myVar = setInterval(myTimer, 1000);
      var myVar1 = setInterval(myTimer1, 1000);
      var oldID="";
      clearInterval(myVar1);

      function myTimer() {
        var getID=document.getElementById("getUID").innerHTML;
        oldID=getID;
        if(getID!="") {
          myVar1 = setInterval(myTimer1, 500);
          showUser(getID);
          clearInterval(myVar);
        }
      }

      function myTimer1() {
        var getID=document.getElementById("getUID").innerHTML;
        if(oldID!=getID) {
          myVar = setInterval(myTimer, 500);
          clearInterval(myVar1);
        }
      }

      function showUser(str) {
        if (str == "") {
          document.getElementById("show_user_data").innerHTML = "";
          return;
        } else {
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("show_user_data").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","readuser.php?id="+str,true);
          xmlhttp.send();
        }
      }

      var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 750);
    </script>
  </body>
</html>
