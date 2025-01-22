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
$baseController->checkRole();


// Define routes

Route::get('/', [BaseController::class, 'index']);

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
Route::get('/admin/courses', [AdminController::class, 'coursesPage']);
Route::post('/admin/deletecourse', [AdminController::class, 'deleteCourse']);
Route::get('/admin/courses', [AdminController::class, 'showAllCourses']);



//teacher routes
Route::get('/admin/categories', [AdminController::class, 'showCategorie']);
Route::get('/teacher/dashboard', [EnseignantContoller::class, 'teacherDashboard']);
Route::get('/teacher/courses', [EnseignantContoller::class, 'teacherCoursePage']);
Route::post('/teacher/courses', [EnseignantContoller::class, 'AddCourse']);
Route::get('/teacher/courses', [EnseignantContoller::class, 'showCourses']);
Route::post('/teacher/deletecourse', [EnseignantContoller::class, 'deleteCourse']);
Route::post('/teacher/updatecourse', [EnseignantContoller::class, 'updateCourse']);
Route::get('/teacher/course_updated/{course_id}', [EnseignantContoller::class, 'getCourseById']);


//student route 
Route::get('/student/myCourses', [EtudiantContoller::class, 'studentCoursePage']);
Route::get('/student/myCourses', [EtudiantContoller::class, 'studentCoursePage']);
Route::post('/student/myCourses/{course_id}', [EtudiantContoller::class, 'enroll']);




// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>