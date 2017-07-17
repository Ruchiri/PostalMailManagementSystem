<?php

session_start();
unset($_SESSION[page]);
session_destroy();
header("Location: login.php");
?>