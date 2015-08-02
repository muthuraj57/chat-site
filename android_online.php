<?php

     //require_once('dbconnect.php');

     //db_connect();
     
	 mysql_connect("localhost", "root", "root")
            or die('Could not connect: ' . mysql_error());
	mysql_select_db("chat") or die('Could not select database');
     $sql = "select usrname from reg where ontag=1";
     $result = mysql_query($sql) or die('Query failed: ' . mysql_error());
     
     // Update Row Information
     while ($line = mysql_fetch_array($result))
     {
           $usrs = $usrs ."-" . $line[0];
     }
     
     echo $usrs;

?>





