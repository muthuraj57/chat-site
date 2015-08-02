<?php


function db_connect()
{

  date_default_timezone_set("Asia/Calcutta");

  $link = mysql_connect("mysql14.000webhost.com", "a4866257_muthu","Muthu_Sattur")
            or die('Could not connect: ' . mysql_error());
  mysql_select_db("a4866257_chat") or die('Could not select database');
  return true;
}



function quote($strText)
{
    $Mstr = addslashes($strText);
    return "'" . $Mstr . "'";
}


function isdate($d)
{
   $ret = true;
   try
   {
       $x = date("d",$d);
   }
   catch (Exception $e)
   {
       $ret = false;
   }
   echo $x;
   return $ret;
}

 
?>
