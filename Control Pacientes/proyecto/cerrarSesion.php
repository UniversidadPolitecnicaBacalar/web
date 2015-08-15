<?php
@session_start();
session_destroy();
header("Location: login.html");
$_SESSION['loggedin'] =true;
?>