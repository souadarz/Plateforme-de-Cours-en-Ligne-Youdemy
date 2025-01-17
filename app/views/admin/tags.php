<?php require_once(__DIR__ . '../../partials/top.php'); ?>
<?php require_once(__DIR__ . '../../partials/adminSideBar.php'); ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <section class="p-8 antialiased md:py-16">
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                    <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Tags</h2>
                        <button id="add_tag_button" class="text-gray-100 bg-gray-900 hover:bg-gray-700 p-3 mb-5 mr-5 rounded-sm">Add Tag</button>
                    </div>

                    <!-- tags will apear here -->
                    <div class="grid gap-4 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <?php foreach ($tags as $tag): ?> 
                            <div class="tag_box flex flex-col rounded-lg border border-gray-200 bg-white px-4 py-4 hover:bg-gray-50" data-tag-id="<?= $tag['tag_id']?>">

                                <div class="flex justify-between mb-5">
                                    <button class="edit_tag_button">Edit</button>
                                    <!-- delete tag -->
                                    <form action="/admin/deletetag" method="POST">
                                        <input type="text" value="<?= $tag['tag_id']?>" class="hidden" name="id_tag">
                                        <input type="submit" value="Delete" name="delete_tag" class="cursor-pointer">
                                    </form>
                                </div>

                                <h3 class="text-xl font-semibold text-gray-900 sm:text-2xl"><?= $tag['tag_name']?></h3>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
            </main>
<?php include 'tagPopUp.php';?>

<?php
require_once(__DIR__ . '../../partials/buttom.php');
?>