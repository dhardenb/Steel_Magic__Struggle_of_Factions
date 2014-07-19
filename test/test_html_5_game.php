
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
<b>Steel & Magic : Struggle of Factions</b>
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
echo "<br<br>";
}


?>

<hr>



</td>
<td align=right>
<p>

<a href="logout.php">Log Out</a></p>
</td>
</tr>
</table><hr>

<Br><br>


<TABLE cellpadding=10>
<tr>
<td>
<br><br>
<center>
<b>Attacking Army</b>
</center>
</td>
<td>
<center>
<b>Defending Army</b>
</center>
</td>
</tr>
</tr>
<tr>
<TD>


<FORM NAME="Army1Form" method="post" action="#">
<B>Number of Infantry :</B> 10
<INPUT TYPE=range NAME="Infantry1" min=10 max=1000 step=10 value=10 onchange="showInfantry1Value(this.value)" id="Infantry1">
<span id='infantry1valuedisplay'></span>
 </FORM>
</TD>
<td>

<FORM NAME="Army2Form" method="post" action="#">
<B>Number of Infantry :</B> 10
<INPUT TYPE=range NAME="Infantry2" min=10 max=1000 step=10 value=10 onchange="showInfantry2Value(this.value)" id="Infantry2">
<span id='infantry2valuedisplay'></span>

</FORM>

</td>
</tr>
<tr>
<td align=right>
<form name="InitiateBattle" method="post" action="#">
<INPUT TYPE="BUTTON" NAME="InitiateBattleSubmit" VALUE="Initiate Battle!" id="InitiateBattleSubmit" onclick="InitiateBattlebtn();"> 
</form>
</td>
<td>
</td>
</tr>
<tr>
<td>


<canvas id="Army1_Display" width="350" height="28">
Canvas not supported.
</canvas>
</td>
<td>
<canvas id="Army2_Display" width="350" height="28">
Canvas not supported.
</canvas>
</td>
</tr>
<tr>
<td>
<Center>
<canvas id="Army1_Visual_Display" width="100" height="450">
Canvas not supported.
</canvas>
</center>
</td>
<td>
<center>
<canvas id="Army2_Visual_Display" width="100" height="450">
Canvas not supported.
</canvas>
</center>
</td>

</tr>

</TABLE>

</td>

</tr>
</table>

<br><br>









</center>





</body>


<script type="text/javascript" src="test_game.js"></script>

</html>

