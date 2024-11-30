
<?php
  $servername = "localhost";
  $username = "root";
  $password = "antonio123";
  $dbase = "acid.db";

  $conn = new mysqli($servername, $username, $password, $dbase);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "connected.";
  echo "Connected Succesfully \n";
?>
