<?php
$error = TRUE;

$rule = $_GET["map"];
echo $rule;

$m = strpos($rule,"m");
$new = str_split($_GET["map"]);

if ($m != 0)
{
    echo "炸彈大小寫有錯。";
    $new = str_replace("m","M",$new);
}

$countdata = count($new);

$bomb = substr_count($_GET["map"],"M") + substr_count($_GET["map"],"m");
$n = substr_count($_GET["map"],"N");


if (!preg_match("/^([0-8MN]+)$/",$rule))
{
    echo "不符合，輸入的格式錯誤。";
    $error = FALSE;
}

if ($countdata > 109) {
    echo "不符合，輸入的字串數量太多。";
    $error = FALSE;
}

if ($countdata < 109){
    echo "不符合，輸入的字串數量太少。";
    $error = FALSE;
}

if ($bomb != 40) {
    echo "不符合，炸彈數量有錯，只有" . $bomb . "顆炸彈。";
    $error = FALSE;
}

if ($n != 9) {
    echo "不符合，N的數量錯誤。";
    $error = FALSE;
}

$j = 0;
if ($n == 9) {
    for ($i = 1 ; $i <=9 ; $i++)
    {
        if ($new[$i*10 + $j] !== "N")
        {
            echo "不符合，N的位置錯誤。";
            $error = FALSE;
        }
        $j++;
    }
}

for ($i = 0 ; $i < 109 ; $i++)
{
    if ($new[$i] != "N"){
        $map[] = $new[$i];
    }
}

$i=0;
echo "<table border=1>";
for ($x = 0 ; $x < 10 ; $x++)
{
    echo "<tr>";
    for ($y = 0 ; $y < 10 ; $y++)
    {
        echo "<td>";
        echo $newmap[$x][$y] = $map[$i];
        echo "</td>";
        $i++;
    }
    echo "</tr>";
}
echo "</table>";

$number = 1;
for ($x = 0 ; $x < 10 ; $x++)
{
    for ($y = 0 ; $y < 10 ; $y++)
    {
        if($newmap[$x][$y] !== "M")
        {
            $count = 0;
            if($newmap[$x-1][$y-1] === "M")
            {
                $count++;
            }
            if($newmap[$x-1][$y] === "M")
            {
                $count++;
            }
            if($newmap[$x][$y-1] === "M")
            {
                $count++;
            }
            if($newmap[$x-1][$y+1] === "M")
            {
                $count++;
            }
            if($newmap[$x+1][$y-1] === "M")
            {
                $count++;
            }
            if($newmap[$x+1][$y] === "M")
            {
                $count++;
            }
            if($newmap[$x][$y+1] === "M")
            {
                $count++;
            }
            if($newmap[$x+1][$y+1] === "M")
            {
                $count++;
            }
            if($newmap[$x][$y] != $count or $newmap[$x][$y] == "")
            {
                $newlocation = $x*10 + ($y + 1);
                echo "不符合" . $number . ":";
                echo "字串位置".$newlocation."數字" . $newmap[$x][$y] . "應該為" . $count;
                $number++;
                $error = FALSE;
            }
        }
    }
}

if($error){
    echo "符合";
}