<?php

     require_once('dbconnect.php');

     db_connect();
	 session_start();
     $user=$_SESSION['usrname'];
     
     $sql="select sender from privatechat where receiver = '$user' union select receiver from privatechat where sender='$user';";
     $result = mysql_query($sql) or die('Query failed: ' . mysql_error());
     if(mysql_num_rows($result)==0)
		 echo "<font style='font-size=18px; color:red'>You have no chat history</font>";
	 else{
	 while ($line = mysql_fetch_array($result))
	 {
		 $temp[]=$line[0];
	 }
	 rsort($temp);
     // Update Row Information
     $msg="<table border='0' style='font-size: 10pt; color: blue; font-family: verdana, arial;'>";
     foreach ($temp as $item)
     {
		 $last_msg=mysql_result(mysql_query("select * from privatechat where (sender='$item' and receiver='$user') or (receiver='$item' and sender='$user') order by id desc limit 1;"),0,2);
		 $emojifc=$last_msg;
		 $size=20;
		 include("emojifc.php");
           $msg = $msg . "<tr><td><a href='private.php?receiver=$item' style='text-decoration:none;'><font style='font-size:18px; color:red'>" . $item . "</font><br><font style='font-size:13px'>".
						$emojifc."</font></a>&nbsp;</td></tr>";
     }
     $msg=$msg . "</table>";
     
     echo $msg;
	 }
?>











