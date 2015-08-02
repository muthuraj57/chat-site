<?php

mysql_connect("localhost", "root", "root")
            or die('Could not connect: ' . mysql_error());
	mysql_select_db("chat") or die('Could not select database');
 $usrname=$_GET['usrname'];
 mysql_query("update reg set ontag=0 where usrname='$usrname'");

?>