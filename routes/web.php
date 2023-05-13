<?php

use App\App\Http\Controllers\AuthController;
use App\App\Http\Controllers\CartController;
use App\App\Http\Controllers\Controller;
use App\App\Http\Controllers\PostsController as ControllersPostsController;
use App\App\Http\Controllers\Products\ProductsController;
use App\App\Http\Controllers\UserController;
use App\config\App;

$route = App::$app->router;
//Auth
$route->post('/register', [AuthController::class, 'register']);
$route->get('/register', [AuthController::class, 'register']);
$route->post('/login', [AuthController::class, 'login']);
$route->get('/login', [AuthController::class, 'login']);
$route->get('/logout', [AuthController::class, 'logOut']);
// users
$route->get('/profile', [Controller::class, 'profile']);
$route->post('/profile', [Controller::class, 'profile']);
$route->post('/search', [Controller::class, 'serch_item']);
$route->get('/home', [Controller::class, 'index']);
$route->get('/', [Controller::class, 'index']);
// products
$route->post('/create', [ControllersPostsController::class, 'store']);
$route->get('/create', [ControllersPostsController::class, 'create']);
$route->get('/dashboard', [Controller::class, 'dashboard']);
$route->get('/carts', [CartController::class, 'index']);
$route->get('/remove_cart', [CartController::class, 'destroy']);
$route->get('/cart', [CartController::class, 'store']);
$route->get('/order', [CartController::class, 'order_cart']);
