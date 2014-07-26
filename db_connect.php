<?php

ob_start();
$host="localhost"; // Host name
$username=file_get_contents("http://107.21.117.89/text/db_user.txt"); // Mysql username
$password=file_get_contents("http://107.21.117.89/text/db_pass.txt"); // Mysql password
$db_name="pre_alpha_db"; // Database name


// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>
