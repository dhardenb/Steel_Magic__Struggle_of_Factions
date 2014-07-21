
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

}


?>

<br>

<?php

include '\faction\checkfaction.php';

?>



</td>
<td align=right>
<p>


<a href="https://docs.google.com/document/d/1B7dnQ4XPz6WZArPNVseMFKKIslRCSn-0T1e2fo1ohVc/edit?usp=sharing">Help</a> /
<a href="logout.php">Log Out</a></p>

</td>
</tr>
</table>
<hr>

<!--------------------------------------------------------------------------------------------------------------!>
<!---------------------This is where the Header Ends -----------------------------------------------------------!>

<br><br>

<centeR>
<table width=1000>
<tr>
<td>
<font name=Verdanna>
<h3>
Faction Status</h3></font>
</td>
</tr>
<tr>
<td>

<table width=400>
<tr>
<td valign=top>
<?php

session_register("factionname");
$factionname = $_SESSION['factionname'];
echo $factionname


?>

</td>
<td halign=right valign=top>
<dd>
<a href="\faction\delete_faction.php"><img src="\images\delete.gif""></a>
</td>
</tr>
</table>

</td>
</tr>
</table>
</center>








</body>



<?php
ob_end_flush();
?>


</html>

