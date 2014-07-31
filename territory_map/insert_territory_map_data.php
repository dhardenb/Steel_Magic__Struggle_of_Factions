
<html>
<body>

<?php

$columns = 10;
$rows = 10;

include '..\db_connect.php';

$truncate_tables="TRUNCATE territory_map;";
mysql_query($truncate_tables);

$territory_map_array=json_decode($_POST['elevation']);


$c=0;
while ($c < $columns)
{
  $r=0;
  while ($r < $columns)
  {
    $e = $territory_map_array[$c][$r];
    $insert_territory="INSERT INTO territory_map(x_coord,y_coord,elevation) VALUES ('$c','$r','$e')";
    mysql_query($insert_territory);
    $r++;
  }
  $c++;
};



header("location:..\main.php");

?>


</body>
</html>
