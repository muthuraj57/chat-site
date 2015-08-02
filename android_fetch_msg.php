<?php
 
	mysql_connect("localhost", "root", "root")
            or die('Could not connect: ' . mysql_error());
	mysql_select_db("chat") or die('Could not select database');
 
     $sender=$_POST['sender'];
     $receiver=$_POST["receiver"];
 
	$sql=" SELECT chatdate, msg, sender from privatechat where sender='$sender' and receiver='$receiver' union select chatdate, msg, sender from privatechat where sender='$receiver' and receiver='$sender'";
     //$sql = "SELECT *, date_format(chatdate,'%d-%m-%Y %r') as cdt from (" .$sql .") order by chatdate desc limit 200";
     $sql = "SELECT * FROM (" . $sql . ") as ch order by chatdate limit 200";
     $result = mysql_query($sql) or die('Query failed: ' . mysql_error());
 
     // Update Row Information
     $msg="";
     while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
     {
           $msg = $msg .$line["sender"].":     ".$line["msg"]."-";
     }
 
 
     echo $msg;
 
 
?>