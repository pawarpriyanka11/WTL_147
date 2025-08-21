<?php
$data = array(
    "id" => 11,
    "name" => "hehehee"
);

header('Content-Type: application/json');
echo json_encode($data);
