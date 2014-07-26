<?php
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="vikings8629"; // Mysql password
$db_name="pre_alpha_db"; // Database name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// return number of peasant hovels ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

session_register("factionid");
$factionid = $_SESSION['factionid'];

$num_peasant_hovels_query="SELECT * FROM structures,asset_mapping WHERE structures.type = '1' AND structures.structureid = asset_mapping.structureid AND asset_mapping.factionid = '$factionid'";
$num_peasant_hovels_query_result=mysql_query($num_peasant_hovels_query);

$peasant_hovel_total=mysql_numrows($num_peasant_hovels_query_result);

if ($peasant_hovel_total > 0)
{
  echo "Peasant Hovels : ";
  echo $peasant_hovel_total;
  echo "<br>";
}


?>