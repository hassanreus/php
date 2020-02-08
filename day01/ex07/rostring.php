#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $str = trim($argv[1]);
        $str = preg_replace('/\s+/', ' ', $str);
        $arr = explode(' ', $str);
        $arr = array_merge($arr);
        if (count($arr) > 1)
        {
            for ($i = 1; $i < count($arr); $i++)
                echo($arr[$i]." ");
        }
        if (count($arr) > 0)
            echo($arr[0]."\n");
    }
?>