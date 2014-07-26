<?php

ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="vikings8629"; // Mysql password
$db_name="pre_alpha_db"; // Database name


// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>
