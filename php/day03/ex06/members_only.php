<?php
    if ($_SERVER['PHP_AUTH_USER'] !== 'zaz' || $_SERVER['PHP_AUTH_PW'] !== 'Ilovemylittleponey')
    {
        header('WWW-Authenticate: Basic realm="littleponey"');
        header('HTTP/1.0 401 Unauthorized');
?>
<html><body>That area is accessible for members</body></html>
<?php
        exit;
    }
    else
    {
        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];
        $str = file_get_contents("../img/42.png");
        $str64 = base64_encode($str);
?>
<html><body>
Hello Zaz<br />
<img src="data:image/png;base64,<?= $str64?>" alt="42tof">
</body></html>
<?php
    }
?>