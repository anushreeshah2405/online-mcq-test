<?php
include('conn/connection.php');
$_SESSION['panel_user'] = array();
unset($_SESSION['panel_user']);
unset($_SESSION['sub_code']);
header("Location: index.php");
exit(0);
?>