
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
Pre-Alpha Version 0.0.5
 </font></i></center55>
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



<center>

<table width=1000>
<tr>
<td bgcolor=E6E6E6 width=200>
<font name=Verdanna>
<b>
Faction Status</b></font><br>
<font size=-2><i>
<a href="\faction\delete_faction.php">DELETE</a></i></font>

</td>
<td width=800>
</td>
</tr>
<tr>
<td>
<br>
<table>
<tr>
<td valign=top>
<b>Name : </b>

<?php

session_register("factionname");
$factionname = $_SESSION['factionname'];
echo $factionname


?>

</td>
<td halign=right valign=top>
<br><Br>
</td>
</tr>
</table>

</td>
<td>
</td>
</tr>
<tr>
<td valign=top>
<b>People : </b><br><br>

<?php

include '\faction\display_faction_people_assets.php';

?>

<br><br>
</td>
<td>
</td>
</tr>
<tr>
<td valign=top>
<b>Structures : </b><br><br>

<?php

include '\faction\display_faction_structure_assets.php';

?>

<br><br>
</td>
<td>
</td>
</tr>
</table>
</center>








</body>



<?php
ob_end_flush();
?>


</html>

