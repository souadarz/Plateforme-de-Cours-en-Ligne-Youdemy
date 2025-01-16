<!-- Sidebar avec classe pour contrôler la visibilité -->
<div id="sidebar"
class="fixed h-screen inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 lg:relative lg:flex w-64 bg-gray-900 transition-transform duration-200 ease-in-out z-30">
<div class="flex flex-col h-full">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Admin
                Panel</h1>
            <button onclick="toggleSidebar()"
                class="lg:hidden text-white">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <p class="text-gray-400 text-sm">Gestion bancaire</p>
    </div>

    <!-- Navigation -->
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
            <span>Enseignants</span>
        </a>
        <a href="/admin/etudiants"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="users" class="w-5 h-5 mr-3"></i>
            <span>Etudiants</span>
        </a>
        <a href="/admin/cours"
            class="flex items-center w-full px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <i data-lucide="repeat" class="w-5 h-5 mr-3"></i>
            <span>Cours</span>
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
            <span>Paramètres</span>
        </a>
    </nav>

    <!-- Profil Admin avec Déconnexion -->
    <div class="border-t border-gray-800 p-6">
        <div class="relative">
            <button
                onclick="toggleProfileMenu()"
                class="flex items-center w-full text-white hover:bg-gray-800 rounded-lg p-2">
                <img src="/api/placeholder/32/32" alt="Admin"
                    class="w-8 h-8 rounded-full">
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
                    Mon profil
                </a>
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">
                    <i data-lucide="settings"
                        class="w-4 h-4 inline-block mr-2"></i>
                    Paramètres
                </a>
                <a
                    href="/logout"
                    class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 rounded-b-lg">
                    <i data-lucide="log-out"
                        class="w-4 h-4 inline-block mr-2"></i>
                    Déconnexion
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="/assets/js/categoryPopUp.js"></script>