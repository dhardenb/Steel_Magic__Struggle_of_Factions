<?php


include '\db_connect.php';

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