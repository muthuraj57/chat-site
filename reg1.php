<?php
$fname=$_GET["fname"];
$lname=$_GET["lname"];	
$gender=$_GET["gender"];
$date=$_GET["year"]."-".$_GET["month"]."-".$_GET["date"];
$qual=$_GET["qual"]." ".$_GET["qual1"]." ".$_GET["qual2"];
$city=$_GET["city"];
$usrname=$_GET["usrname"];
/*echo "First Name : ".$fname."<br>";
echo "Last Name : ".$lname."<br>";
echo "Gender : ".$gender."<br>";
echo "DOB : ".$date."<br>";
echo "Qualification : ".$qual."<br>";
echo "City : ".$city."<br>";
echo "Username : ".$usrname."<br>";*/
echo "<table>
 <tr><td>First Name</td><td>$fname</td></tr>
 <tr><td>Last Name</td><td>$lname</td></tr>
 <tr><td>Gender</td><td>$gender</td></tr>
 <tr><td>DOB</td><td>$date</td></tr>
 <tr><td>Qualification</th><td>$qual</td></tr>
 <tr><td>City</td><td>$city</td></tr>
 <tr><td>Username</td><td>$usrname</td></tr>
</table>"
?>
