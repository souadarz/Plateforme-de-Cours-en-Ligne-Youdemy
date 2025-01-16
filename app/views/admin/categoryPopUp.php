<!-- Add and Modify Category Popup -->
<div id="categorie_modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center">
    <div id="add_modal_content" class="flex flex-col w-11/12 md:w-5/12 overflow-y-auto scrollbar-hidden mx-auto mt-10 p-4 bg-gray-200 rounded-sm shadow-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Add Category</h1>
            <!-- Close Icon -->
            <button id="close_categorie_modal" class="flex justify-end items-center mb-4 float-right text-xl">&times;</button>
        </div>
        <!-- add and modify categorie Form -->
        <form method="POST" action="../../controllers/Category/createModifyCategory.php" id="category_form" class="mt-[25%] md:px-10 hidden">
            <div class="flex w-full">
                <label for="category_name_input" class="text-gray-900 font-semibold w-1/3">Category Name:</label>
                <input type="text" class="hidden" name="category_id_input" value="0" id="category_id_input">
                <input type="text" name="category_name_input" id="category_name_input" value="" class="w-2/3" required>
            </div>
            
            <div class="flex justify-evenly">
                <input type="submit" name="add_modify_category" class="text-gray-100 bg-gray-700 border-2 border-gray-700 hover:bg-gray-900 px-8 py-1 mt-20 mr-6 float-right rounded-sm" value="Save">
            </div>
        </form>
    </div>
</div>


<script>
    const modal = document.getElementById('categorie_modal');
    document.getElementById('close_categorie_modal').onclick = () => closeModal();
    // show modal as add category
    document.getElementById('add_categorie_button').onclick = () => {
        showModal();
        document.getElementById('category_form').classList.remove("hidden");
    }
    // show modal as add modify category
    const modifyCategoryButtons =document.querySelectorAll(".edit_category_button");

    modifyCategoryButtons.forEach(modifyCategoryButton=>{
        modifyCategoryButton.onclick = () => {
        showModal();
        document.getElementById('category_form').classList.remove("hidden");
        document.getElementById("category_id_input").value=modifyCategoryButton.closest(".category_box").getAttribute("data-category-id");                
        document.getElementById("category_name_input").value=modifyCategoryButton.closest(".category_box")?.querySelector("h3").textContent;
        
    }
    });
    function showModal(){
        modal.classList.remove('hidden');
    }
    function closeModal(){
        modal.classList.add('hidden');
        document.getElementById('category_form').classList.add("hidden");
        document.getElementById('sub_category_form').classList.add("hidden");
    }
    
</script>