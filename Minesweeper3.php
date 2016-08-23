<?php

$new = str_split($_GET["map"]);

$countdata = count($new);
$bomb = substr_count($_GET["map"],"M");
$n = substr_count($_GET["map"],"N");

if ($countdata != 109)
{
    echo "輸入的字串數量錯誤";
} elseif ($bomb != 40) {
    echo "炸彈數量錯誤";
} elseif ($n != 9) {
    echo "換行數量錯誤";
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
                echo "陣列位置[" . $newy ."][" . $newx . "]";
                echo "錯誤:" . $number . "<br>";
                $number++;
            }
        }
    }
}