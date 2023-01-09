<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/my_recipes.css">
    <title>My recipes - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
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
                <div class="filters">
                    <button>Filters</button>
                </div>
            </div>
            <div class="recipes-container">
                <?php if(isset($recipes))
                foreach ($recipes as $recipe): ?>
                <ul>
                    <li>
                        <div class="name">
                            <?= $recipe-> getTitle();?>
                        </div>
                        <div class="info">
                            <div class="time"><?= $recipe-> getTime();?></div>
                            <div class="portions"><?= $recipe-> getPortions();?></div>
                        </div>
                    </li>
                </ul>
                <?php endforeach; ?>
            </div>
        </div>
        <?php include('modules/footer.php') ?>
    </div>
</body>