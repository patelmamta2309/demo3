<?php 
session_unset();
session_abort();
session_destroy();
header("Location: /hp/auth/login.php");
?>