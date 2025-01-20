<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<?php require_once(__DIR__ . '../../partials/adminSideBar.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
<main class="flex-1 p-6">
    <header class="mb-6">
        <div class=" mb-4 flex items-center justify-between gap-4 md:mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Courses</h1>
            <button id="add_book_button" class="addCours text-gray-100 bg-gray-900 hover:bg-gray-700 py-3 px-6 mb-5 mr-5 mt-4 rounded-sm">Add Book</button>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-40 object-cover" src="../../../public/assets/images/img_1.jpg" alt="Course Image">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 hover:text-gray-500">
                    <a href="#">Introduction to Web Development</a>
                </h2>
                <p class="text-gray-600 mt-2">HTML, CSS, JavaScript basics.</p>
            </div>
            <div class="flex items-center justify-between px-4 py-2 bg-gray-50">
                <div class="flex items-center">
                    <!-- <img class="w-8 h-8 rounded-full" src="images/author.jpg" alt="Author Image"> -->
                    <span class="ml-2 text-sm text-gray-700">John Doe</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img class="w-full h-40 object-cover" src="../../../public/assets/images/img_1.jpg" alt="Course Image">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 hover:text-gray-500">
                    <a href="#">Mastering Python</a>
                </h2>
                <p class="text-gray-600 mt-2">Learn Python for data science.</p>
            </div>
            <div class="flex items-center justify-between px-4 py-2 bg-gray-50">
                <div class="flex items-center">
                    <!-- <img class="w-8 h-8 rounded-full" src="images/author2.jpg" alt="Author Image"> -->
                    <span class="ml-2 text-sm text-gray-700">Jane Smith</span>

                </div>
            </div>
        </div>

    </div>
    <!-- add Course -->

    <div
        class="coursAddModal hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-lg bg-gray-200 shadow-lg rounded-lg p-8 relative">
            <div class="flex items-center">
                <h3 class="text-gray-700 text-xl font-bold flex-1">Add Course</h3>
            </div>

            <form method="POST" action="" class="space-y-4 mt-8">
                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Course title</label>
                    <input type="text" placeholder="Entrez le titre de cours" name="title_cours"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg" />
                </div>

                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Course discription</label>
                    <textarea placeholder='Entrez la description de cours' name="descri_cours"
                        class="resize-none px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg" rows="3"></textarea>
                </div>

                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Course Type</label>
                    <select placeholder="Entrez le Type de cours" id="select_type" name="type_cours"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg">
                        <option value="Video">Video</option>
                        <option value="Texte">Document</option>
                    </select>
                </div>
                <!-- contenus selon  le type de contenu ------------------------------------------------------------------------------------------------------------------------------  -->
                <div id="type-text" class="hidden">
                    <label class="text-gray-700 text-sm mb-1 block">Texte de cours</label>
                    <textarea placeholder="Entrez le Contenu Text" name="text_cours"
                        class="resize-none px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg"></textarea>
                </div>

                <div id="type-video" class="hidden">
                    <label class="text-gray-700 text-sm mb-1 block">URI video</label>
                    <input type="url" placeholder="Entrez le URL du Video" name="video_cours"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg" />
                </div>

                <div>
                    <!-- select categorie -->
                    <label class="text-gray-800 text-sm mb-1 block">Categorie</label>
                    <select placeholder="Enter le Catégorie du cours" name="categorie_cours"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-1 block">Tags</label>
                    <!-- Select tags -->
                    <select name="tags_cours[]" id="countries" multiple>
                    <?php foreach ($tags as $tag): ?>
                            <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>

                <div class="flex justify-end gap-4 !mt-8">
                    <button type="button"
                        class="close px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-gray-900 hover:bg-gray-700">Cancel</button>
                    <button name="btn_add_cours"
                        class="px-8 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide  bg-gray-900 hover:bg-gray-700">Add</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php require_once(__DIR__ . '../../partials/buttom.php'); ?>

<script>
    new MultiSelectTag('countries')  // id
</script>

<script>
    // add cours model ++++++++++++++++++++++++++++++++++++++++++++++++++
    const addCours = document.querySelector(".addCours");
    const close = document.querySelector(".close");
    const coursAddModal = document.querySelector(".coursAddModal");
    addCours.addEventListener("click", () => {
        coursAddModal.classList.toggle("hidden");
    });
    close.addEventListener("click", () => {
        coursAddModal.classList.toggle("hidden");
    });
    // new MultiSelectTag("tags_update"); // id
</script>