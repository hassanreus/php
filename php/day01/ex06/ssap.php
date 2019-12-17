#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        include("../ex03/ft_split.php");
        $arr = array();
        array_shift($argv);
        foreach ($argv as $name)
        {
            $tmp = ft_split($name);
            if ($tmp[0] != "")
                $arr = array_merge($arr, $tmp);
        }
        sort($arr, SORT_STRING);
        foreach($arr as $name)
            echo "$name"."\n";
    }
?>
