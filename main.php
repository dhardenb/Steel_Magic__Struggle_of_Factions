
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




</body>




</html>

