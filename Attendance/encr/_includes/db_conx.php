<?php
$db_conx = mysqli_connect("localhost", "root", "AdminDB", "db");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
} ;
?>
