<?php

mysql_connect("localhost", "root","root")
            or die('Could not connect: ' . mysql_error());
  mysql_select_db("chat") or die('Could not select database');
	$usr=$_POST['username'];

/*	$query = "select receiver from privatechat where sender='$usr' union select sender from privatechat where receiver='$usr';";
	$query = "select distinct from ". $query. ";";
*/

	//$query = "select chatdate,receiver from privatechat where sender='$usr' union select chatdate,sender from privatechat where receiver='$usr' order by chatdate;";
	$query = "select sender from privatechat where receiver = '$usr' union select receiver from privatechat where sender='$usr';";
	 $result = mysql_query($query) or die('Query failed: ' . mysql_error());
     
     // Update Row Information
     while ($line = mysql_fetch_array($result))
     {
           $usrs = $usrs ."-" . $line[0];
     }
     
     echo $usrs;
?>	