<?php
include "connect.php";

session_start();

session_destroy();

echo  
"
    <script> alert('You have successfully logged out...'); window.location.href='login.php';</script>
";  
?>