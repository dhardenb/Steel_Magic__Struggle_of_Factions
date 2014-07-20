
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
echo "<br<br>";
}


?>

<br>

<?php
// determine member id based on the username


$myusername="blob";
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="vikings8629"; // Mysql password
$db_name="pre_alpha_db"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$member_tbl_name="members"; // Member Table name
$faction_tbl_name="factions"; // Faction Table name
$memberid_field="members.memberid"; // memberid field


// get the memberid of the current user
$sql_getmember="SELECT $memberid_field FROM $member_tbl_name WHERE username='$myusername'";
$member_query_result=mysql_query($sql_getmember);


$num=mysql_numrows($member_query_result);

$i=0;while ($i < $num)
{
  $memberid_result=mysql_result($member_query_result,$i,"memberid");
  $i++;
}

// based on the member id, determine if the member has faction.
//
// if the member has a faction, display it.
// if they don't have a faction, direct the member to create a faction

$sql_get_faction="SELECT factions.Name FROM factions WHERE factions.MemberID = $memberid_result";
$faction_query_result=mysql_query($sql_get_faction);

$num=mysql_numrows($faction_query_result);

if ($num==0)
{

}
else
{
  echo "<b>Faction :</b> ";

  $i=0;while ($i < $num)
  {
    $faction_result=mysql_result($faction_query_result,$i,"name");
    $i++;
  }

  echo $faction_result;
}


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

<br><br>



<Br><br>




</body>



<?php
ob_end_flush();
?>


</html>

