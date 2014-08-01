<?php

$territory_map_array = array();

$columns=20;
$rows=20;

$c=0;
while ($c < $columns)
{
$r=0;
while ($r < $rows)
{
$read_territory="SELECT elevation from territory_map WHERE x_coord = '$c' AND y_coord = '$r'";
$read_territory_result=mysql_query($read_territory);
$num=mysql_numrows($read_territory_result);

$i=0;
while ($i < $num)
{
$t=mysql_result($read_territory_result,$i,'elevation');
$territory_map_array[$c][$r] = $t;
$i++;
}
$r++;
}$c++;
};

?>