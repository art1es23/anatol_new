<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);
var_dump($data)
?>

<h2>New Warranty</h2>