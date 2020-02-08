#!/usr/bin/php
<?php
    if ($argc == 4)
    {
        $a = trim($argv[1]);
        $b = trim($argv[3]);
        if (!is_numeric($a)|| !is_numeric($b))
            exit (0);
        $sign = trim($argv[2]);
        if ($sign == "+")
            echo $a + $b."\n";
        else if ($sign == "-")
            echo $a - $b."\n";
        else if ($sign == "/")
            echo $a / $b."\n";
        else if ($sign == "*")
            echo $a * $b."\n";
        else if ($sign == "%")
            echo $a % $b."\n";
    }
    else
        echo "Incorrect Parameters\n";
?>