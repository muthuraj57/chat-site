<?php
  
mysql_connect("localhost", "root", "root")
            or die('Could not connect: ' . mysql_error());
	mysql_select_db("chat") or die('Could not select database');

//require_once('dbconnect.php');
//db_connect();
 $usrname=$_GET['username'];
 $pswrd=$_GET['password'];
 
 $pswrd=mysql_query("select password('$pswrd')");
 $pswrd=mysql_fetch_array($pswrd);
 
 if (filter_var($usrname, FILTER_VALIDATE_EMAIL)){
	  $qry = mysql_query("select pswrd from reg where email='$usrname'");
	  $res = mysql_query("select usrname from reg where email = '$usrname'");
	  $res = mysql_fetch_array($res);
	  $usrname = $res[0];
 }else
	$qry=mysql_query("select pswrd from reg where usrname='$usrname'");
 $fetch=mysql_fetch_array($qry);
 
 if(strcmp($pswrd[0],$fetch[0])=='0')
{
 session_start();
 $_SESSION['usrname']=$usrname;
 $_SESSION['pswrd']=$_GET['password'];

 mysql_query("update reg set ontag=1 where usrname='$usrname'");
 echo $usrname;
}
 else
  echo "Login error:Check your details";
?>