<?php

include '..\db_connect.php';

session_register("memberid");
$memberid = $_SESSION['memberid'];

$superadmin_check_query="select * from members where members.memberid = '$memberid' AND members.superuser_flag = 1";
$superadmin_check_result=mysql_query($superadmin_check_query);

$num=mysql_numrows($superadmin_check_result);

if ($num == 1)
{
  echo " / <a href='..\superadmin\superadmin_panel.php'>SuperAdmin Panel</a>";
};



?>