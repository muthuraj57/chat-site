<?php
include "dbconnect.php";
db_connect();
session_start();
 $usrname=$_SESSION['usrname'];
 mysql_query("update reg set ontag=0 where usrname='$usrname'");
session_unset();
session_destroy();
header('location:index.php');
?>
