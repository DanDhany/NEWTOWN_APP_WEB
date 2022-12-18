<?php
session_start();
session_destroy(); 
unset($_COOKIE['user']);
unset($_COOKIE['pass']);
header('Location: login.php');
?>