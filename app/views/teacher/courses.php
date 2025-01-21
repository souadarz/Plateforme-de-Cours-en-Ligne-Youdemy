<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<?php require_once(__DIR__ . '../../partials/adminSideBar.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
<main class="flex-1 p-6">
    <header class="mb-6">
        <div class=" mb-4 flex items-center justify-between gap-4 md:mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Courses</h1>
            <button id="add_course_button" class="addCours text-gray-100 bg-gray-900 hover:bg-gray-700 py-3 px-6 mb-5 mr-5 mt-4 rounded-sm">Add Course</button>
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
                                    <div class="text-sm text-gray-900"><?= htmlspecialchars($course['category_id']) ?></div>
                                </td>
                                <td class="p-3">
                                    <div class="flex space-x-2 items-center">
                                        <form method="POST" action="/teacher/deletecourse" style="display:inline;" onsubmit="return confirm('Vous êtes sûr, vous voulez supprimer cet utilisateur ?');">
                                            <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                                            <button class="text-gray-600 hover:text-blue-900" name="delete_course">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                        <a href="/teacher/course_updated/<?= $course['course_id'] ?>">
                                            <button data-course-id="<?= $course['course_id'] ?>" class="updateCours text-gray-600 hover:text-blue-900" name="update_course">
                                                <i data-lucide="edit" class="w-5 h-5"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
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

            <form method="POST" enctype="multipart/form-data" action="/teacher/courses" class="space-y-4 mt-8">
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
                        <option value="video">Video</option>
                        <option value="document">Document</option>
                   
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Link</label>
                    <input type="file" placeholder="" name="file"
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
                    <select name="tags_cours[]" id="tags" multiple>
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

  <!-- //updatecourse -->
    <!-- <div
        class="coursUpdateModal hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-lg bg-gray-200 shadow-lg rounded-lg p-8 relative">
            <div class="flex items-center">
                <h3 class="text-gray-700 text-xl font-bold flex-1">Update Course</h3>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/" class="space-y-4 mt-8">
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
                        <option value="video">Video</option>
                        <option value="document">Document</option>
                   
                    </select>
                </div>
                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Link</label>
                    <input type="file" placeholder="" name="file"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg" />
                </div>

                <div>
                     select categorie -->
                    <!-- <label class="text-gray-800 text-sm mb-1 block">Categorie</label>
                    <select placeholder="Enter le Catégorie du cours" name="categorie_cours"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-1 block">Tags</label>
                     Select tags 
                    <select name="tags_cours[]" id="tags" multiple>
                    <?php foreach ($tags as $tag): ?>
                            <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>

                <div class="flex justify-end gap-4 !mt-8">
                    <button type="button"
                        class="closee px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-gray-900 hover:bg-gray-700">Cancel</button>
                    <button name="btn_add_cours"
                        class="px-8 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide  bg-gray-900 hover:bg-gray-700">Update</button>
                </div>
            </form>
        </div>
    </div>-->
</main> 

<?php require_once(__DIR__ . '../../partials/buttom.php'); ?>

<script>
    new MultiSelectTag('tags')  // id
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

     // update cours model ++++++++++++++++++++++++++++++++++++++++++++++++++
     const updateCours = document.querySelector(".updateCours");
    const closee = document.querySelector(".closee");
    const coursUpdateModal = document.querySelector(".coursUpdateModal");
    updateCours.addEventListener("click", () => {
        coursUpdateModal.classList.toggle("hidden");
    });
    closee.addEventListener("click", () => {
        coursUpdateModal.classList.toggle("hidden");
    });
</script>