#!/usr/bin/php
<?php
    function is_month($str)
    {
        $str = strtolower($str);
        $months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
        $key = array_search($str, $months);
        return (($key + 1)* 2592000);
    }

    function is_clacul($arr)
    {
        $time = explode(':', $arr[4]);
        print_r($time);
        print_r($arr);
        $calc = (($arr[3] * 31556952) + (is_month($arr[2])) + ($arr[1] * 86400) + ($time[2] + ($time[1] * 60) + ($time[0] * 3600))) - (1970 * 31556952);
        // print_r($arr);
        return ($calc);
    }

    function is_true($argv)
    {
        $patten_day = "/\b((l|L)undi|(m|M)ardi|(m|M)ercredi|(J|j)eudi|(V|v)endredi|(S|s)amedi|(D|d)imanche)\b/";
        $patten_num = "/^(0(0)?[1-9]?|[1-9]|[12]\d|3[0-2])$/";
        $patten_mouth = "/\b(([j|J]anvier|[F|f]évrier|[M-m]ars|[A-a]vril|[M-m]ai|[J-j]uin|[J-j]uillet|[A-a]oût|[S-s]eptembre|[O-o]ctobre|[N-n]ovembre|[D-d]écembre))\b/";
        $patten_year = "/[0-9][0-9]{3}/";
        $patten_min_sec = "/^[0-5][0-9]|6[0]$/";
        $patten_hour = "/^[0-1][0-9]|2[0-4]$/";
        
        $arr = explode(' ', $argv);
        $time = explode(':', $arr[4]);
        $nb1 = preg_match($patten_day, $arr[0]);
        $nb2 = preg_match($patten_num, $arr[1]);
        $nb3 = preg_match($patten_mouth, $arr[2]);
        $nb4 = preg_match($patten_year, $arr[3]);
        $nb5 = preg_match($patten_hour, $time[0]);
        $nb6 = preg_match($patten_min_sec, $time[1]);
        $nb7 = preg_match($patten_min_sec, $time[2]);
        $r = $nb1 * $nb2 * $nb3 * $nb4 * $nb5 * $nb6 * $nb7;
        if ($r == 1)
            return ($arr);
        else
            exit (0);
    }
        
    if ($arr = is_true($argv[1]))
    {
        // print(is_month($arr[2]));
        print(is_clacul($arr));
    }
    // date_default_timezone_set('UTC');
    // echo $nb5;
?>