<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/my_recipes.css">
    <title>My recipes - Cook Boy</title><style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
    <script type="text/javascript" src="public/scripts/toggle-menu.js" defer></script>
    <script type="text/javascript" src="public/scripts/toggle-filters.js" defer></script>
    <script type="text/javascript" src="public/scripts/search.js" defer></script>
</head>
<body>
    <div class="container">
        <?php include('modules/header.php') ?>
        <div class="main-content">
            <div class="panel flexbox">
                <div class="recipes-count">You have
                    <?php if(isset($recipes)) echo count($recipes) . (count($recipes) <= 1 ? " recipe" : " recipes")?>
                </div>
                <div class="create-recipe">
                    <a href="add_recipe">Create new recipe</a>
                </div>
                <button id="filters" onclick="toggleFilters()">Filters</button>
            </div>
            <div id="filters-container">
                <div class="upper-row">
                    <input placeholder="keyword" type="text" minlength="1" maxlength="30">
                    <button>quick</button>
                    <button>breakfast</button>
                    <button>dinner</button>
                </div>
                <div class="lower-row">
                    <button>lunch</button>
                    <button>dessert</button>
                    <input placeholder="portions" type="number" min="1" max="99">
                </div>
            </div>
            <div class="recipes-container">
                <?php require('public/views/modules/recipeDisplayer.php'); ?>
            </div>
        </div>
        <?php include("modules/footer.php") ?>
    </div>
</body>

<template id="recipe-template">
    <a href="" class="recipe-tile">
        <div class="recipe-image">
            <img src="" alt="">
        </div>
        <div class="name">
        </div>
        <div class="info">
            <div class="time">time:
            </div>
            <div class="portions">portions: </div>
        </div>
    </a>
</template>