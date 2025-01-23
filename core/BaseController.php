<?php 

class BaseController
{

    private $CourseModel;

    public function __construct()
    {
        $this->CourseModel = new Course ();
    }

    // Render a view
    public function render($view, $data = [])
    {
        
        extract($data);
        include __DIR__ . '/../app/views/' . $view . '.php';
    }


    public function checkRole()
    {
        $excludes = ["",'login','register'];
        $url = strtolower($_SERVER['REQUEST_URI']);
        $parts = explode('/', trim($url, '/'));
        $urlFirstPart = $parts[0] ?? '';
        if(in_array($urlFirstPart,$excludes))
            return;
        if (isset($_SESSION['user_loged_in_role'])) {
            $sessionRole = strtolower($_SESSION['user_loged_in_role']);
            if (in_array($urlFirstPart, ['admin', 'teacher', 'student'])) {

                if ($sessionRole !== $urlFirstPart) {
                    header("Location:/unauthorized");
                    exit;
                }
            } else if ($urlFirstPart === "login" || $urlFirstPart === "register") {
                header("Location:".strtolower($sessionRole)."/dashboard");
            }
        } else {
            if (in_array($urlFirstPart, ['admin', 'teacher', 'student'])) {
                header("Location:/unauthorized");
                exit;
            }
        }
    }
    

     function index()
    {
        // $limit = 8;
        // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // $offset = ($page - 1) * $limit;

        // $totalCourses = $this->CourseModel->getTotalCoursesNumber();
        // $totalPages = ceil($totalCourses / $limit);

        // // Get category and search value from query params
        // $category_id = isset($_GET['category']) ? $_GET['category'] : null;
        // $search_value = isset($_GET['search_value']) ? $_GET['search_value'] : null;

        // // Pass the category_id and search_value to getAllCoursesX
        // $courses = $this->CourseModel->getAllCoursesX($limit, $offset, $search_value, $category_id);

        // foreach ($courses as $course) {
        //     $course['tags'] = $this->CourseTagsModel->getCoursetags($course['course_id']);
        // }

        // $categories = $this->CategoryModel->getAllCategories();
        $courses = $this->CourseModel->getAllCourses();

        $this->render('index',['courses' => $courses]);
        //     'categories' => $categories,
        //     'totalPages' => $totalPages,
        //     'currentPage' => $page]);
    }

   function unauthorized()
    {
        $this->render('partials/unauthorized');
    }
   
}
