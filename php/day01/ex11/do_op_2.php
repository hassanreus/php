#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $str = trim($argv[1]);
        if (preg_match('/^([+-]?[0-9]+) *([\+\*\/\%\-]) *([+-]?[0-9]+)$/', $str, $matches) == false)
            exit (0);
        if ($matches[2] == "+")
            echo $matches[1] + $matches[3]."\n";
        else if ($matches[2] == "-")
            echo $matches[1] - $matches[3]."\n";
        else if ($matches[2] == "/")
            echo $matches[1] / $matches[3]."\n";
        else if ($matches[2] == "*")
            echo $matches[1] * $matches[3]."\n";
        else if ($matches[2] == "%")
            echo $matches[1] % $matches[3]."\n";
    }
    else
        echo "Incorrect Parameters\n";
?>