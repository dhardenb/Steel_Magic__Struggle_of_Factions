<?php
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="vikings8629"; // Mysql password
$db_name="pre_alpha_db"; // Database name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// return number of peasants ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

session_register("factionid");
$factionid = $_SESSION['factionid'];

$num_peasants_query="SELECT * FROM people,asset_mapping WHERE people.type = '1' AND people.peopleid = asset_mapping.peopleid AND asset_mapping.factionid = '$factionid'";
$num_peasants_query_result=mysql_query($num_peasants_query);

$peasant_total=mysql_numrows($num_peasants_query_result);

if ($peasant_total > 0)
{
  echo "Peasants : ";
  echo $peasant_total;
  echo "<br>";
}


?>