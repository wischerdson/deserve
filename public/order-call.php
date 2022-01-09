<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: *');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	die;
}

header('Content-Type: application/json; charset=utf-8');
$_POST = json_decode(file_get_contents('php://input'), true);

echo json_encode($_POST);
