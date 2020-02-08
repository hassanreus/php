#!/usr/bin/php
<?php
    if ($argc != 2)
        return (0);
    $tab = file('php://stdin');
    unset($tab[0]);

    if ($argv[1] == "moyenne"){
        $avrg = 0;
        $cnt = 0;
        foreach($tab as $key){
            $tmp = explode(';', $key);
            if ($tmp[1] != "" && $tmp[2] != "moulinette"){
                $avrg += $tmp[1];
                $cnt++;
            }
        }
        if ($cnt > 0)
            echo $avrg / $cnt."\n";
    }

    if ($argv[1] == "moyenne_user"){
        asort($tab);
        foreach($tab as $key){
            $tmp = explode(';', $key);
            $l[$tmp[0]] = "";
        }
        foreach ($l as $user => $key){
            $avrg = 0;
            $cnt = 0;
            foreach ($tab as $key){
                $tmp = explode(";", $key);
                if ($tmp[1] != "" && $user == $tmp[0] && $tmp[2] != "moulinette"){
                    $avrg += $tmp[1];
                    $cnt++;
                }
            }
            if ($cnt > 0)
                echo $user.":".$avrg / $cnt."\n";
        }
    }

    if ($argv[1] == "ecart_moulinette"){
        asort($tab);
        foreach($tab as $key){
            $tmp = explode(";", $key);
            $l[$tmp[0]] = "";
        }
        foreach($l as $user => $key){
            $avrg = 0;
            $cnt = 0;
            foreach($tab as $key){
                $tmp = explode(";", $key);
                if ($tmp[1] != "" && $tmp[0] == $user && $tmp[2] == "moulinette")
                    $g_moul = $tmp[1];
            }
            foreach($tab as $key){
                $tmp = explode(";", $key);
                if ($tmp[1] != "" && $tmp[0] == $user && $tmp[2] != "moulinette"){
                    $avrg += $tmp[1] - $g_moul;
                    $cnt++;
                }
            }
            if ($cnt > 0)
                echo $user.":".$avrg / $cnt."\n";
        }
    }
?>