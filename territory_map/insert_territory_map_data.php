
<html>
<body>

<?php

$columns = (int)file_get_contents("http://107.21.117.89/territory_map/territory_columns.txt");
$rows = (int)file_get_contents("http://107.21.117.89/territory_map/territory_rows.txt");

include '..\db_connect.php';

$truncate_tables="TRUNCATE territory_map;";
mysql_query($truncate_tables);

$territory_map_array=json_decode($_POST['elevation']);



$c=0;
while ($c < $columns)
{
  $r=0;
  while ($r < $rows)
  {
    $e = $territory_map_array[$c][$r];
    $insert_territory="INSERT INTO territory_map(x_coord,y_coord,elevation) VALUES ('$c','$r','$e')";
    mysql_query($insert_territory);
    $r++;
  }
  $c++;
};


//echo var_dump($territory_map_array);
header("location:..\main.php");

?>


</body>
</html>
