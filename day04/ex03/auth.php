<?php
    function auth($login, $passwd){
        if ($login === "" || $passwd === "")
            return FALSE;
        $file = "../private/passwd";
        $pass = hash(whirlpool, $passwd);
        $arr = unserialize(file_get_contents($file));
        if ($arr){
            foreach($arr as $elem => $key){
                if ($key['login'] === $login && $key['passwd'] === $pass)
                    return TRUE;
            }
        }
        return FALSE;
    }
?>