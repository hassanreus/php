<?php
    session_start();
    if (!($_SESSION['loggued_on_user']))
        echo "ERROR\n";
    else {
        if (file_exists('../private') && file_exists('../private/chat')) {
            date_default_timezone_set("Africa/Ceuta");
            $chat = unserialize(file_get_contents('../private/chat'));
            if ($chat){
                foreach ($chat as $v) {
                    echo "[" . date('H:i', $v['time']) . "] <b>" . $v['login'] . "</b>: " . $v['msg'] . "<br />";
                }
            }
        }
    }