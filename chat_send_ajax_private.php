<?php

     require_once('dbconnect.php');
     session_start();
     db_connect();
     $usr=$_SESSION['usrname'];
     $msg = $_GET["msg"];
     $dt = date("Y-m-d H:i:s");
     $receiver = $_GET["name"];

     $sql="INSERT INTO privatechat(CHATDATE,MSG,SENDER,RECEIVER) " .
          "values(" . quote($dt) . "," . quote($msg) . ",".quote($usr)."," . quote($receiver) . ");";

          echo $sql;

	mysql_error();
     $result = mysql_query($sql);
     if(!$result)
     {
        throw new Exception('Query failed: ' . mysql_error());
        exit();
     }

?>





