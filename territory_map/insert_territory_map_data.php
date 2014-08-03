
<html>
<body>

<?php

$columns = (int)file_get_contents("http://107.21.117.89/territory_map/territory_columns.txt");
$rows = (int)file_get_contents("http://107.21.117.89/territory_map/territory_rows.txt");

include '..\db_connect.php';

$truncate_tables="TRUNCATE territory_map;";
mysql_query($truncate_tables);

$territory_map_array=json_decode($_POST['elevation']);


$n_flag = 0;

$c=0;
while ($c < $columns)
{
  $r=0;
  while ($r < $rows)
  {
    $e = $territory_map_array[$c][$r];

    if ($n_flag == 0 && $e == 1 && $c > ($columns / 2) && $r > ($rows / 2))
    {
        $insert_territory="INSERT INTO territory_map(x_coord,y_coord,elevation,nexus) VALUES ('$c','$r','$e','1')";
        $n_flag = 1;
    }
    else
    {
       $insert_territory="INSERT INTO territory_map(x_coord,y_coord,elevation,nexus) VALUES ('$c','$r','$e','0')";
    };
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
