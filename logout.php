<?php

Session_start();
Session_destroy();
// unset($_SESSION['admin']);
echo $_SESSION["login"];
header('location:./index.php');


?>