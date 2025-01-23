<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<?php require_once(__DIR__ . '../../partials/adminSideBar.php'); ?>

<main class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">My Courses</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($courses as $course): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800"><?= $course['title'] ?></h3>
                    <p class="text-sm text-gray-600 mt-2">
                        <?= strlen($course['description']) > 100 ? substr($course['description'], 0, 100) . '...' : $course['description'] ?>
                    </p>

                    <div class="mt-4 flex justify-between gap-2">
                        <a href="courseDetails/<?= $course['course_id'] ?>"
                            class="flex-1 text-center bg-gray-900 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                            view course details
                        </a>


                        <!-- <form method="POST" action="/student/myCourses/<?= $course['course_id'] ?>">
                            <button type="submit" name="onrollement" class="flex-1 text-center bg-gray-900 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition">Enroll</button>
                        </form> -->


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

<?php require_once(__DIR__ . '../../partials/buttom.php'); ?>