<?php

session_start();

ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="vikings8629"; // Mysql password
$db_name="pre_alpha_db"; // Database name
$faction_tbl_name="factions"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $factionname
$factionname=$_POST['factionname'];

// first, check if this faction name already exists

$faction_exists_query="SELECT * FROM $faction_tbl_name WHERE Name = '$factionname'";
$faction_exists_result=mysql_query($faction_exists_query);
$num=mysql_numrows($faction_exists_result);


if ($num==1)
{
//if the factioname already exists, warn the user

echo "This Faction Name Already Exists";

echo "<br><br><a href='create_faction.php'>Try Again</a> / <a href='..\logout.php'>Log Out</a>";
}
else
{
//if the faction name is original, add the faction name and then go the main page

$memberid = $_SESSION['memberid'];

$add_faction="INSERT INTO factions(MemberID, Name) VALUES ('$memberid', '$factionname')";
mysql_query($add_faction);

header("location:..\main.php");



};

ob_end_flush();
?>
