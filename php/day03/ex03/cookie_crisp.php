<?php
    if ($_GET["action"] == "set")
        setcookie($_GET["name"], $_GET["value"], time() + 86400);
    else if ($_GET["action"] == "get")
        echo $_COOKIE[$_GET["name"]] . "\n";
    else if ($_GET["action"] == "del")
        setcookie($_GET["name"] , $_GET["value"], time() - 86401);
?>