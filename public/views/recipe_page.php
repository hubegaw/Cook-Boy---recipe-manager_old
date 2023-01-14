<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/recipe_page.css">
    <title>Recipe - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
</head>
<body>
<div class="container">
    <?php include('modules/header.php') ?>
    <div class="main-content">
        <form class="recipe-container" action="getRecipe" action="GET">
            <?php if(isset($recipe)) ?>
            <div class="tags">
                <span>Tags:</span>
                <span></span>
            </div>
            <div class="recipe-info">
                <span class="time"><?= $recipe->getTime()?></span>
                <span class="portions"><?= $recipe->getPortions()?></span>
            </div>
            <div class="title">
                <span><?= $recipe->getTitle()?></span>
            </div>
            <div class="ingredients">
                <span>Ingredients</span>
            </div>
            <div class="description"><?= $recipe->getDescription()?></div>
        </form>
    </div>
    <?php include('modules/footer.php') ?>
</div>
</body>