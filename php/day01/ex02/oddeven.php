#!/usr/bin/php
<?php
    echo "Enter a number: ";
    while (($error = fgets(STDIN)) !== false)
    {
       $error = str_replace("\n", "", $error);
       $new_str = trim($error);
       if (is_numeric($new_str))
       {
           $nbr = $new_str[strlen($new_str) - 1];
           if ($nbr % 2 == 0)
                echo "The number $new_str is even\n";
           else
           echo "The number $new_str is odd\n";
        }
        else
        echo "'$error' is not a number\n";
        echo "Enter a number: ";
    }
    if (feof(STDIN))
        echo "\n";
?>