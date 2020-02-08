<?php
    if ($_POST['login'] !== '' && $_POST['passwd'] !== '' && $_POST['submit'] === 'OK'){
        $path = "../private";
        $file = "../private/passwd";
        if (!file_exists($path)){
            mkdir($path);
            file_put_contents($file, NULL);
        }
            $flag = 0;
            $arr = unserialize(file_get_contents($file));
            if ($arr){
                foreach ($arr as $elem =>$key){
                    if ($key['login'] === $_POST['login'])
                        $flag = 1;
                }
            }
            if ($flag == 1)
                echo "ERROR\n";
            else{
                $tab['login'] = $_POST['login'];
                $tab['passwd'] = hash(whirlpool, $_POST['passwd']);
                $arr[] = $tab;
                file_put_contents($file, serialize($arr));
                echo "OK\n";
            }
    }else
        echo "ERROR\n";
?>