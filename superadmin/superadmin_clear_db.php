<?php

include '..\db_connect.php';

$truncate_tables="TRUNCATE structures;";
mysql_query($truncate_tables);

$truncate_tables="TRUNCATE people;";
mysql_query($truncate_tables);

$truncate_tables="TRUNCATE asset_mapping;";
mysql_query($truncate_tables);

$truncate_tables="TRUNCATE factions;";
mysql_query($truncate_tables);




header("location:..\main.php");


?>
