<?php

include '\db_connect.php';

$tbl_name="members"; // Table name


session_register("memberid");
$memberid = $_SESSION['memberid'];

$faction_delete_query="delete from factions where factions.memberid = '$memberid'";
mysql_query($faction_delete_query);

header("location:../main.php");

?>
