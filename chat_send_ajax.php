<?php

     require_once('dbconnect.php');

     db_connect();

     $msg =$_GET["msg"];
    $msg=htmlspecialchars($msg);
     $dt = date("Y-m-d H:i:s");
     $user = $_GET["name"];

     $sql="INSERT INTO publicchat(SENDER,CHATDATE,MSG) " .
          "values(" . quote($user) . "," . quote($dt) . "," . quote($msg) . ");";

          echo $sql;

     $result = mysql_query($sql);
     if(!$result)
     {
        throw new Exception('Query failed: ' . mysql_error());
        exit();
     }

?>