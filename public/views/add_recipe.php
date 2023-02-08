<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/add_recipe.css">
    <title>Add recipe - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
    <script type="text/javascript" src="public/scripts/toggle-menu.js" defer></script>
    <script type="text/javascript" src="public/scripts/new-ingredient.js" defer></script>
</head>
<body>
    <div class="container">
        <?php include('modules/header.php') ?>
        <div class="main-content">
            <form class="recipe-container" action="/addRecipe" method="POST" ENCTYPE="multipart/form-data">
                <div class="tags">
                    <span>Tags:</span>
                    <input type="text" id="tag" placeholder="#">
                </div>
                <div class="recipe-info">
                    <label for="time">time:
                        <input type="time"  id="time" name="time">
                    </label>
                    <label for="portions">portions:
                        <input type="number" id="portions" name="portions" min="0" max="99" maxlength="2">
                    </label>
                </div>
                <div class="title">
                    <label for="title">
                        <input name="title" type="text" required placeholder="Title" minlength="3" maxlength="100">
                    </label>
                </div>
                <div class="ingredients" id="ingredients">
                    <span>Ingredients</span>
                    <?php include('modules/new_ingredient.php') ?>
                    <div id="new-ingredients"></div>
                    <a href="javascript:new_ingredient()" id="add-ingredient">add ingredient</a>
                </div>
                <div class="description">
                    <label for="description">
                        <textarea name="description" required placeholder="description" maxlength="3000" minlength="10"></textarea>
                    </label>
                </div>
                <div id="save-btn-container">
                <button type="submit" id="save-btn">Save</button>
                </div>
            </form>
        </div>
        <?php include('modules/footer.php') ?>
    </div>
<template id="ingredient-template">
    <?php include('modules/new_ingredient.php') ?>
</template>
</body>