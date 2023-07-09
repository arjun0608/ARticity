<?php
    $con = new mysqli("localhost","root","","ARticity");
    if($con->connect_error) {
        die("Database failed to connect...".$con->connect_error);
    }
    else
    {
        // echo "Connected";
    }
?>