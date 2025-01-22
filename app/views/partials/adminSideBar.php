<!-- Sidebar avec classe pour contrôler la visibilité -->
<div id="sidebar"
class="fixed h-screen inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 lg:relative lg:flex w-64 bg-gray-900 transition-transform duration-200 ease-in-out z-30">
<div class="flex flex-col h-full">
    <div class="p-6">
        <div class="flex items-center justify-between">
        <div>
			<svg
				class="h-14 w-14 fill-current text-gray-100"
				viewBox="0 0 24 24">
				<path
					d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3m6.82
					6L12 12.72 5.18 9 12 5.28 18.82 9M17 16l-5 2.72L7 16v-3.73L12
					15l5-2.73V16z"></path>
			</svg>
		</div>
            <h1 class="text-2xl font-bold text-white"> Youdemy</h1>
            <button onclick="toggleSidebar()"
                class="lg:hidden text-white">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <p class="text-gray-400 text-sm">Youdemy</p>
    </div>

    <!-- Navigation -->
    <?php if($_SESSION['user_loged_in_role'] == 'Admin') :?>
    <nav class="mt-6 flex-grow">
        <a href="/admin/dashboard"
            class="flex items-center w-full px-6 py-3 text-white bg-gray-800">
            <i data-lucide="layout-dashboard"
                class="w-5 h-5 mr-3"></i>
            <span>Dashboard</span>
        </a>
        <a href="/admin/enseignants"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="users" class="w-5 h-5 mr-3"></i>
            <span>Teachers</span>
        </a>
        <a href="/admin/etudiants"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="users" class="w-5 h-5 mr-3"></i>
            <span>Students</span>
        </a>
        <a href="/admin/courses"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
            <span>Courses</span>
        </a>
        <a href="/admin/categories"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="repeat" class="w-5 h-5 mr-3"></i>
            <span>Categories</span>
        </a>
        <a href="/admin/tags"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="repeat" class="w-5 h-5 mr-3"></i>
            <span>Tags</span>
        </a>
        <a href="#"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="bell" class="w-5 h-5 mr-3"></i>
            <span>Notifications</span>
        </a>
        <a href="#"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
            <span>Parametres</span>
        </a>
    </nav>
 
    <?php elseif($_SESSION['user_loged_in_role'] == 'Teacher') :?>
        <nav class="mt-6 flex-grow">
            <a href="/teacher/dashboard"
                class="flex items-center w-full px-6 py-3 text-white bg-gray-800">
                <i data-lucide="layout-dashboard"
                class="w-5 h-5 mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="/teacher/courses"
                class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
                <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
                <span>Courses</span>
            </a>
        </nav>

    <?php elseif ($_SESSION['user_loged_in_role'] == 'Student') :?>
        <nav class="mt-6 flex-grow">
            <a href="/student/myCourses"
                class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
                <i data-lucide="book-open" class="w-5 h-5 mr-3"></i>
                <span>My Courses</span>
            </a>
        </nav>
    <?php endif;?>
    <!-- Profil Admin avec Déconnexion -->
    <div class="border-t border-gray-800 p-6">
        <div class="relative">
            <button
                onclick="toggleProfileMenu()"
                class="flex items-center w-full text-white hover:bg-gray-800 rounded-lg p-2">
                <!-- <img src="/api/placeholder/32/32" alt="Admin"
                    class="w-8 h-8 rounded-full"> -->
                <div class="ml-3 flex-grow">
                    <p class="text-sm font-medium"><?= $_SESSION['user_loged_in_name']; ?></p>
                    <p class="text-xs text-gray-400"><?= $_SESSION['user_loged_in_email']; ?></p>
                </div>
                <i data-lucide="chevron-up"
                    class="w-5 h-5 transform transition-transform duration-200"
                    id="profileChevron"></i>
            </button>

            <!-- Menu Profil -->
            <div id="profileMenu"
                class="absolute bottom-full left-0 w-full mb-2 bg-gray-800 rounded-lg shadow-lg hidden">
                <a href="/admin/profil"
                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 rounded-t-lg">
                    <i data-lucide="user"
                        class="w-4 h-4 inline-block mr-2"></i>
                    My profil
                </a>
                <a
                    href="/logout"
                    class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 rounded-b-lg">
                    <i data-lucide="log-out"
                        class="w-4 h-4 inline-block mr-2"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script src="/assets/js/categoryPopUp.js"></script> -->