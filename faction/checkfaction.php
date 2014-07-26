<?php


// determine member id based on the username


include 'db_connect.php';

$tbl_name="members"; // Table name



$member_tbl_name="members"; // Member Table name
$faction_tbl_name="factions"; // Faction Table name
$memberid_field="members.memberid"; // memberid field

$myusername = $_SESSION['myusername'];

// get the memberid of the current user
$sql_getmember="SELECT $memberid_field FROM $member_tbl_name WHERE username='$myusername'";
$member_query_result=mysql_query($sql_getmember);


$num=mysql_numrows($member_query_result);

$i=0;while ($i < $num)
{
  $memberid_result=mysql_result($member_query_result,$i,"memberid");
  $i++;
}

  session_register("memberid");
  $_SESSION['memberid'] = $memberid_result;

// based on the member id, determine if the member has faction.
//
// if the member has a faction, display it.
// if they don't have a faction, direct the member to create a faction

$sql_get_faction="SELECT factions.Name FROM factions WHERE factions.MemberID = $memberid_result";
$faction_query_result=mysql_query($sql_get_faction);

$num=mysql_numrows($faction_query_result);

if ($num==0)
{
// needs to launch the faction creation dialog

 header("location:/faction/create_faction.php");

}
else
{
  echo "<b>Faction :</b> ";

  $i=0;while ($i < $num)
  {
    $faction_result=mysql_result($faction_query_result,$i,"name");
    $i++;
  }

  session_register("factionname");
  $_SESSION['factionname'] = $faction_result;

  echo $_SESSION['factionname'];
}


?>
