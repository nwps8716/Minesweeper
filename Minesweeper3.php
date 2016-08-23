<?php
$error = TRUE;

$rule = $_GET["map"];
$new = str_split($_GET["map"]);

$countdata = count($new);
$bomb = substr_count($_GET["map"],"M");
$n = substr_count($_GET["map"],"N");

$newn = explode("N",$_GET["map"]);
$n2 = count($newn);

$j = 0;
if (!preg_match("/^([0-8MN])+$/",$rule))
{
    echo "不符合，輸入的格式錯誤。";
} elseif ($countdata > 109) {
    echo "不符合，輸入的字串數量太多。";
} elseif ($countdata < 109){
    echo "不符合，輸入的字串數量太少。";
} elseif ($bomb > 40) {
    echo "不符合，炸彈數量超過40。";
} elseif ($bomb < 40){
    echo "不符合，炸彈數量少於40。";
} elseif ($n != 9) {
    echo "不符合，N的數量錯誤。";
} elseif ($n == 9) {
    for ($i = 1 ; $i <=9 ; $i++)
    {
        if ($new[$i*10 + $j] !== "N")
        {
            echo "不符合，N的位置錯誤。";
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

for ($x = 0 ; $x < 10 ; $x++)
{
    for ($y = 0 ; $y < 10 ; $y++)
    {
        $newmap[$x][$y] = $map[$i];
        $i++;
    }
}

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
            if($newmap[$x][$y] != $count)
            {
                $newx = $x + 1;
                $newy = $y + 1;
                echo "不符合" . $number . ":";
                echo "陣列位置[" . $newy ."][" . $newx . "]數字錯誤。";
                $number++;
                $error = FALSE;
            }
        }
    }
}

if($error){
    echo "符合";
}