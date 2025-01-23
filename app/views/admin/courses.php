<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<?php require_once(__DIR__ . '../../partials/adminSideBar.php'); ?>

<main class="flex-1 p-6">
    <header class="mb-6">
        <div class=" mb-4 flex items-center justify-between gap-4 md:mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Courses</h1>
            <!-- <button id="add_course_button" class="addCours text-gray-100 bg-gray-900 hover:bg-gray-700 py-3 px-6 mb-5 mr-5 mt-4 rounded-sm">Add Course</button> -->
        </div>
    </header>
    <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <table class="min-w-full">
                    <thead>
                        <tr
                            class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <th class="p-3">Courses</th>
                            <th class="p-3">Title</th>
                            <th class="p-3">category</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Client 1 -->
                        <?php foreach ($courses as $course): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3">
                                    <div class="full_name text-sm font-medium text-gray-900">
                                        <?= htmlspecialchars($course["title"]); ?>
                                    </div>
                                </td>
                                <td class="p-3">
                                    <div class="email text-sm text-gray-900"><?= htmlspecialchars($course['description']) ?></div>
                                </td>
                                <td class="p-3">
                                    <div class="text-sm text-gray-900"><?= htmlspecialchars($course['category_name']) ?></div>
                                </td>
                                <td class="p-3">
                                    <div class="flex space-x-2 items-center">
                                        <form method="POST" action="/admin/deletecourse" style="display:inline;" onsubmit="return confirm('are You sure, you want to delete this course ?');">
                                            <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                                            <button class="text-gray-600 hover:text-blue-900" name="delete_course">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</main>
<?php require_once(__DIR__ . '../../partials/buttom.php'); ?>