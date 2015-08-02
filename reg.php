<?php
  require_once('dbconnect.php');

     db_connect();
  $fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
$email=$_POST['email'];
$usrname=$_POST['usrname'];
$pswrd=$_POST['pswrd'];
$qry=mysql_query("select count(*) from reg where usrname='$usrname'");
$fetch=mysql_fetch_array($qry);
  if($_POST['submit']!="")
  {	
 	 if(empty($_POST['fname']))
{
  	 $ckfname="Plz enter first name";
}
	elseif(empty($_POST['lname']))
{
  	 $cklname="Plz enter last name";
}
  	elseif(empty($_POST['email']))
{
   	$ckemail="Enter your email";
}
	elseif (!ereg("^.+@.+\\..+$",$_POST['email']))
{
	$ckemail="Please enter valid email";
}
  	elseif(empty($_POST['usrname']))
{
  	 $ckusrname="Enter your username";
}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$_POST['usrname'])) {
  $ckusrname = "Only letters and numbers allowed"; 
}
        elseif($fetch[0])
	 $ckusrname="Username already exists";
  	elseif(empty($_POST['pswrd']))
{
  	 $ckpswrd="Enter your password";
}
  	elseif(empty($_POST['repswrd']))
{
   	$ckrepswrd="Retype your password";
}
	elseif($_POST['pswrd']!=$_POST['repswrd'])
		$ckrepswrd="Password not match";
  else
{
$qry=mysql_query("insert into reg values('$fname','$lname','$gender','$dob','$email','$usrname', password('$pswrd'), 0)");
if($qry)
  echo "<script>alert('Successfully Registered :-)')</script>";
else 
 echo "Error"; 
}
}
?>
<html>
 <title>Registration Form</title>
<link rel="icon" href="images/goss.ico" type="image/x-icon">
<body background='images/kj.jpg'>
 <form action="reg.php" method="POST">
 <center><b style="font-size:30px">Registration Form</b></center><br><br><br>
 <center><table bgcolor=grey border=1>
  <tr>
   <th>First Name</th><td><input type="text" size="12" name='fname' value="<?=$_POST['fname']?>"><?=$ckfname?></td>
  </tr>
  <tr>
   <th>Last Name</th><td><input type="text" size="12" name='lname' value="<?=$_POST['lname']?>"><?=$cklname?></td>
  </tr>
  <tr>
   <th>Gender</th><td>Male<input type="radio" name='gender' value="Male">Female<input type="radio" name="gender" value="Female"></td>
  </tr>
  <tr>
   <th>DOB</th><td><select name='date' value=" ">
  <?php
   for($i=1;$i<=31;$i++)
    echo "<option value='$i'>$i</option>";
   echo "</select><select name='month'>";
   for($i=1;$i<=12;$i++)
    echo "<option value='$i'>$i</option>";
   echo "</select><select name='year'>";
   for($i=1980;$i<=2000;$i++)
    echo "<option value='$i'>$i</option>";
   echo "</select>"; 
  ?>
   </td>
  </tr>
  <tr>
   <th>Email</th><td><input type="email" size='12' name='email' value="<?=$_POST['email']?>"><?=$ckemail?></td>
  </tr>
  <tr>
   <th>Username</th><td><input type="text" size='12' name='usrname' value="<?=$_POST['usrname']?>" maxlength="15"><?=$ckusrname?></td>
  </tr>
  <tr>
   <th>Password</th><td><input type="password" size='12' name='pswrd' value="<?=$_POST['pswrd']?>"><?=$ckpswrd?></td>
  </tr>
  <tr>
   <th>Re-type Password</th><td><input type="password" size='12' name='repswrd' value="<?=$_POST['repswrd']?>"><?=$ckrepswrd?></td>
  </tr>
</table>
<input type="submit" name='submit' value='Submit'><input type="reset" name="reset" value="Reset"><br>
 <center><h3>Note: Don't include space or special characters in username</h3></center>
<h3> Existing users click <a href="index.php">here</a> to login.</h3>
