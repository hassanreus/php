#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        include("../ex03/ft_split.php");
        function is_sort($a, $b){
            $a = strtolower($a);
            $b = strtolower($b);
            ($len = strlen($a)) ? strlen($a) < strlen($b) : strlen($b);
            for ($i = 0; $i < $len ; $i++){
                if ($a[$i] > $b[$i] && $a[$i] >= 'a' && $a[$i] <= 'z' && $b[$i] >= 'a' && $b[$i] <= 'z') //char && char
                    return (1);
                else if ($a[$i] < $b[$i]  && $a[$i] >= 'a' && $a[$i] <= 'z' && $b[$i] >= 'a' && $b[$i] <= 'z') //char && char
                    return (-1);
                else if ($a[$i] > $b[$i] && is_numeric($a[$i]) && is_numeric($b[$i])) // int && int
                    return (1);
                else if ($a[$i] < $b[$i] && is_numeric($a[$i]) && is_numeric($b[$i])) // int && int
                    return (-1);
                else if ($a[$i] > $b[$i] && !is_numeric($a[$i]) && ($a[$i] < 'a' || $a[$i] > 'z') && !is_numeric($b[$i]) && ($b[$i] < 'a' || $b[$i] > 'z'))// a special && b special
                    return (1);
                else if ($a[$i] < $b[$i] && !is_numeric($b[$i]) && ($b[$i] < 'a' || $b[$i] > 'z') && !is_numeric($a[$i]) && ($a[$i] < 'a' || $a[$i] > 'z'))// a special && b special
                    return (-1);
                else if (is_numeric($a[$i]) && ($b[$i] >= 'a' && $b[$i] <= 'z'))//a int && b char
                    return (1);
                else if (is_numeric($b[$i]) && ($a[$i] >= 'a' && $a[$i] <= 'z'))//b int && a char
                    return (-1);
                else if (!is_numeric($a[$i]) && ($b[$i] >= 'a' && $b[$i] <= 'z') && ($a[$i] < 'a' || $a[$i] > 'z'))  // a special && b char
                    return (1);
                else if (!is_numeric($b[$i]) && ($a[$i] >= 'a' && $a[$i] <= 'z') && ($b[$i] < 'a' || $b[$i] > 'z')) // b special && a char
                    return (-1);
                else if (!is_numeric($a[$i]) && is_numeric($b[$i]) && ($a[$i] < 'a' || $a[$i] > 'z'))  // a special  && b num
                    return (1);
                else if (!is_numeric($b[$i]) && is_numeric($a[$i]) && ($b[$i] < 'a' || $b[$i] > 'z')) // b special && a num
                    return (-1);
                }
            return (0);
        }
        $arr = array();
        array_shift($argv);
        foreach ($argv as $name)
        {
            $tmp = ft_split($name);
            if ($tmp[0] != "")
                $arr = array_merge($arr, $tmp);
        }
        usort($arr, "is_sort");
        foreach($arr as $name)
            echo "$name"."\n";
    }
?>