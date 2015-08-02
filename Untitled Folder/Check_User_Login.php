<?PHP
session_start();
$username=$HTTP_POST_VARS['fusername'];
$password=$HTTP_POST_VARS['fpass'];

if (!$username || !$password){
include("./error1.php");
echo "<div align='center'><img src='./images/progress_med2.gif'>";
echo "<center>Please enter your username and password.<p><a href='javascript:window.history.go(-1)'><B><img src='./images/goback.jpg' border='0'></B></a>";
  include("./error2.php");
exit;
}
$username = addslashes($username);
$password = addslashes($password);

include("./DB/config.php");

//$Passworld=MD5($password);
$pass = MD5($password);
$query = "SELECT * FROM member WHERE Username = '$username' AND Password = '$pass'";

$results = mysql_query($query);

if(mysql_num_rows($results) <= 0) {
		include("./error1.php");
		echo "<div align='center'><img src='./images/progress_med2.gif'>";
		echo "<center>Username or password was incorrect! Please try again later.<P><a href='javascript:window.history.go(-1)'><B><img src='./images/goback.jpg' border='0'></B></a> </center>";
		include("./error2.php");
	} 
	else 

	{
		$_SESSION['memuser']=$username;
		$_SESSION['mempass']=$password;
		$_SESSION['memtime']=time();
		$_SESSION['memkey']=MD5($username).MD5($password).MD5(time());
		session_write_close();
		header('location:./home.php'.SID);
	EXIT();
	}
	
?>