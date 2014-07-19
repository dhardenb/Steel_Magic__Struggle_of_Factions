<?php

function parseInt($string) {
//	return intval($string);
	if(preg_match('/(\d+)/', $string, $array)) {
		return $array[1];
	} else {
		return 0;
	}
}


$attackingInf = abs(parseInt($_GET['phpInfval1']));
$defendingInf = abs(parseInt($_GET['phpInfval2']));

if ($attackingInf > 1000 and $defendingInf > 1000)
{ 
echo "<h1> Invalid Infantry Amounts!</h>";
}
elseif($attackingInf > 1000 and $defendingInf <= 1000 )
{
echo "<h1> Invalid Attaking Infantry Amounts!</h>";
}
elseif($defendingInf > 1000 and $attackingInf <= 1000 )
{
echo "<h1> Invalid Defending Infantry Amounts!</h>";
}
else
{
echo "<h1>Battle Results:</h1>";
echo "<font color=red>Attacking Army has $attackingInf infantry </font><br>";
echo "<font color=blue>Defending Army has $defendingInf infantry</font><br><br>";

//dead simple battle round
echo "<h2> The two armies make contact!</h2>";

$defendingInf = ($defendingInf - rand(1, abs($defendingInf / 6)));
$attackingInf = ($attackingInf - rand(1, abs($attackingInf / 2)));

echo "<font color=red>The Attacking Army has $attackingInf infantry remaining</font><br>";
echo "<font color=blue>The Defending Army has $defendingInf infantry remaining</font><br><br>";

   if ($attackingInf > $defendingInf)
   {
     echo "The Attacking Army has won!";
    }
else
    {
     echo "The Defending Army has won!";
    }

}

?>

<Br><br><br>

<a href="test_html_5_game.php">Create a new Battle</a>