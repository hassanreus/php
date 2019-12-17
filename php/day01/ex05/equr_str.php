#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $i = 0;
        $argv[1] = trim($argv[1]);
        while ($argv[1][$i] != NULL)
        {
            while ($argv[1][$i] == ' ' && $argv[1][$i + 1] == ' ')
                $i++;
            print($argv[1][$i]);
            $i++;
        }
        echo "\n";
    }
    ?>