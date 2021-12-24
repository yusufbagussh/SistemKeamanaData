<?php

require_once('./vendor/autoload.php');

use Firebase\JWT\JWT;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

header('Content-Type:application/json');

//Validasi Method Request
//Cek method request apkah post atu tidak
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(401);
    exit();
}

list(, $token) = explode('', $headers['authorization']);
try {
    JWT::encode($token, $_ENV['ACCESS_TOKEN_SECRET'], ['HS256']);
    $games =
        [
            [
                'tittle' => 'Dota 2',
                'genre' => 'Strategi'
            ],
            [
                'tittle' => 'Ragnarok',
                'genre' => 'Role Playing Game'
            ]
        ];
    echo json_encode($games);
} catch (Exception $e) {
    http_response_code(401);
    exit();
}
