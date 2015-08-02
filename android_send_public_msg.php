<?php

	date_default_timezone_set("Asia/Calcutta");
	mysql_connect("localhost", "root", "root")
            or die('Could not connect: ' . mysql_error());
	mysql_select_db("chat") or die('Could not select database');
	
//	require_once('dbconnect.php');
  //   db_connect();

	$sender=$_POST['sender'];
     
	 $msg = $_POST['msg'];
     $msg = htmlspecialchars($msg);
     $dt = date("Y-m-d H:i:s");
     
 
	function quote($strText)
{
    $Mstr = addslashes($strText);
    return "'" . $Mstr . "'";
}
     $sql="INSERT INTO publicchat(CHATDATE,MSG,SENDER) " .
          "values(" . quote($dt) . "," . quote($msg) . "," .quote($sender) . ");";
 
	mysql_error();
     $result = mysql_query($sql);
     if(!$result)
       echo "Failure";
	 else
		echo "Sent";

?>	