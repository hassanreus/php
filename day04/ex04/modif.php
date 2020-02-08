<?php
    if ($_POST['login'] !== '' && $_POST['oldpw'] !== '' && $_POST['newpw'] !== "" && $_POST['submit'] === 'OK'){
        $file = '../private/passwd';
        $flag = 0;
        $old_pw = hash(whirlpool, $_POST['oldpw']);
        $new_pw = hash(whirlpool, $_POST['newpw']);
        $arr = unserialize(file_get_contents($file));
        if ($arr){
            foreach ($arr as $elem => $key){
                if ($key['login'] === $_POST['login'] && $key['passwd'] === $old_pw && $old_pw != $new_pw){
                    $flag = 1;
                    $arr[$elem]['passwd'] = $new_pw;
                }
            }
            if ($flag){
                file_put_contents($file, serialize($arr));
                header('Location: index.html');
                echo "OK";
                exit ;
            }else
                echo "ERROR\n";
        }else 
            echo "ERROR\n";
    }else
        echo "ERROR\n";
?>