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

        <!-- Grilles responsive -->
        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 mt-6">
            <!-- ... Rest of your content ... -->
        </div>
    </div>
</div>
<?php require_once(__DIR__ . '../../partials/buttom.php'); ?>