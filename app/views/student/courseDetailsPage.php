
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUDEMY Platforme</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <header class="bg-gray-900 text-white py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- <h1 class="text-2xl font-bold">Course Catalog</h1> -->
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-gray-300">Home</a></li>
                    <!-- <li><a href="/register" class="hover:text-gray-300">Sign Up</a></li> -->
                    <li><a href="/student/myCourses" class="hover:text-gray-300">Mycourses</a></li>
                </ul>
            </nav>
        </div>
    </header>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 flex items-center justify-center">
    <div id="course_details"
        class="mx-auto max-w-4xl bg-white p-8 shadow-md rounded-lg border border-gray-300 transition-shadow duration-300 hover:shadow-lg">
        <div class="mb-4 flex flex-col md:flex-row items-start gap-8">
            <!-- course Image -->
            <!-- <div class="w-full md:w-1/3">
                <img
                    src="../../public/images/course_example.jpg"
                    alt="course Image"
                    class="rounded-md w-full h-auto max-w-xs md:max-w-sm transition-transform duration-300 hover:scale-105">
            </div> -->
            <!-- course Details -->
            <div class="flex flex-col w-full md:w-2/3">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl leading-relaxed"><?= $courseDetails["title"] ?></h1>
                <h2 class="text-xl font-medium text-gray-900 sm:text-2xl leading-normal mt-2"><?= $courseDetails["description"] ?></h2>
                <p class="text-sm font-medium text-gray-500 mt-1">Category: <?= $courseDetails["category_name"] ?></p>
                <p class="text-gray-700 mt-4 leading-loose">
                    <?= $courseDetails["full_name"] ?>
                </p>
            <div class="flex flex-col w-full md:w-2/3">
                <?php if ($courseDetails["course_type"] === "video") : ?>
                    <video src="http://localhost:8080/<?= $courseDetails["url"]; ?>"></video>
                <?php else: ?>
                    <iframe src="http://localhost:8080/<?= $courseDetails["url"] ?>"></iframe>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once(__DIR__ . '../../partials/buttom.php');
?>