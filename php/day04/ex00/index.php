<?php
    session_start();
    if ($_GET["submit"] === "OK")
    {
        $_SESSION["login"] = $_GET["login"];
        $_SESSION["passwd"] = $_GET["passwd"];
    }
?>
<head>
</head>
<body>
    <form action="index.php" method="GET">
        Username :<input type="text" name="login" value="<?= $_SESSION["login"]?>">
        <br />
        Password: <input type="password" name="passwd" value="<?= $_SESSION["login"]?>">
        <input type="submit" value="OK">
    </form>
</body>
</html>