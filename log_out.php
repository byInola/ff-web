<?php
session_start();

$_SESSION["authenticated"] = false;
session_unset();

header("Location: log_in.php");
exit;
?>