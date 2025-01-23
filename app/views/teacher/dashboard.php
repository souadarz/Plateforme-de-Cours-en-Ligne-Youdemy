<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<?php require_once(__DIR__ . '../../partials/adminSideBar.php'); ?>
<div class="flex-1 flex flex-col">
    <!-- Top Navigation -->
    <div class="bg-white shadow">
        <div
            class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <h2
                class="mx-2 text-xl font-semibold text-gray-800">Dashboard</h2>
            <div class="flex items-center space-x-4">
                <button
                    class="p-2 text-gray-400 hover:text-gray-600">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </button>
                <button
                    class="p-2 text-gray-400 hover:text-gray-600 relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <!-- <span
                        class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span> -->
                </button>
            </div>
        </div>
    </div>

    <!-- Dashboard Content avec Responsive -->
    <div class="p-4 sm:p-6 lg:p-8 flex-grow">
    <h3 class="text-3xl font-medium text-gray-700 mb-6">Statistics</h3>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- ... Cards statistiques existantes ... -->
            <div class="bg-white p-6 rounded-lg shadow-md ">
                <h4 class="text-lg font-semibold text-gray-600">Total Courses</h4>
                <p class="mt-4 text-3xl font-bold text-indigo-600"><?= htmlspecialchars($nbr_courses['total_cours']); ?></p>
            </div>
        </div>

        <div class="flex flex-col mt-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Nunmber d'enrollement of course</h1>
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                course title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                Nombre d'enrollement
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($courseEnrollmentsByTeacher)): ?>
                            <?php foreach ($courseEnrollmentsByTeacher as $category): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= htmlspecialchars($category['title']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-600 font-semibold"><?= htmlspecialchars($category['nbr_enroll']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500">Aucune catégorie trouvée.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once(__DIR__ . '../../partials/buttom.php'); ?>