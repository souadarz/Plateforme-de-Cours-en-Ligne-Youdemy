<?php require_once(__DIR__ . '../../partials/top.php'); ?>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
    <div class="w-full max-w-3xl bg-white shadow-lg rounded-lg p-8">
        <div class="flex items-center mb-6">
            <h1 class="text-gray-800 text-2xl font-bold flex-1">Update Course</h1>
        </div>

        <form method="POST" enctype="multipart/form-data" action="/teacher/updatecourse" class="space-y-6">
            <?php
        // echo "<pre>";
        // var_dump($coursee);die();
        //  echo "<pre>";?>
                <input type="hidden" id="id_cours" name="course_id" value="<?= ($course["course_id"]); ?>">
            <div>
                <label for="title_cours" class="text-gray-700 text-sm mb-1 block">Title</label>
                <input type="text" id="title_cours" name="title_cours" value="<?= htmlspecialchars($course["title"]); ?>"
                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:ring focus:ring-gray-300 rounded-lg" />
            </div>

            <div>
                <label for="descri_cours" class="text-gray-700 text-sm mb-1 block">Description</label>
                <textarea id="descri_cours" name="descri_cours" value= ""
                    class="resize-none px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:ring focus:ring-gray-300 rounded-lg"
                    rows="4"><?= htmlspecialchars($course['description']) ?></textarea>
            </div>

            <div>
                <label for="type_cours" class="text-gray-700 text-sm mb-1 block">Type de Cours</label>
                <select id="type_cours" name="type_cours"
                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:ring focus:ring-gray-300 rounded-lg">
                    <option value="video">Video</option>
                    <option value="document">Document</option>
                </select>
            </div>

            <div>
                <label for="file" class="text-gray-700 text-sm mb-1 block">Add file</label>
                <input type="file" id="file" name="file"
                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:ring focus:ring-gray-300 rounded-lg" />
            </div>
           
            <div>
                <label for="categorie_cours" class="text-gray-700 text-sm mb-1 block">Category</label>
                <select id="categorie_cours" name="categorie_cours"
                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:ring focus:ring-gray-300 rounded-lg">
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>" <?= $category['category_id']===$course['category_id']? "selected" : "" ?>><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="tags" class="text-gray-700 text-sm mb-1 block">Tags</label>
                <select name="tags_cours[]" id="tags" multiple
                    class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:ring focus:ring-gray-300 rounded-lg">
                    <?php foreach ($tags as $tag): ?>
                    <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex justify-end gap-4 mt-8">
                <button type="button"
                    class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-gray-700 hover:bg-gray-900 transition">
                        Cancel
                </button>
                <button name="update_course"
                    class="px-8 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-gray-900 hover:bg-gray-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>


<?php
require_once(__DIR__ . '../../partials/buttom.php');
?>