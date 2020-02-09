<?php
if (!isset($_POST['message']))
    exit();
$value = $_POST['message'];

$file = file_get_contents('data.csv');
$data = explode("\n", $file);
$id = 0;
foreach ($data as $elem) {
    $tmp = explode(";", $elem);
    if ($tmp[0] >= $id)
        $id = $elem[0] + 1;
}

$data = array_merge(["$id;$value"], $data);
file_put_contents('data.csv', implode("\n", $data));

echo json_encode(['id' => $id]);