<?php
include "dbconnect.php";
db_connect();
$name=$_GET['q'];
$qry=mysql_query("select usrname from reg where usrname like '$name%'");
while($f=mysql_fetch_array($qry))
{
$response=$f[0];
}
echo $response;
?>
