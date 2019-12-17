<?php
    function auth($login, $passwd)
    {
        if ($login === "" || $passwd === "")
            return FALSE;
        $file = "../private/passwd";
        $arr = unserialize(file_get_contents($file));
        $i = 0;
        while ($arr[$i])
        {
            if ($arr[$i]['login'] == $login && $arr[$i]['passwd'] == hash(whirlpool , $passwd))
                return TRUE;
            $i++;
        }
        return FALSE;
    }
?>