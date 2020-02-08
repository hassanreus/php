<?php
    session_start();
    if (!($_SESSION['loggued_on_user']))
        echo "ERROR\n";
    else {
        $path = "../private";
        $file = "../private/chat";
        if ($_POST['msg']) {
            if (!file_exists($path)) {
                mkdir($path);
                file_put_contents($file, null);
            }
            $chat = unserialize(file_get_contents($file));
            $fp = fopen($file, "w");
            flock($fp, LOCK_EX);
            $tmp['login'] = $_SESSION['loggued_on_user'];
            $tmp['time'] = time();
            $tmp['msg'] = $_POST['msg'];
            $chat[] = $tmp;
            file_put_contents($file, serialize($chat));
            fclose($fp);
        }
        ?>
        <html>
        <head>
            <script>top.frames['chat'].location = 'chat.php';</script>
        </head>
        <body>
            <form action="speak.php" method="POST">
                <input type="text" name="msg" value=""/><input type="submit" name="submit" value="Send"/>
            </form>
        </body>
        <?php
    }