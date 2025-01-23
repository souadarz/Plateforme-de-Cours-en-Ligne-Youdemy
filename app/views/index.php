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
            <h1 class="text-2xl font-bold">Course Catalog</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-gray-300">Home</a></li>
                    <li><a href="/register" class="hover:text-gray-300">Sign Up</a></li>
                    <li><a href="/login" class="hover:text-gray-300">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Available Courses</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php foreach ($courses as $course): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800"><?= $course['title'] ?></h3>
                    <p class="text-sm text-gray-600 mt-2">
                        <?= strlen($course['description']) > 100 ? substr($course['description'], 0, 100) . '...' : $course['description'] ?>
                    </p>

                    <div class="mt-4 flex justify-between gap-2">
                        <a href=#
                            class="flex-1 text-center bg-gray-900 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                            view course details
                        </a>
    
                        <!-- "/student/myCourses/<?= $course['course_id'] ?>" -->
                        <a href=/login
                            class="flex-1 text-center bg-gray-900 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                            Enroll
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- <?php if (empty($courses)): ?>
            <div class="col-span-full text-center text-gray-500">
                <p>Aucun cours disponible pour le moment.</p>
            </div>
            <?php endif; ?> -->
        </div>
    </main>

    <div class="flex justify-center mt-6">
                <nav>
                    <ul class="flex items-center space-x-2">
                        <li>
                            <a href="#" class="px-4 py-2 bg-gray-300 text-black rounded-md">Prev</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 bg-gray-300 text-black rounded-md">1</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 bg-gray-300 text-black rounded-md">2</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 bg-gray-300 text-black rounded-md">3</a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-2 bg-gray-300 text-black rounded-md">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    <footer class="bg-gray-900 text-white py-4 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm">&copy; 2025 YOUDEMY. Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>
