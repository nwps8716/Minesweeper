<?php
//地圖
for ($x = 0 ; $x < 50 ; $x++)
{
    for($y = 0 ; $y < 60 ; $y++)
    {
        $map[$x][$y] = "?";
    }
}

//亂數炸彈位置
for ($i = 0 ; $i < 1200 ; $i++)
{
    $m = rand(0,2999);
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

//拆解成x,y位置,放入地圖
for ($i = 0 ; $i < 1200 ; $i++)
{
    $temp = $bomb[$i];
    $x = floor($temp/60);
    $y = $temp % 60;
    $map[$x][$y] = "M";
}

//判斷八個方位的數字
for ($x = 0 ; $x < 50 ; $x++)
{
    for ($y = 0 ; $y < 60 ; $y++)
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
