<?php
    session_start();
    require_once('auth.php');
    if (!$_SESSION["loggued_on_user"])
    {
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];
        if ($login && $passwd) {
            if (auth($login, $passwd)) {
                $_SESSION["loggued_on_user"] = $login;
            }
            else {
                header('Location: index.html');
                return ;
            }
        }
    }
    ?>
    <html>
    <head>
        <title>42Chat</title>
    </head>
    <body>
        <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
        <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
    </body>
    </html>
    <?php
?>
