<?php
    if ($_POST['login'] !== "" && $_POST['passwd'] !== "" && $_POST['submit'] == "OK" )
    {
        $private = "../private";
        $file = "../private/passwd";
        if (!file_exists($private))
        {
            mkdir($private);        
            file_put_contents($file, NULL);
        }
        $flag = 0;
        $arr = unserialize(file_get_contents($file));
        if ($arr)
        {
            $i = 0;
            while ($arr[$i])
            {
                if ($arr[$i]['login'] == $_POST['login'])
                    $flag = 1;
                $i++;
            }
        }
        if ($flag)
            echo "ERROR\n";
        else
        {
            $tab["login"] = $_POST["login"];
            $tab["passwd"] = hash(whirlpool ,$_POST["passwd"]);
            $arr[] = $tab;
            file_put_contents($file, serialize($arr));
            echo "OK\n";
        }
    }
    else
        echo "ERROR\n";
?>