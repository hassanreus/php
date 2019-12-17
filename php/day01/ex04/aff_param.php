#!/usr/bin/php
<?php
    $i = 0;
    foreach($argv as $name)
    {
        if ($i++ > 0)
            echo "$name\n";
    }
?>