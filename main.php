
<html>

<head>


<title>Steel & Magic : Struggle of Factions</title>


</head>


<body>



<center>
<table width=1000>
<tr>
<td>
<a href="https://docs.google.com/document/d/1sI1Q-hE5yuXE-Aq3blRwdbNm4iPkhAiSXm_E8oYbQdo/edit?usp=sharing">Dev Diary</a>
</td>
<td>
<font size=+1>
<b>Steel & Magic : Struggle of Factions</b>
</font>
<br><center>
<font size=-1><i>
Pre-Alpha Version 0.0.5
 </font></i></center55>
</td>
<td align=left>

<?php


// Check if session is not registered , redirect back to main page. 
// Put this code in first line of web page. 
 
session_start();


if(!session_is_registered(myusername)){
header("location:main_login.php");
}
else
{
echo "Welcome, ";
echo $_SESSION['myusername'];

}


?>

<br>

<?php

include '\faction\checkfaction.php';

?>



</td>
<td align=right>
<p>


<a href="https://docs.google.com/document/d/1B7dnQ4XPz6WZArPNVseMFKKIslRCSn-0T1e2fo1ohVc/edit?usp=sharing">Help</a> /
<a href="logout.php">Log Out</a>

<?php
include '\superadmin\check_superadmin_status.php';
?>

</p>

</td>
</tr>
</table>
<hr>

<!--------------------------------------------------------------------------------------------------------------!>
<!---------------------This is where the Header Ends -----------------------------------------------------------!>



<center>

<table border=1>
<tr>
<td width=250 valign=top>

<table width=250>
<tr>
<td bgcolor=E6E6E6 width=200>
<font name=Verdanna>
<b>
Faction Status</b></font><br>
<font size=-2><i>
<a href="\faction\delete_faction.php">DELETE</a></i></font>

</td>
<td>
</td>
</tr>
<tr>
<td>
<br>
<table>
<tr>
<td valign=top>
<b>Name : </b>

<?php

session_register("factionname");
$factionname = $_SESSION['factionname'];
echo $factionname


?>

</td>
<td halign=right valign=top>
<br><Br>
</td>
</tr>
</table>

</td>
<td>
</td>
</tr>
<tr>
<td valign=top>
<b>People : </b><br><br>

<?php

include '\faction\display_faction_people_assets.php';

?>

<br><br>
</td>
<td>
</td>
</tr>
<tr>
<td valign=top>
<b>Structures : </b><br><br>

<?php

include '\faction\display_faction_structure_assets.php';

?>

<br><br>
</td>
<td>
</td>
</tr>
</table>


</td>
<td valign=top>
<center>
<h1>World Map</h1>
<hr>

<canvas id="draw_map" width="1000" height="600"></canvas>


</center>

</td>
</tr>
</table>

</center>


</body>

<?php

include 'db_connect.php';

$territory_map_array = array();

$columns = (int)file_get_contents("http://107.21.117.89/territory_map/territory_columns.txt");
$rows = (int)file_get_contents("http://107.21.117.89/territory_map/territory_rows.txt");

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

<script>


//var obj = <?php echo json_encode($php_variable); ?>;

var tile_elevation = <?php echo json_encode($territory_map_array); ?>;



  var canvas = document.getElementById('draw_map');
  var context = canvas.getContext('2d');


    var ts = parseInt(<?php echo file_get_contents("http://107.21.117.89/territory_map/territory_tile_size.txt"); ?>);
    var columns = parseInt(<?php echo file_get_contents("http://107.21.117.89/territory_map/territory_columns.txt"); ?>);
    var rows = parseInt(<?php echo file_get_contents("http://107.21.117.89/territory_map/territory_rows.txt"); ?>);


    function base_tile_color(t_elevation){

            var color;

            if (t_elevation == 0) {
                color = "rgb(163,211,156)"; // coastal/bottomlands green
            }
            else if (t_elevation == 1) {
                color = "green" // plains  green
            }
            else if (t_elevation == 5) {
                color = "rgba(255,255,255,0.1)";
            }
            else if (t_elevation == 4) {
                color = "rgba(98,63,38,0.5)"; // dark brown
            }
            else if (t_elevation == 3) {
                color = "rgba(139,135,125,0.65)"; // lighter brown
            }
            else if (t_elevation == 2) {
                color = "rgba(150,150,42,0.65)"; // lighter brownish/green
            }
            else if (t_elevation == -2) {
                color = "blue";
            }
            else if (t_elevation == -1) {
                color = "rgb(30,144,255)";
            }
            else
            {
                color = "rgb(178,54,67)";
            };
            return color;
        };


// map drawing  ////////////////////////////////////////////////////////////////////////



// main draw logic

    context.clearRect(0,0,canvas.width,canvas.height);

    for (var x = 0; x < columns; x++) {
        for (var y = 0; y < rows; y++) {



            //drawing the individual tiles that make up the map grid

            context.shadowOffsetX = 0;
            context.shadowOffsetY = 0;
            context.shadowBlur = 0;

            context.fillStyle = base_tile_color(tile_elevation[x][y]);
            context.fillRect(ts * x,ts * y,ts,ts);

            context.strokeStyle = "black";
            context.lineWidth = 1;
            context.strokeRect(ts * x,ts * y,ts,ts);

        }
    }



</script>



<?php
ob_end_flush();
?>


</html>

