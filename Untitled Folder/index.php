<?php
session_start();
if(!isset($_SESSION['memuser']))
 $IT=$_SESSION['memuser'];
else
 $IT="Gossip";
?><html>
<head><title><?php echo $TT ?></title></head>
<body>
<center><table border="0" width="75%" cellpadding="1" cellspacing="1">
	<tr>
		<td><center><table border="0" width="100%" height="5%" cellpadding="0" cellspacing="0">
						<tr>
							<td><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/bg.jpg" width="700" height="200" longdesc="images/bg.jpg" /></div></td></tr></table></center></td>
	</tr>
	<tr><td align="center" background="images/bof_01.jpg"><a href="indexx.html"><img src="images/bof_00.jpg"></a><a href="register.php"><img src="images/bof_02.jpg"></a><a href="index.php"><img src="images/bof_03.jpg"></a><img src="images/bof_04.jpg"><img src="images/bof_05.jpg"><img src="images/bof_06.jpg"></td></tr>
</table></center>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<form name="memlogin" method="post" action="check_user_login.php" enctype="multipart/form-data">
<center><table width='25%' border='0' align='center' cellpadding='0' cellspacing='0'>
    <tr> 
      <td colspan='2'><div align='center'><font size='2' face='verdana' color='blue'><img src="images/newuser.JPG"><b>Members Login</b></font></div></td>
    </tr>
	<tr> 
      <td height='21' colspan='2'> <div align='center'> 
          <hr>
        </div></td>
    </tr>
    <tr> 
      <td width='35%' height='27'><font size='2' face='verdana'>Username</font></td>
      <td width='65%'><font size='2' face='verdana'> 
        <input name='fusername' type='text' id='fusername' size='22'>
        </font></td>
    </tr>
    <tr> 
      <td height='24'><font size='2' face='verdana'>Password</font></td>
      <td><font size='2' face='verdana'> 
        <input name='fpass' type='password' id='fpass' size='22'>
        </font></td>
    </tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="image" src="images/login3.jpg" name="memlogin"></td>
    </tr>
	<tr>
		<td>&nbsp;</td>
		<td><div align='center'><font size='2' face='verdana'><a href="./forgottenpassword.php">Forgot Password</a></font></div></td>
	</tr>
    <tr> 
      <td height='21' colspan='2'> <div align='center'> 
          <hr>
        </div></td>
    </tr>
    <tr> 
      <td colspan='2'><div align='center'><font size='2' face='verdana'><a href="register.php"><img src="images/register.jpg"></a></font></div></td>
    </tr></table></center>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<center><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
    <tr> 
      <td colspan="2" valign="bottom"><hr></td>
    </tr>
    <tr> 
      <td colspan="2" valign="bottom"><div align="center"><font size="2" face="verdana">Developed By <a href="about.php">Team Fraternity</a></font></div></td>
    </tr>
  </table></center>
</form>
</body>
</html>
