<?php
    if ($_POST['login'] !== "" && $_POST['oldpw'] !== "" &&  $_POST['newpw'] !== "" &&$_POST['submit'] == "OK")
    {
        $oldpw = hash(whirlpool ,$_POST["oldpw"]);
        $newpw = hash(whirlpool ,$_POST["newpw"]);
        $private = "../private";
        $file = "../private/passwd";
        if (!file_exists($file))
            mkdir($private);
        else
        {
            $flag = 0;
            $arr = unserialize(file_get_contents($file));
            if ($arr)
            {
                $i = 0;
                while ($arr[$i])
                {
                    if ($arr[$i]['login'] == $_POST['login'] && $arr[$i]['passwd'] == $oldpw && $newpw != $oldpw)
                    {
                        $flag = 1;
                        $arr[$i]['passwd'] = $newpw;
                    }
                    $i++;
                }
                if ($flag)
                {
                    file_put_contents($file, serialize($arr));
                    echo "OK\n";
                }
                else
                    echo "ERROR\n";
            }
            else
                echo "ERROR\n";
        }
    }
    else
        echo "ERROR\n";
?>