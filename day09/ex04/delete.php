<?php
if (!isset($_POST['id']))
    exit();

$file = file_get_contents('data.csv');
$data = explode("\n", $file);
$list = [];
foreach ($data as $elem) {
    $tmp = explode(';', $elem);
    if ($tmp[0] == $_POST['id'])
        continue;
    if (count($tmp) != 2)
        break;
    $list[] = $elem;
}
file_put_contents('data.csv', implode("\n", $list));