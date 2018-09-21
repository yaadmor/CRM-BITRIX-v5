<?php
$response = [];
$response['path'] = 'responses/'.date('ymd-His').'.txt';
$response['object'] = array("get" => $_GET, "post" => $_POST);
$response['content'] = json_encode($response['object'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

$response['file'] = fopen($response['path'], 'w');
fwrite($response['file'], $response['content']);
fclose($response['file']);

header('Content-Type: application/json');
echo $response['content'];
unset($response);
