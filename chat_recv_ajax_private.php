<?php
	include "check.php";
     require_once('dbconnect.php');

     db_connect();
     session_start();
     $sender=$_SESSION['usrname'];
     $receiver=$_GET["name"];
     
     $sql=" SELECT chatdate, msg, sender from privatechat where receiver='$receiver' and sender='$sender' union select chatdate, msg, sender from privatechat where receiver='$sender' and sender='$receiver' order by chatdate";
     //$sql = "SELECT *, date_format(chatdate,'%d-%m-%Y %r') as cdt from (" .$sql .") order by chatdate desc limit 200";
     $sql = "SELECT * FROM (" . $sql . ") as ch order by chatdate limit 200";
     $result = mysql_query($sql) or die('Receiver name is incorrect');
     
     // Update Row Information
     $msg="<table border='0' style='font-size: 10pt; color: blue; font-family: verdana, arial;'>";
     while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
     {
		 $emojifc=$line["msg"];
		 $size=20;
		 include("emojifc.php");
           $msg = $msg . "<tr><td>" . $line["chatdate"] . "&nbsp;</td>" .
                "<td>" . $line["sender"] . ":&nbsp;</td>" .
                "<td>" . $emojifc . "</td></tr>";
     }
     $msg=$msg . "</table>";
     
     echo $msg;

?>





