<?php

use App\App\Http\Controllers\AuthController;
use App\App\Http\Controllers\Controller;
use App\App\Http\Controllers\Products\ProductsController;
use App\config\App;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$route = App::$app->router;
$route->post('/api/save_winner', [AuthController::class, 'save_winner']);
$route->get('/api/signup', [CartController::class, 'store']);
$route->get('/order', [CartController::class, 'order_cart']);
$route->post('/api/register', [AuthController::class, 'registerapi']);
$route->get('/api/register', [AuthController::class, 'register']);
$route->get('/', [AuthController::class, 'register']);
$route->post('/api/login', [AuthController::class, 'login']);
// $route->post('/login', [AuthController::class, 'login']);
$route->get('/api/login', [AuthController::class, 'login']);
$route->get('/api/logout', [AuthController::class, 'logOut']);
// users