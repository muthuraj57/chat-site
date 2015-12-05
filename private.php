<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Private Chat</title>
	<link rel="icon" href="goss.ico" type="image/x-icon">
<?php
include("check.php");
session_start();
?>
   
<script type="text/javascript">

var t=setInterval(function chat(){get_chat_msg()},2000);

//
// General Ajax Call
//
      
var oxmlHttp;
var oxmlHttpSend;

//to show suggestions
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}

//to pop up online users
function popitup(url) {
	newwindow=window.open(url,'name','height=450,width=220');
	if (window.focus) {newwindow.focus()}
	return false;
}
//to get message history      
function get_chat_msg()
{
 		//setInterval(get_online_users,5000);	
	var url="chat_recv_ajax_private.php";
	var strname = document.getElementById("txtname").value;
	url += "?name=" + strname;
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
    
    oxmlHttp.onreadystatechange = get_chat_msg_result;
    oxmlHttp.open("GET",url,true);
    oxmlHttp.send(null);

}
     
function get_chat_msg_result()
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

  
//to send message    
function set_chat_msg()
{

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttpSend = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttpSend == null)
    {
       alert("Browser does not support XML Http Request");
       return;
    }
    
    var url = "chat_send_ajax_private.php";
    var strname="noname";
    var strmsg="";
    if (document.getElementById("txtname") != null)
    {
        strname = document.getElementById("txtname").value;
        document.getElementById("txtname").readOnly=true;
    }
    if (document.getElementById("txtmsg") != null)
    {
        strmsg = document.getElementById("txtmsg").value;
        document.getElementById("txtmsg").value = "";
    }
    
    url += "?name=" + strname + "&msg=" + strmsg;
    oxmlHttpSend.open("GET",url,true);
    oxmlHttpSend.send(null);
}

</script>

</head>
<body>
    &nbsp;
	
    <center><div style="width: 800px;height: 550px">
        <table style="width:100%; height:100%">
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: center">
                    Welcome <?php echo $_SESSION['usrname'] ?></td>
		<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="logout.php" style="text-decoration:none; font-size:12pt">Logout</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="public.php" style="text-decoration:none; font-size:12pt">Public_Chat</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="online.php" style="text-decoration:none; font-size:12pt" onclick="return popitup('online.php')">Online_Users</a></td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: left">
                    <table style="font-size: 12pt; color: black; font-family: Verdana, Arial">
                        <tr>
                            <td style="width: 100px">
                                Receiver Name:</td>
                            <td style="width: 100px"><input id="txtname" style="width: 150px" type="text" name="name" maxlength="15" 
							<?php
							if(isset($_GET['receiver']))
								echo "value=".$_GET['receiver'];
							else
								echo "autofocus='autofocus'";
							?>
							 onkeyup="showResult(this.value)"/><div id="livesearch"></div></td>
				
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle;" valign="middle" colspan="2">
                    <div style="width: 600px; height: 400px; border-right: darkslategray thin solid; border-top: darkslategray thin solid; font-size: 10pt; border-left: darkslategray thin solid; border-bottom: darkslategray thin solid; font-family: verdana, arial; overflow:scroll; text-align: left;" id="DIV_CHAT">
                    </div>
            </tr>	
            <tr>
                <td style="width: 310px">
			<b>Message:</b><input id="txtmsg" style="width: 350px" type="text" name="msg" onPaste="" onkeydown="if (event.keyCode == 13) {set_chat_msg();return false;}" /></td>
			<td style="width: 85px">
                    <input id="Submit2" style="font-family: verdana, arial" type="button" value="Send" onclick="set_chat_msg()"/></td>
            </tr>
            <tr>
                <td colspan="1" style="font-family: verdana, arial; text-align: center; width: 350px;">
                    </td>
                <td colspan="1" style="width: 85px; font-family: verdana, arial; text-align: center">
                </td>
            </tr>
        </table>
    </div><br>
	<div align="center"><font size="2"><a href="images/chart.jpg" target="_blank">Sticker Chart</a></font></div>
<div align="center"><font size="2" face="verdana">Developed By <a href="about.php" style="text-decoration:none" target="_blank"><b>Fraternity Team</b></a></font></div>
</body>
</html>
