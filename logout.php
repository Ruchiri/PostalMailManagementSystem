<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
unset($_SESSION[page]);
session_destroy();
header("Location: login.php");
?>