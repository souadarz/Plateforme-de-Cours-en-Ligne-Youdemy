<?php
session_start();

require_once ('../core/BaseController.php');
require_once '../core/Router.php';
require_once '../core/Route.php';

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/controllers/EnseignantContoller.php';
require_once '../app/controllers/EtudiantContoller.php';


$router = new Router();
Route::setRouter($router);
$baseController = new BaseController();
// $baseController->checkRole();


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
Route::post('/admin/activerStatus', [AdminController::class, 'activerStatus']);
Route::get('/admin/categories', [AdminController::class, 'showCategorie']);
Route::post('/admin/addcategory', [AdminController::class, 'addCategory']);
Route::post('/admin/updateCategory', [AdminController::class, 'updateCategory']);
Route::post('/admin/deleteCategory', [AdminController::class, 'deleteCategory']);
Route::get('/admin/tags', [AdminController::class, 'ShowTags']);
Route::post('/admin/addtag', [AdminController::class, 'addTag']);
Route::post('/admin/updatetag', [AdminController::class, 'updateTag']);
Route::post('/admin/deletetag', [AdminController::class, 'deleteTag']);
Route::get('/admin/searchUsers', [AdminController::class, 'searchUsers']);


//teacher routes
Route::get('/admin/categories', [AdminController::class, 'showCategorie']);
Route::get('/teacher/dashboard', [EnseignantContoller::class, 'teacherDashboard']);
Route::get('/teacher/courses', [EnseignantContoller::class, 'teacherCoursePage']);
Route::post('/teacher/courses', [EnseignantContoller::class, 'AddCourse']);
Route::get('/teacher/courses', [EnseignantContoller::class, 'showCourses']);
Route::post('/teacher/deletecourse', [EnseignantContoller::class, 'deleteCourse']);



//student route 
Route::get('/student/mycourses', [EtudiantContoller::class, 'studentCoursePage']);





// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>