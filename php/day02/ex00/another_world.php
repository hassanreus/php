#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $any_space = "/\s+/";
        $replace = " ";
        echo preg_replace($any_space, $replace, trim($argv[1]))."\n";
    }
?>