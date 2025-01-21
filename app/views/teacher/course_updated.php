<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<main>
    <div
        class="coursUpdateModal fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-lg bg-gray-200 shadow-lg rounded-lg p-8 relative">
            <div class="flex items-center">
                <h3 class="text-gray-700 text-xl font-bold flex-1">Update Course</h3>
            </div>

            <!-- <form method="POST" enctype="multipart/form-data" action="/" class="space-y-4 mt-8"> -->
            <?php foreach ($course as $course): ?>
                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Title</label>
                    <input type="text" value="<?= htmlspecialchars($course["title"]); ?>" name="title_cours"
                        class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg" />
                </div>

                <div>
                    <label class="text-gray-700 text-sm mb-1 block">Description</label>
                    <textarea value= "<?= htmlspecialchars($course['description']) ?>" name="descri_cours"
                        class="resize-none px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-gray-700 focus:bg-transparent rounded-lg" rows="3"></textarea>
                </div>
                <?php endforeach?>
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
                            <option value="<?= $category['category_id'] ?>" <?= $category['category_id']===$course['category_id']? "selected" : "" ?>><?= $category['category_name'] ?></option>
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
                        class="closee px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-gray-900 hover:bg-gray-700">Cancel</button>
                    <button name="btn_add_cours"
                        class="px-8 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide  bg-gray-900 hover:bg-gray-700">Update</button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</main>
<?php
require_once(__DIR__ . '../../partials/buttom.php');
?>