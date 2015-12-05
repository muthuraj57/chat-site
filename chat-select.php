<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Chat History</title>
	<link rel="icon" href="images/goss.ico" type="image/x-icon">

   <?php
include("check.php");
session_start();
?>
<script type="text/javascript">

//start new chat
function start_chat()
{
	window.location = "private.php?receiver="+document.getElementById("newchat").value;
}

var t = setInterval(function(){get_chat_list()},2000);


//
// General Ajax Call
//
      
var oxmlHttp;
var oxmlHttpSend;

//to pop up online users
function popitup(url) {
	newwindow=window.open(url,'name','height=450,width=220');
	if (window.focus) {newwindow.focus()}
	return false;
}
      
function get_chat_list()
{

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
    
    oxmlHttp.onreadystatechange = get_chat_list_result;
    oxmlHttp.open("GET","chat_list_ajax.php",true);
    oxmlHttp.send(null);
}
     
function get_chat_list_result()
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("DIV_CHAT") != null)
        {
            document.getElementById("DIV_CHAT").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        var scrollDiv = document.getElementById("DIV_CHAT");
        scrollDiv.scrollTop = scrollDiv.scrollHeight;
    }
}

</script>

</head>
<body>
    &nbsp;
    <center><div style="border-right: lightslategray thin solid; border-top: lightslategray thin solid;
        border-left: lightslategray thin solid; width: 500px; border-bottom: lightslategray thin solid;
        height: 550px">
        <table style="width:100%; height:100%">
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: center">
                    Welcome <?php echo $_SESSION['usrname']?></td><input type="hidden" id="txtname" value="<?php echo $_SESSION['usrname'] ?>">
		<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="logout.php" style="text-decoration:none; font-size:12pt">Logout</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="public.php" style="text-decoration:none; font-size:12pt">Public Chat</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="online.php" style="text-decoration:none; font-size:12pt" onclick="return popitup('online.php')">Online_Users</a></td></td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: left">
                    
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle;" valign="middle" colspan="2">
                    <div style="width: 480px; height: 400px; border-right: darkslategray thin solid; border-top: darkslategray thin solid; font-size: 10pt; border-left: darkslategray thin solid; border-bottom: darkslategray thin solid; font-family: verdana, arial; overflow:scroll; text-align: left;" id="DIV_CHAT">
                    </div>
                </td>
            </tr>
			<tr>
                <td style="width: 310px">                  
			<b>New Chat</b><input id="newchat" style="width: 350px" type="text" name="msg" onPaste="" onkeydown="if (event.keyCode == 13) {start_chat();return false;}" /></td>
			<td style="width: 85px">
                    <input id="Submit2" style="font-family: verdana, arial" type="button" value="Start Chat" onclick="start_chat()"/></td>
            </tr>
            <tr>
                <td colspan="1" style="font-family: verdana, arial; text-align: center; width: 350px;">
                    </td>
                <td colspan="1" style="width: 85px; font-family: verdana, arial; text-align: center">
                </td>
            </tr>
        </table>
    </div></center><br>
	<div align="center"><font size="2"><a href="images/chart.jpg" target="_blank">Sticker Chart</a></font></div>
<div align="center"><font size="2" face="verdana">Developed By <a href="about.php" style="text-decoration:none" target="_blank"><b>Fraternity Team</b></a></font></div>
</body>
</html>
