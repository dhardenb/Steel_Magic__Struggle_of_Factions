<?php

ob_start();

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="vikings8629"; // Mysql password
$db_name="pre_alpha_db"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

session_register("memberid");
$memberid = $_SESSION['memberid'];

$faction_delete_query="delete from factions where factions.memberid = '$memberid'";
mysql_query($faction_delete_query);

header("location:../main.php");

?>
