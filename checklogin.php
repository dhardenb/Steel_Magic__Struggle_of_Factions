<?php

include '\db_connect.php';

$tbl_name="members"; // Table name


// Define $myusername and $mypassword 
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
//applying md5 for weak encryption of password


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername and redirect to file "test_html_5_game.php"
session_register("myusername");
$_SESSION['myusername'] = $myusername;
header("location:main.php");
}
else {
echo "Wrong Username or Password <br><br>";
$mainloginlink = '<a href="main_login.php">Return to Login Screen</a>';
echo $mainloginlink;

}

ob_end_flush();
?>

