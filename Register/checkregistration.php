<?php

include '\db_connect.php';

$tbl_name="members"; // Table name



// Define $myusername and $mypassword
global $myusername;
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
//applying md5 for weak encryption of password


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword=md5($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==0){
// insert new username and password into members table, then redirect to registration success page

$sql="INSERT INTO members(username, password) VALUES ('$myusername', '$mypassword')";
mysql_query($sql);

header("location:registration_success.php");
}
else {
echo "Username already exists<br><br>";
$mainloginlink = '<a href="register.php">Return to Registration Screen</a>';
echo $mainloginlink;

}

ob_end_flush();
?>

