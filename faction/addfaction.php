<?php

session_start();

include '..\db_connect.php';

$faction_tbl_name="factions"; // Table name



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

// create the faction and the faction's name /////////////////////////////////////////////////////////////////
$add_faction="INSERT INTO factions(MemberID, Name) VALUES ('$memberid', '$factionname')";
mysql_query($add_faction);

// assigning the new faction id to a session variable
$factionid_query="SELECT FactionID FROM factions WHERE factions.Name = '$factionname'";
$factionid_query_result=mysql_query($factionid_query);

$num=mysql_numrows($factionid_query_result);

$i=0;while ($i < $num)
{
  $factionid_result=mysql_result($factionid_query_result,$i,"factionid");
  $i++;
}

  session_register("factionid");
  $_SESSION['factionid'] = $factionid_result;
  $factionid = $_SESSION['factionid'];



// give the faction a peasant //////////////////////////////////////////////////////////////////////////////
$add_peasant="INSERT INTO people(Type) VALUES ('1')";
mysql_query($add_peasant);

// get the new peopleid for the new person

$get_peopleid="SELECT PeopleID FROM people ORDER BY PeopleID DESC LIMIT 1";
$get_peopleid_query_result=mysql_query($get_peopleid);

$num=mysql_numrows($get_peopleid_query_result);

$i=0;while ($i < $num)
{
  $get_peopleid_result=mysql_result($get_peopleid_query_result,$i,"peopleid");
  $i++;
}

$peopleid = $get_peopleid_result;


// create the asset mapping entry for the new person

$add_peasant_asset="INSERT INTO asset_mapping(FactionID,PeopleID) VALUES ('$factionid','$peopleid')";
mysql_query($add_peasant_asset);


// give the faction a peasant hovel //////////////////////////////////////////////////////////////////////////////
$add_peasant_hovel="INSERT INTO structures(Type) VALUES ('1')";
mysql_query($add_peasant_hovel);

// get the new structureid for the new structure

$get_structureid="SELECT StructureID FROM structures ORDER BY StructureID DESC LIMIT 1";
$get_structureid_query_result=mysql_query($get_structureid);

$num=mysql_numrows($get_structureid_query_result);

$i=0;while ($i < $num)
{
  $get_structureid_result=mysql_result($get_structureid_query_result,$i,"structureid");
  $i++;
}

$structureid = $get_structureid_result;


// create the asset mapping entry for the new person

$add_peasant_hovel_asset="INSERT INTO asset_mapping(FactionID,StructureID) VALUES ('$factionid','$structureid')";
mysql_query($add_peasant_hovel_asset);





header("location:..\main.php");



};

ob_end_flush();
?>
