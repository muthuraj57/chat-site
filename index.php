<?php
  if($_POST['submit']!="")
  {
  if(empty($_POST['usr']))
{
   $ckname="Plz enter username";
}
  elseif(empty($_POST['pswrd']))
{
   $ckpswrd="Enter your password";
}
  else
{
 require_once('dbconnect.php');

     db_connect();
 $usrname=$_POST['usr'];
 $pswrd=$_POST['pswrd'];
 
 $pd=mysql_query("select password('$pswrd')");
 $pq=mysql_fetch_array($pd);
 
 if (filter_var($usrname, FILTER_VALIDATE_EMAIL)){
	  $qry = mysql_query("select pswrd from reg where email='$usrname'");
	  $res = mysql_query("select usrname from reg where email = '$usrname'");
	  $res = mysql_fetch_array($res);
	  $usrname = $res[0];
 }
 else
	$qry=mysql_query("select pswrd from reg where usrname='$usrname'");
 $fetch=mysql_fetch_array($qry);
 
 if(strcmp($pq[0],$fetch[0])=='0')
{
 session_start();
 $_SESSION['usrname']=$usrname;
 mysql_query("update reg set ontag=1 where usrname='$usrname'");
 header('location:select.php');  
}
 else
  echo "<font color=red>Login error:Check your details.</font>";
}
}
?>
<html>
 <title>Chat|Login Page</title>
	<link rel="icon" href="images/goss.ico" type="image/x-icon">
<body bgcolor="#800033"> 
 <form action="index.php" method="POST">
 <a href="reg.php"><img src='images/reg.jpeg' align=right width='100'></a>
 <!--<b align=left>New user Register <a href="reg.php">here</a></b>-->
 <center><b style="font-size:30px;color:red">Chat with mates</b></center><br><br><br><br>
 <center><table>
 <tr><th style="color:green">Username</th><td><input type="text" name="usr" value="<?=$_POST['usr']?>" autofocus="autofocus"><font color=red><?=$ckname?></font></td></tr>
 <tr><th style="color:green">Password</th><td><input type="password" name="pswrd" value="<?=$_POST['pswrd']?>"><font color=red><?=$ckpswrd?></font></td></tr>
 </table>
 <input type="submit" name="submit" value="Login">
 <input type="reset" name="reset" value="Clear">

</body>
</html>
