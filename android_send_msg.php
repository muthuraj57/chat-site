<?php

	date_default_timezone_set("Asia/Calcutta");
	mysql_connect("localhost", "root", "root")
            or die('Could not connect: ' . mysql_error());
	mysql_select_db("chat") or die('Could not select database');
	

	$sender=$_POST['sender'];
     $receiver = $_POST['receiver'];
	 $msg = $_POST['msg'];
     $msg = htmlspecialchars($msg);
     $dt = date("Y-m-d H:i:s");
     
 
	function quote($strText)
{
    $Mstr = addslashes($strText);
    return "'" . $Mstr . "'";
}
     $sql="INSERT INTO privatechat(CHATDATE,MSG,SENDER,RECEIVER) " .
          "values(" . quote($dt) . "," . quote($msg) . "," .quote($sender) . "," .quote($receiver) . ");";
 
	mysql_error();
     $result = mysql_query($sql);
     if(!$result)
       echo "Failure";
	 else
		echo "Sent";

?>