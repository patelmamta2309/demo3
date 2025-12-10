<?php 
    $database = "hp";
    $dbusername = "root";
    $dbpassword = "";
    $server = "localhost";
    $connection = mysqli_connect($server, $dbusername, $dbpassword, $database);
      if (!$connection) {
                    echo "Connection failed!";
                }
?>