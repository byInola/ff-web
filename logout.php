<?php
session_start();

$_SESSION["authenticated"] = false;
session_unset();

header("Location: login.php");
exit;
?>