<?php

for ($i=0 ; $i<3000 ; $i++)
{
    $bomb[] = $i + 1;
}
shuffle($bomb);

for ($x = 0 ; $x < 50 ; $x++)
{
    for ($y = 0 ; $y < 60 ; $y++)
    {
        if ($bomb[$x * 60 + $y] <= 1200)
        {
            $bomb[$x * 60 + $y] = "M";
        }
        $map[$x][$y] = $bomb[$x * 60 + $y];
    }
}

for ($x = 0 ; $x < 50 ; $x++)
{
    for ($y = 0 ; $y < 60 ; $y++)
    {
        if($map[$x][$y] !== "M")
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

for ($x = 0 ; $x < 50 ; $x++)
{
    for ($y = 0 ; $y < 60 ; $y++)
    {
        $data = $data . $map[$x][$y];
        if($y == 59 and $x != 49)
        {
            $data = $data . "N";
        }
    }
}
echo $data;




?>
