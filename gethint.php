<?php
include "dbconnect.php";
db_connect();
$i=0;
$qry=mysql_query("select username from chat;");
while($l=mysql_fetch_array($qry))
{
	$a[$i]=$l[0];
	echo $a[$i];
	$i++;
}
$q=$_REQUEST['q'];
$hint="";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $q=strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name,0,$len))) {
      if ($hint==="") {
        $hint=$name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint were found
// or output the correct values 
echo $hint==="" ? "no suggestion" : "$hint".",&nbsp";


?>
