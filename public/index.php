<?php
session_start();

require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AdminController.php';


$router = new Router();
Route::setRouter($router);



// Define routes

// auth routes

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'handlRegister']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::get('/logout', [AuthController::class, 'logout']);


//admin routes
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
Route::get('/admin/enseignants', [AdminController::class, 'enseignantsPage']);
Route::post('/admin/deleteUser', [AdminController::class, 'deleteUser']);
Route::post('/admin/changeUserStatus', [AdminController::class, 'changeUserStatus']);
Route::get('/admin/categories', [AdminController::class, 'showCategorie']);



// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>