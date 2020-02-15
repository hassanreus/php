#!/usr/bin/php
<?php
    if ($argc == 2){
        function is_month($str)
        {
            $str = strtolower($str);
            $months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
            $key = array_search($str, $months);
            return (($key + 1));
        }
        if (substr_count($argv[1], ' ') === 4){
            $string = explode(' ', $argv[1]);
            if(count($string) === 5){
                if (preg_match("/\b((l|L)undi|(m|M)ardi|(m|M)ercredi|(J|j)eudi|(V|v)endredi|(S|s)amedi|(D|d)imanche)\b/",$string[0]) && preg_match("/^(0(0)?[1-9]?|[1-9]|[12]\d|3[0-1])$/", $string[1]) && preg_match("/\b(([j|J]anvier|[F|f]évrier|[M-m]ars|[A-a]vril|[M-m]ai|[J-j]uin|[J-j]uillet|[A-a]oût|[S-s]eptembre|[O-o]ctobre|[N-n]ovembre|[D-d]écembre))\b/", $string[2]) && preg_match("/^\d{4}$/", $string[3]) && preg_match("/^(2[0-3]|[01]?[0-9]):([0-5]?[0-9]):([0-5]?[0-9])$/", $string[4])){
                    $time = explode(':', $string[4]);
                    date_default_timezone_set('Europe/Paris');
					echo mktime($time[0], $time[1], $time[2], is_month($string[2]), $string[1], $string[3])."\n";
					exit ;
				}
            }
		}
		echo "Wrong Format\n";
    }
?>
