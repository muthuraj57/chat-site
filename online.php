<html>
<head>
<script type="text/javascript">
var t=setInterval(function(){get_online_users()},5000);
function get_online_users()
{
	
	var url="online_users.php";
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
    
    oxmlHttp.onreadystatechange = get_online_users_result;
    oxmlHttp.open("GET",url,true);
    oxmlHttp.send(null);
}

function get_online_users_result()
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("DIV_ONLINE") != null)
        {
            document.getElementById("DIV_ONLINE").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        var scrollDiv = document.getElementById("DIV_ONLINE");
        scrollDiv.scrollTop = scrollDiv.scrollHeight;
    }
}
</script>
</head>
<body>
<div style="width: 800px; height: 550px">

<font style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: center">
                    Online users</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" style="text-decoration:none">Logout</a>
        <!--<table style="width:100%; height:100%">
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: center">
                    Online users</td>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="logout.php" style="text-decoration:none; font-size:12pt">Logout</a><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="select.php" style="text-decoration:none; font-size:12pt">Select_Chat</a></td>
            </tr>-->
<tr>

                   <td style="vertical-align: middle;" valign="middle" colspan="2">
                    <div style="width: 200px; height: 400px; border-right: darkslategray thin solid; border-top: darkslategray thin solid; font-size: 10pt; border-left: darkslategray thin solid; border-bottom: darkslategray thin solid; font-family: verdana, arial; overflow:scroll; text-align: left;" id="DIV_ONLINE">
                    </div>
                </td>

            </tr>
</table>

