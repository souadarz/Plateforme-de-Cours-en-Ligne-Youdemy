<!-- Add and Modify Book Popup -->
<div id="book_modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center">
    <div id="add_modal_content" class="flex flex-col w-11/12 md:w-5/12 overflow-y-auto scrollbar-hidden mx-auto mt-10 p-4 bg-gray-200 rounded-sm shadow-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl" id="popup_titre">Add Book</h1>
            <!-- Close Icon -->
            <button id="close_categorie_modal" class="flex justify-end items-center mb-4 float-right text-xl">&times;</button>
        </div>
        <!-- add and modify categorie Form -->
        <form method="POST" action="../../controllers/Book/bookController.php" id="book_form" class="max-w-sm mx-auto">
            <div class="mb-5">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" required class="p-2 border rounded-md" id="book_title_input">

            </div>
            <div class="mb-5">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">author</label>
                <input type="text" name="author" required class="p-2 border rounded-md" id="book_author_input">
            </div>
            <div class="mb-5">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">summary</label>
                <input type="text" name="summary" required class="p-2 border rounded-md " id="book_summry_input">
            </div>
            <input type="text" name="id_book" class="p-2 border rounded-md hidden" id="book_id_input">
            <!-- <div class="mb-5">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">date_publication</label>
                <input type="text" required class="p-2 border rounded-md">
            </div> -->

            <!-- select of categories -->
            <select class="mt-6 mb-2 rounded-lg px-2 py-1 focus:outline-none" name="id_category" id="id_category_input">
                <option name="input_category" value="all">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option  value="<?= htmlspecialchars($category['id_category']); ?>">
                        <?= htmlspecialchars($category['name_category']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div>
                <button type="submit" name="add_book" id="submit_button" class="text-gray-100 bg-gray-900 hover:bg-gray-700 py-2 px-6 mt-5 mr-5 rounded-sm">Add</button>
            </div>
        </form>

    </div>
</div>


<script>
    const modalBook = document.getElementById('book_modal');
    document.getElementById('close_categorie_modal').onclick = () => closeModal();
    // show modal as add category
    document.getElementById('add_book_button').onclick = () => {
        showModal();
    }

    console.log(document.querySelectorAll(".edit_book_button"));
    
    // show modal as modify category
    setTimeout(() => {
        const modifyBookButtons = document.querySelectorAll(".edit_book_button");

        modifyBookButtons.forEach(modifyBookButton => {
            modifyBookButton.onclick = () => {
                showModal();
                document.getElementById("submit_button").name = "update_book";
                document.getElementById('submit_button').textContent = "Edit Book";
                document.getElementById('popup_titre').textContent = "Edit Book";
                document.getElementById("book_id_input").value = modifyBookButton.closest(".book_box").querySelector(".book_id").textContent;
                document.getElementById("book_title_input").value = modifyBookButton.closest(".book_box").querySelector(".book_title").textContent;
                document.getElementById("book_author_input").value = modifyBookButton.closest(".book_box").querySelector(".book_author").textContent;
                document.getElementById("book_summry_input").value = modifyBookButton.closest(".book_box").querySelector(".book_summary").textContent;
                document.getElementById("id_category_input").value = modifyBookButton.closest(".book_box").querySelector(".book_category").textContent;
            };
        });
    }, 2000);
    function showModal(){
        modalBook.classList.remove('hidden');
    }
    function closeModal(){
        modalBook.classList.add('hidden');
        document.getElementById("submit_button").name = "add_book";
        document.getElementById('submit_button').textContent = "Add Book";
        document.getElementById('popup_titre').textContent = "Add Book";
    }
    
</script>