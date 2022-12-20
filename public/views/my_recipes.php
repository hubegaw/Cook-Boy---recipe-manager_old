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
                <div class="recipes-count">You have</div>
                <div class="create-recipe">
                    <a href="add_recipe">Create new recipe</a>
                </div>
                <div class="filters">
                    <button >Filters</button>
                </div>
            </div>
        </div>
        <?php include('modules/footer.php') ?>
    </div>
</body>