<?php
$file = file_get_contents('data.csv');
$data = explode("\n", $file);
$list = [];
foreach ($data as $elem) {
    $elem = explode(';', $elem);
    if (count($elem) != 2)
        break;
    $list[$elem[0]] = $elem[1];
}
echo json_encode(['list' => $list]);