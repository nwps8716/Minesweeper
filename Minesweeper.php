<?php

for ($x = 0 ; $x < 10 ; $x++)
{
    for($y = 0 ; $y < 10 ; $y++)
    {
        $map[$x][$y] = "?";
    }
}

for ($i = 0 ; $i < 40 ; $i++)
{
    $m = rand(0,99);
    for ($j = 0 ; $j < count($bomb) ; $j++)
    {
        if($bomb[$j] == $m)
        {
            $i--;
            continue 2;
        }
    }
    $bomb[] = $m;
}

for ($i = 0 ; $i < 40 ; $i++)
{
    $temp = $bomb[$i];
    $x = floor($temp/10);
    $y = $temp % 10;
    $map[$x][$y] = "M";
}


for ($x = 0 ; $x < 10 ; $x++)
{
    for ($y = 0 ; $y < 10 ; $y++)
    {
        if($map[$x][$y] === "?")
        {
            $count = 0;
            if($map[$x-1][$y-1] === "M")
            {
                $count++;
            }
            if($map[$x-1][$y] === "M")
            {
                $count++;
            }
            if($map[$x][$y-1] === "M")
            {
                $count++;
            }
            if($map[$x-1][$y+1] === "M")
            {
                $count++;
            }
            if($map[$x+1][$y-1] === "M")
            {
                $count++;
            }
            if($map[$x+1][$y] === "M")
            {
                $count++;
            }
            if($map[$x][$y+1] === "M")
            {
                $count++;
            }
            if($map[$x+1][$y+1] === "M")
            {
                $count++;
            }
            $map[$x][$y] = $count;
        }
    }
}


for ($x = 0 ; $x < 10 ; $x++)
{
    for ($y = 0 ; $y < 10 ; $y++)
    {
        $data = $data . $map[$x][$y];
        if($y == 9 and $x != 9)
        {
            $data = $data . "N";
        }
    }
}

echo $data;

?>
