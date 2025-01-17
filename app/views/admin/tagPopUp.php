<!-- Add and Modify tag Popup -->
<div id="tag_modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center">
    <div id="add_modal_content" class="flex flex-col w-11/12 md:w-5/12 overflow-y-auto scrollbar-hidden mx-auto mt-10 p-4 bg-gray-200 rounded-sm shadow-lg">
        <div class="flex justify-between">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Add tag</h1>
            <!-- Close Icon -->
            <button id="close_tag_modal" class="flex justify-end items-center mb-4 float-right text-xl">&times;</button>
        </div>
        <!-- add and modify tag Form -->
        <form method="POST" action="/admin/addtag" id="tag_form" class="mt-[25%] md:px-10 hidden">
            <div class="flex w-full">
                <label for="tag_name_input" class="text-gray-900 font-semibold w-1/3">Tag Name:</label>
                <input type="text" class="hidden" name="tag_id_input" value="0" id="tag_id_input">
                <input type="text" name="tag_name_input" id="tag_name_input" value="" class="w-2/3" required>
            </div>
            
            <div class="flex justify-evenly">
                <input type="submit" name="add_modify_tag" class="text-gray-100 bg-gray-700 border-2 border-gray-700 hover:bg-gray-900 px-8 py-1 mt-20 mr-6 float-right rounded-sm" value="Save">
            </div>
        </form>
    </div>
</div>


<script>
    const modal = document.getElementById('tag_modal');
    document.getElementById('close_tag_modal').onclick = () => closeModal();
    // show modal as add tag
    document.getElementById('add_tag_button').onclick = () => {
        showModal();
        document.getElementById('tag_form').classList.remove("hidden");
    }
    // show modal as add modify tag
    const modifytagButtons =document.querySelectorAll(".edit_tag_button");

    modifytagButtons.forEach(modifytagButton=>{
        modifytagButton.onclick = () => {
        showModal();
        document.getElementById('tag_form').classList.remove("hidden");
        document.getElementById("tag_id_input").value=modifytagButton.closest(".tag_box").getAttribute("data-tag-id");                
        document.getElementById("tag_name_input").value=modifytagButton.closest(".tag_box")?.querySelector("h3").textContent;
        document.getElementById('tag_form').setAttribute("action", "/admin/updatetag");
    }
    });
    function showModal(){
        modal.classList.remove('hidden');
    }
    function closeModal(){
        modal.classList.add('hidden');
        document.getElementById('tag_form').classList.add("hidden");
        document.getElementById('sub_tag_form').classList.add("hidden");
    }
    
</script>