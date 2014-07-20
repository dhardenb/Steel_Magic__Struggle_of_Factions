<html>

<head>


<title>Steel & Magic : Struggle of Factions</title>



<LINK REL=StyleSheet HREF="test.css" TYPE="text/css">



</head>


<body>



<center>
<table width=700>
<tr>
<td>
<a href="https://docs.google.com/document/d/1sI1Q-hE5yuXE-Aq3blRwdbNm4iPkhAiSXm_E8oYbQdo/edit?usp=sharing">Dev Diary</a>
</td>
<td>
<font size=+1>
<b>Steel & Magic : Struggle of Factions</b>
</font>
<br><center>
<font size=-1><i>
Pre-Alpha Version 0.0.1
 </font></i></center>
</td>
<td align=left>
<?php


// Check if session is not registered , redirect back to main page.
// Put this code in first line of web page.

session_start();


if(!session_is_registered(myusername)){
header("location:main_login.php");
}
else
{
echo "Welcome, ";
echo $_SESSION['myusername'];
echo "<br><b>Faction :</b> ";
echo "N/A";
echo "<br<br>";
}


?>

<br>


</td>
<td align=right>
<p>


<a href="https://docs.google.com/document/d/1B7dnQ4XPz6WZArPNVseMFKKIslRCSn-0T1e2fo1ohVc/edit?usp=sharing">Help</a> /
<a href="..\logout.php">Log Out</a></p>

</td>
</tr>
</table>
<hr>

<br><br>

<center>

<table>
<tr>
<td width=300>
You currently do not have a faction
</td>
<td>

<form name="factioninput" method="post" action="addfaction.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Create Faction </strong></td>
</tr>
<tr>
<td>Faction Name</td>
<td width="6">:</td>
<td width="294"><input name="factionname" type="text" id="factionname" maxlength="20"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Create">
</td>
</tr>
</table>
</td>
</form>


</td>
</tr>
</table>



</body>



<?php
ob_end_flush();
?>


</html>
