<?php

     require_once('dbconnect.php');

     db_connect();
     
     $sql = "select usrname from reg where ontag=1";
     $result = mysql_query($sql) or die('Query failed: ' . mysql_error());
     
     // Update Row Information
     $usrs="<table border='0' style='font-size: 10pt; color:brown ; font-family: verdana, arial;'>";
     while ($line = mysql_fetch_array($result))
     {
           $usrs = $usrs . "<tr><td>" . $line[0] . "&nbsp;</td>";
     }
     $usrs=$usrs . "</table>";
     
     echo $usrs;

?>





